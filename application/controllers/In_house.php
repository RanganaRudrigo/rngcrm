<?php


class In_house extends MY_Controller
{

    private $_page = 'in_house';

    function __construct(){
        parent::__construct();
        $this->load->model("Joborder_model",'model');
    }

    function jobList(){
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
            'records' => $this->model->get_many_by(['Status'=> 1 ,'inHouse'=> 1 ])
        ];

        $this->view($d);
    }

    function passToTechnician($view='add',$id){

        $this->load->model("Job_order_technician_model","JobOrderTechnician");
        if($view == 'view'){
            $this->check_permission("In House Job To Technician","view");
            $this->passToTechnicianDetailView($id);
        }else{
            $this->check_permission("In House Job To Technician","add");

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
                'records' => $this->model->get_many_by(['Status'=> 1 , "JobStatus" => 0 ,'inHouse'=> 1  ])
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
        $this->check_permission("In House Print Job Close","add");
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
                        foreach ($this->input->post("item[NewSerialNo][$k]")  as $s =>  $SerialNo){
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

        $this->db->select("ComplainDate ,ItemId ,JobOrderId,JobOrderType,RepairModeId,SerialNo,company,complainDetails,contactPerson,jobOrderNo  ");
        $records = $this->model->with('Item')->with('JOB_TO_TECH')->get_many_by(['Status'=> 1 ,'JobOrderType'=> 'P' , "JobStatus" => 1 ,'inHouse'=> 1 ]);
        // p($records);
        $d['repairs'] = $this->repair->get_many_by(['Status'=>1]) ;
        $d['records'] = $records ;
        return $d;
    }

    function toner_job_close_without_part(){
        $d = $this->_toner_job_close();
        $d['page'] = "$this->_page/printer/without_part" ;
        $this->view($d);

    }

    function toner_job_close_with_part(){
        $d = $this->_toner_job_close();
        $d['page'] = "$this->_page/toner/with_part" ;
        $this->view($d);
    }

    function _toner_job_close(){
        $this->check_permission("In House Toner Job Close","add");
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
        $records = $this->model->with('Item')->with('JOB_TO_TECH')->get_many_by(['Status'=> 1 ,'JobOrderType'=> 'T' , "JobStatus" => 1 ,'inHouse'=> 1 ]);
        // p($records);
        $d['repairs'] = $this->repair->get_many_by(['Status'=>1]) ;
        $d['records'] = $records ;
        return $d;
    }

    function _pass_to_courier(){
        if($this->input->post("form[JobStatus]") == 2 ){
            $this->model->update($this->input->post('form[JobOrderId]'),["JobStatus"=>3]);
        }
    }

    public function file_upload($filename,$rename)
    {
        $this->upload->initialize([
            'file_name' =>$rename
        ],false );

        return $this->upload->do_upload($filename) ? true : false ;
    }

}