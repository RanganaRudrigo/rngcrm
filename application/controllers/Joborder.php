<?php 


class Joborder  extends MY_Controller {

	private $_page = 'joborder';

    function __construct(){
        parent::__construct();
        $this->load->model("Joborder_model",'model');
	}
	
	function index(){
        $this->check_permission("Job Order","add");
        $this->load->model("repair_mode_model",'repair');
		$d = [
            "page" => "$this->_page/form", 
            'repair_modes' => $this->repair->get_many_by(['status'=> 1 ])
        ] ;

        
        $this->form_validation->set_rules("form[CustomerId]","Customer ","required");
        $this->form_validation->set_rules("form[ItemId]","Item ","required",['required' => "Select Product to Process " ]);
		$this->form_validation->set_rules("form[RepairModeId]","Repair Mode ","required");

         if( $this->form_validation->run() ) {
            $data  = $this->input->post('form');
        	if($this->model->insert($data )){
        		 $this->session->set_flashdata('notification', ["alert"=>"success","text"=>'<strong>New Job Order Successfully Created</strong>']);
        	} 
        	redirect(current_url());
        } 

        $this->view($d);
	}

    function jobList( ){
        $this->check_permission("Job Order","view");
        $table = $this->model->table();

        $this->load->model("repair_mode_model",'repair');
        $repairTable = $this->repair->table();

         $this->load->model('Customer_serial_no','CustomerSerialNo');
        $CustomerSerialNoTable = $this->CustomerSerialNo->table();

        $this->load->model('Customer_item','CustomerItem');
        $CustomerItemTable = $this->CustomerItem->table();

        $this->load->model('Customer_model');
        $CustomerTable = $this->Customer_model->table();

        $this->load->model('Item_model');
        $ItemTable = $this->Item_model->table();


        $this->db->join($repairTable , "$repairTable.RepairModeId = $table.RepairModeId");
        $this->db->join($CustomerTable , "$CustomerTable.CustomerId = $table.CustomerId");
        $this->db->join($ItemTable , "$ItemTable.ItemId = $table.ItemId");

        $this->db->select("$table.* , rep_mode_name ,customerName ,ItemName ");


        $d = [
            "page" => "$this->_page/index",
            'records' => $this->model->with('Customer')->get_many_by(['Status'=> 1 ,'inHouse'=> 0 ])
        ];
        //p($d['records']);
        $this->view($d);
    }

    function detail_view($_id){
        $this->check_permission("Job Order","view");
        $d['jobOrder'] = $this->model->get($_id);
//        p( $d['jobOrder']);
        $d['page'] ="$this->_page/detail_view" ;
        $this->view($d);
    }

    function delete($_id){
        $this->check_permission("Job Order","delete");
        $this->model->update($_id,['Status'=>-1]);
        redirect(base_url('joborder/jobList'));
    }


    function passToTechnician($view='add',$id){
        $this->load->model("Job_order_technician_model","JobOrderTechnician");
        if($view == 'view'){
            $this->check_permission("Job Order Technician","view");
            $this->passToTechnicianDetailView($id);
        }
        elseif($view == 'remove'){

            if($this->input->post()){
                $this->form_validation->set_rules("form[JobOrderId]","Job Order  ","required");
                $this->form_validation->set_rules("form[JobOrderTechnicianId]","Technician ","required");

                if( $this->form_validation->run() ) {
                    $this->load->model("Job_order_to_technician_remove");
                    $this->Job_order_to_technician_remove->insert($this->input->post('form'));
                    $this->JobOrderTechnician->update($this->input->post('form[JobOrderTechnicianId]'), ['status' => -1]);
                    $this->model->update($this->input->post('form[JobOrderId]'), ['JobStatus' => 0]);
                    $this->session->set_flashdata('notification',
                        ["alert" => "success", "text" => '<strong>Technician Handover Job Return </strong>']);
                    redirect(current_url());
                }
            }

            $table = $this->model->table();

            $this->load->model('Technician_model');
            $Technician = $this->Technician_model->table();

            $JobOrderTechnician = $this->JobOrderTechnician->table();

            $this->db->join($JobOrderTechnician , "$JobOrderTechnician.JobOrderId = $table.JobOrderId" );
            $this->db->join($Technician , "$JobOrderTechnician.TechnicianId = $Technician.TechnicianId" );

            $this->db->select("$Technician.title , $Technician.technicianName , JobOrderTechnicianId , HandoverDate ,HandoverTime, ComplainDate , ItemId,$table.JobOrderId,JobOrderType,RepairModeId,SerialNo, complainDetails, $table.jobOrderNo  ");
            $this->db->where("$JobOrderTechnician.status",1);
            $records = $this->model->get_many_by(['Status'=> 1 , "JobStatus" => 1 ,'inHouse'=> 0  ]) ;
            $d = [
                "page" => "$this->_page/passToTechnicianRemove",
                'records' => $records
                ];
            $this->view($d);
        }
        else{
            $this->check_permission("Job Order Technician","add");

            $this->form_validation->set_rules("form[JobOrderId]","Job Order  ","required");
            $this->form_validation->set_rules("form[TechnicianId]","Technician ","required");

            if( $this->form_validation->run() ){
                $JobOrderTechnicianId = $this->JobOrderTechnician->insert($this->input->post('form'));
                $this->session->set_flashdata('notification',
                    ["alert"=>"success","text"=>'<strong>Successfully Job Transfer to Technician</strong>'  ]);
                $this->session->set_flashdata("JobOrderTechnicianId",$JobOrderTechnicianId);
                redirect(current_url());
            }

            $table = $this->model->table();

            $this->load->model('Customer_model');
            $CustomerTable = $this->Customer_model->table();

            $this->db->join($CustomerTable , "$CustomerTable.CustomerId = $table.CustomerId");

            $this->db->select("ComplainDate ,$table.CustomerId,ItemId,JobOrderId,JobOrderType,RepairModeId,SerialNo,company,complainDetails,contactPerson,jobOrderNo  ");

            $d = [
                "page" => "$this->_page/passToTechnician",
                'records' => $this->model->get_many_by(['Status'=> 1 , "JobStatus" => 0 ,'inHouse'=> 0  ])
            ];

            $this->view($d);
        }
    }
    
    

    function passToTechnicianDetailView($JobOrderTechnicianId){
        $result = $this->JobOrderTechnician->with('JobOrder')->with('Technician')->get($JobOrderTechnicianId);
//        p($result);
        $d['result'] = $result ;
        $d['page'] = "$this->_page/passToTechnicianDetailView" ;
        $this->view($d);
    }


    function printer_job_close_without_part(){
        $d = $this->_print_job_close();
        $d['page'] = "$this->_page/printer/without_part" ;
        $this->view($d);

    }

    function printer_job_close_with_part(){
        $d = $this->_print_job_close();
        $d['page'] = "$this->_page/printer/with_part" ;
        $this->view($d);
    }

    function _print_job_close(){
        $this->check_permission("Print Job Close","add");
        if($this->input->post()){

            $this->db->trans_start();
            $this->load->model("Job_order_close_model","JobClose");
            $JobCloseId = $this->JobClose->insert($this->input->post('form'));
            $jobOrderNo = $this->model->fields("jobOrderNo")->get($this->input->post('form[JobOrderId]'))->jobOrderNo;
            $filePath = "./Job/".$jobOrderNo;
            mkdir($filePath);
            if(is_dir($filePath)){
                $config['upload_path'] =  "$filePath/";
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '30000';
                $this->load->library('upload', $config);

                $this->file_upload("jobSheet","jobSheet");
                $this->file_upload("BeforeJob","BeforeJob");
                $this->file_upload("AfterJob","AfterJob");
            }

            $this->model->update($this->input->post("form[JobOrderId]"),["JobStatus"=>2]);

            // free or invoice
            if($this->input->post('item')){
                $this->load->model("Technician_hand_item_serial_no","TechnicianHandItemSerialNo");
                $this->load->model("Job_order_close_item_model","JobOrderCloseItem");
                $this->load->model("Job_order_close_item_serial_no_model","JobOrderCloseItemSerialNo");
                $this->load->model("Technician_item_stock_model","TechnicianItemStock");
                foreach ($this->input->post('item[id]') as $k => $ItemId){

                    $this->TechnicianItemStock->update_stock($this->input->post("TechnicianId") , $ItemId , -$this->input->post("item[qty][$k]") );

                    $JobOrderClosedItemId = $this->JobOrderCloseItem->insert([
                        "ItemId" => $ItemId ,
                        "JobOrderClosedId" => $JobCloseId ,
                        "Type" => $this->input->post("item[type][$k]"),
                        "Qty" => $this->input->post("item[qty][$k]")
                    ]);
                    if($this->input->post("item[NewSerialNo][$k]")){
                        foreach ($this->input->post("item[NewSerialNo][$k]")  as $s => $SerialNo){
                            $this->TechnicianHandItemSerialNo->update_by(   ["SerialNo"=> $SerialNo ],["Status"=>0 ]);
                            $SerialNoArray[] = [ "JobOrderClosedItemId" => $JobOrderClosedItemId, 
                                "ItemId" => $ItemId , 
                                "TechnicianId" => $this->input->post("TechnicianId") , 
                                "SerialNo" => $SerialNo ,
                                "OldSerial" =>  $this->input->post("item[OldSerialNo][$k][$s]") ,
                                "Status" => 1
                            ];
                        }
                    }
                }
                if(isset($SerialNoArray)){
                    $this->db->insert_batch( $this->JobOrderCloseItemSerialNo->table() ,$SerialNoArray);
                }
            }

            if($this->input->post('quotation')){
                $this->load->model("Job_order_close_quotation_model","JobOrderCloseQuotation");
                $this->JobOrderCloseQuotation->insert([
                    "JobOrderClosedId" => $JobCloseId ,
                    "JobOrderId" => $this->input->post('form[JobOrderId]') ,
                    "QuotationNo" => $this->input->post("quotation[QuotationNo]") ,
                    "QuotationDate" => $this->input->post("quotation[QuotationDate]") ,
                ]);
            }
            $this->_pass_to_courier();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('notification', ["alert"=>"danger","text"=>'<strong> Some thing Goes Wrong Please Refill the form </strong>']);
            }
            else  {
                $this->session->set_flashdata('notification', ["alert"=>"success","text"=>"<strong> $jobOrderNo Printer Job Order Closed  </strong>"]);
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        $table = $this->model->table();

        $this->load->model('Customer_model');
        $this->load->model('Repair_mode_model','repair');
        $CustomerTable = $this->Customer_model->table();

        $this->db->join($CustomerTable , "$CustomerTable.CustomerId = $table.CustomerId");

        $this->db->select("ComplainDate  ,JobOrderId,JobOrderType,RepairModeId,SerialNo,company,complainDetails,contactPerson,jobOrderNo  ");
        $records = $this->model->with('JOB_TO_TECH')->get_many_by(['Status'=> 1 ,'JobOrderType'=> 'P' , "JobStatus" => 1 ,'inHouse'=> 0 ]);
        // p($records);
        $d['repairs'] = $this->repair->get_many_by(['Status'=>1]) ;
        $d['records'] = $records ;
        return $d;
    }

    function toner_job_close_without_part(){
        $d = $this->_toner_job_close();
        $d['page'] = "$this->_page/toner/without_part" ;
        $this->view($d);

    }

    function toner_job_close_with_part(){
        $d = $this->_toner_job_close();
        $d['page'] = "$this->_page/toner/with_part" ;
        $this->view($d);
    }

    function _toner_job_close(){
        $this->check_permission("Toner Job Close","add");
        if($this->input->post()){

            $this->db->trans_start();

            $this->load->model("Job_order_close_model","JobClose");
            $JobCloseId = $this->JobClose->insert($this->input->post('form'));
            $jobOrderNo = $this->model->fields("jobOrderNo")->get($this->input->post('form[JobOrderId]'))->jobOrderNo;
            $filePath = "./Job/".$jobOrderNo;
            mkdir($filePath);
            if(is_dir($filePath)){
                $config['upload_path'] =  "$filePath/";
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '30000';
                $this->load->library('upload', $config);
                $this->file_upload("jobSheet","jobSheet");
                $this->file_upload("BeforeJob","BeforeJob");
                $this->file_upload("AfterJob","AfterJob");
            }

            $this->model->update($this->input->post("form[JobOrderId]"),["JobStatus"=>2]);

            if( $this->input->post("replace") ){
                $this->load->model("Job_order_close_toner_model","JobOrderCloseToner");
                $this->JobOrderCloseToner->insert( array_merge([ "JobOrderClosedId"=> $JobCloseId , "JobOrderId"=> $this->input->post('form[JobOrderId]') ],$this->input->post("replace")) );
            }

            $this->session->set_flashdata('notification',
                ["alert"=>"success","text"=>"<strong>$jobOrderNo Toner Job Order Closed </strong>"  ]);
            $this->_pass_to_courier();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('notification', ["alert"=>"danger","text"=>'<strong> Some thing Goes Wrong Please Refill the form </strong>']);
            }
            else  {
                $this->session->set_flashdata('notification', ["alert"=>"success","text"=>"<strong> $jobOrderNo Toner Job Order Closed  </strong>"]);
                $this->db->trans_commit();
            }

            redirect(current_url());
        }

        $table = $this->model->table();

        $this->load->model('Customer_model');
        $this->load->model('Repair_mode_model','repair');
        $CustomerTable = $this->Customer_model->table();

        $this->db->join($CustomerTable , "$CustomerTable.CustomerId = $table.CustomerId");

        $this->db->select("ComplainDate ,$table.CustomerId,ItemId,JobOrderId,JobOrderType,RepairModeId,SerialNo,company,complainDetails,contactPerson,jobOrderNo  ");
        $records = $this->model->with('JOB_TO_TECH')->get_many_by(['Status'=> 1 ,'JobOrderType'=> 'T' , "JobStatus" => 1 ,'inHouse'=> 0 ]);
        // p($records);
        $d['repairs'] = $this->repair->get_many_by(['Status'=>1]) ;
        $d['records'] = $records ;
        return $d;
    }

    function _pass_to_courier(){
        if($this->input->post("form[JobStatus]") == 2 ){
            $this->model->update($this->input->post('form[JobOrderId]'),["JobStatus"=>3]);
           /* $this->load->model("Job_order_courier_model","JobOrderCourier");
            $JobOrderType = $this->model->fields("JobOrderType")->get($this->input->post('form[JobOrderId]'))->JobOrderType ;
            $this->JobOrderCourier->insert([
                "JobOrderId" => $this->input->post('form[JobOrderId]') ,
                "JobOrderType" => $JobOrderType ,
                "jobOrderNo" => "WS$JobOrderType"
            ]);*/
        }
    }

    public function file_upload($filename,$rename)
    {
        $this->upload->initialize([
            'file_name' =>$rename
        ],false );

        return $this->upload->do_upload($filename) ? true : false ;
    }

    function service($view="add",$ServiceId=0){
        $this->load->model("Customer_service_model");
        $this->load->model("Customer_service_detail_model");
        if($view=="add"){
            $this->check_permission("Service","add");
            if($this->input->post()){

                $this->db->trans_start();
                $ServiceId = $this->Customer_service_model->insert(["CustomerId" => $this->input->post('CustomerId') ]);

                foreach ($this->input->post('item[ItemId]') as $k => $ItemId ){
                    $post[] = [
                        "ServiceId" => $ServiceId ,
                        "ItemId" => $ItemId ,
                        "SerialNo" => $this->input->post("item[SerialNo][$k]") ,
                    ];
                }
                if(isset($post)){
                    $this->db->insert_batch($this->Customer_service_detail_model->table(), $post );
                }

                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $this->session->set_flashdata('notification', ["alert"=>"danger","text"=>'<strong> Customer Service Not Added Properly Please Try again </strong>']);
                }
                else  {
                    $this->session->set_flashdata('notification', ["alert"=>"success","text"=>"<strong> Customer Service Successfully Added </strong>"]);
                    $this->db->trans_commit();
                }

                redirect(current_url());
            }
            $d['page'] = "$this->_page/service/create";
        }elseif($view == "delete"){
            $this->check_permission("Service","delete");
            $this->Customer_service_model->update($ServiceId,["Status"=>-1]);

            $this->session->set_flashdata('notification', ["alert"=>"success","text"=>"<strong> Customer Service Successfully Deleted </strong>"]);

            redirect(base_url("joborder/service/list"));
        }elseif($view == "complete"){
            $this->check_permission("Service","finish");
            if($this->input->post()){
                $this->db->trans_start();
                $this->load->model("Customer_service_complete_detail_model");
                $this->Customer_service_model->update($ServiceId,["Status"=>0]);
                $this->Customer_service_complete_detail_model->insert_many($this->input->post('Item'));

                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $this->session->set_flashdata('notification', ["alert"=>"danger","text"=>'<strong> Customer Service Complete Failure </strong>']);
                }
                else  {
                    $this->session->set_flashdata('notification', ["alert"=>"success","text"=>"<strong> Customer Service Successfully Completed </strong>"]);
                    $this->db->trans_commit();
                }
                redirect(base_url("joborder/service/list"));
            }

            $this->load->model("technician_model",'technician');
            $d['technicians'] = $this->technician->get_many_by(['status'=> 1]);
            $d['result'] =$this->Customer_service_model->with("ITEM")->with("CUSTOMER")->get($ServiceId);
            $d['page'] = "$this->_page/service/complete";

        }
        else {
            $this->check_permission("Service","view");
            $d['records'] = $this->Customer_service_model->with("ITEM")->with("CUSTOMER")->get_many_by(['Status'=>1]);

            $d['page'] = "$this->_page/service/list";
        }
        
        $this->view($d);
    }

    
    function quotation_job($view,$JobOrderClosedId) {

        $this->load->model('Job_order_close_quotation_model');
        $this->load->model('Customer_model');
        $this->load->model('Job_order_close_model');
        $this->load->model('Repair_mode_model','repair');
        $this->load->model('Joborder_model' );

        if(  $view == 'approved' ){

            $this->load->model('Job_order_technician_model' );
            $this->load->model('Job_order_to_technician_remove' );

            $this->Job_order_close_quotation_model->update_by([ 'JobOrderClosedId'  => $JobOrderClosedId ],['Approved'=>1]);
            $this->Job_order_close_model->update($JobOrderClosedId,['Status'=> -1 ]);
            $jobClose = $this->Job_order_close_model->get($JobOrderClosedId);

            $this->Joborder_model->update($jobClose->JobOrderId ,['JobStatus'=> 0 ]);

            $this->Job_order_technician_model->update_by([ "JobOrderId" => $jobClose->JobOrderId] , ['Status'=> -1  ] );
            $jobOrderTec = $this->Job_order_technician_model->get_by([ "JobOrderId" => $jobClose->JobOrderId] );
            $this->Job_order_to_technician_remove->insert([ 
                'JobOrderTechnicianId' => $jobOrderTec->JobOrderTechnicianId,
                'JobOrderId' => $jobClose->JobOrderId,
                'CancelDate' => date("Y-m-d") ,
                'CancelTime' => date('H:i'),
                'reason' => 'other',
                'note_of_any' => 'Quotation Approved Reprocess'
            ]);


            redirect(base_url('joborder/quotation_job'));
        }elseif(  $view == 'canceled' ){
            $this->Job_order_close_quotation_model->update_by([ 'JobOrderClosedId'  => $JobOrderClosedId ],['Approved'=>-1]);
            redirect(base_url('joborder/quotation_job'));
        }

        $this->load->model("Joborder_model",'model');
        $table = $this->model->table();


        $CustomerTable = $this->Customer_model->table();
        $JobOrderClose = $this->Job_order_close_model->table();

        $this->db->join($CustomerTable , "$CustomerTable.CustomerId = $table.CustomerId");
        $this->db->join($JobOrderClose , "$JobOrderClose.JobOrderId = $table.JobOrderId");
        $this->db->join("job_order_close_quotation" , "job_order_close_quotation.JobOrderId = $table.JobOrderId");
        $this->db->where("$JobOrderClose.PartUsedFor",2);
        $this->db->where("job_order_close_quotation.Approved",0);

        $this->db->select("$JobOrderClose.JobOrderClosedId, ComplainDate  ,$table.JobOrderId,
        $table.JobOrderType,SerialNo,company,complainDetails,contactPerson,jobOrderNo  ");

        $d['quotationJob'] =   $this->model->get_many_by(['Status'=> 1  ]);
        $d['page'] = "$this->_page/quotation";
        $this->view($d);
    }


}