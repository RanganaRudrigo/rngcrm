<?php

class Report extends MY_Controller
{
    var $page = "report";

    function stock_balance(){
        $this->load->model("Item_model","Item");
        $Item =  $this->Item->table();
        $ItemKey =  $this->Item->getPrimaryKey();

        $this->load->model("item_brand_model",'brand');
        $brand =  $this->brand->table();
        $brandKey =  $this->brand->getPrimaryKey();

        $this->load->model("item_model_model",'model');
        $model =  $this->model->table();
        $modelKey =  $this->model->getPrimaryKey();

        $this->load->model("item_type_model",'type');
        $type =  $this->type->table();
        $typeKey =  $this->type->getPrimaryKey();

        $this->load->model("Customer_item",'CusItem');
        $CusItem =  $this->CusItem->table();

        $this->load->model("Job_order_close_item_serial_no_model",'DamageItem');
        $CusItem =  $this->CusItem->table();

        $this->load->model("Job_order_close_item_serial_no_model",'DamageItem');
        $DamageItem =  $this->DamageItem->table();

        $this->db->join("$brand","$Item.$brandKey = $brand.$brandKey","LEFT");
        $this->db->select("$brand.ItemBrandName");
        $this->db->join("$model","$Item.$modelKey = $model.$modelKey","LEFT");
        $this->db->select("$model.ItemModelName");
        $this->db->join("$type","$Item.$typeKey = $type.$typeKey","LEFT");
        $this->db->select("$type.ItemTypeName");

        $this->db->join("$CusItem","$Item.$ItemKey = $CusItem.$ItemKey","LEFT");
        $this->db->select("$CusItem.Qty as cus_qty");

        $this->db->join("$DamageItem","$Item.$ItemKey = $DamageItem.$ItemKey","LEFT");
        $this->db->select("COUNT($DamageItem.ItemId) as dam_qty",FALSE);

        $this->db->group_by("$Item.ItemId");
        $this->db->select("$Item.*");

        $d['records'] = $this->Item->get_many_by(["Status"=>1]);

        $d["page"] = "$this->page/item/stock_balance";
        $this->view($d);
    }
    
    function technician_hand(){
        $this->load->model("Technician_model");
        $Technician =  $this->Technician_model->table();
        $TechnicianKey =  $this->Technician_model->getPrimaryKey();

        $this->load->model("Item_model");
        $Item =  $this->Item_model->table();
        $ItemKey =  $this->Item_model->getPrimaryKey();

        $this->load->model("Technician_item_stock_model");
        $Stock =  $this->Technician_item_stock_model->table();

        $this->db->join($Stock,"$Stock.$TechnicianKey = $Technician .$TechnicianKey");
        $this->db->join($Item,"$Item.$ItemKey = $Stock.$ItemKey");

        $d['records'] = $this->Technician_model->get_many_by(['Status'=>1]);

        $d["page"] = "$this->page/technician_hand";
        $this->view($d);
    }

    function job_order(){
        
        $d['reports'] = [
            'Parts_Pending_Job' ,
            'Quotation_Pending' ,
            'Temporary_Solution' ,
            'Not_Attend_Jobs' ,
            'Workshop_Pending_Report' ,
            'Technician_Wise_Reports' ,
            'Customer_Wise_Reports' ,
            'Completed_Jobs' ,
            'Courier_In_Hand_Reports' ,
            'Collection_Pending_Report' ,
          //  'Daily_Job_Reports' ,
            'Printer_Job' ,
            'Toner_Job' ,
            'All_Jobs' ,
            'All_Pending_Jobs' ,
        ];
        
        $this->load->model("Joborder_model");

        $this->load->model("Customer_model");
        $customers = $this->Customer_model->fields('cus_code,customerName,company,CustomerId')->get_many_by(['Status'=>1]);
        $d['customers'][0] = "All Customer";
        foreach ($customers as $k => $customer ){
            $d['customers'][$customer->CustomerId] =  "$customer->cus_code > $customer->customerName > $customer->company " ;
        }

        $this->load->model("Technician_model");
        $technicians = $this->Technician_model->fields('tec_code,title,technicianName,TechnicianId')->get_many_by(['Status'=>1]);
        $d['technicians'][0] = "All Technician";
        foreach ($technicians as $k => $technician ){
            $d['technicians'][$technician->TechnicianId] =  "$technician->tec_code > $technician->title$technician->technicianName " ;
        }

        $d = array_merge($d,
            $this->input->get('jobType') ? call_user_func([get_class(),"_".$this->input->get('jobType')]) : call_user_func([get_class(),"_All_Jobs"])
                );
        $this->view($d);
    }

    function _Printer_Job(){
        if($this->input->get('daterange')){
            $date = explode("-",$this->input->get('daterange'));
            $this->db->where("ComplainDate >=", date("Y-m-d",strtotime($date[0])) );
            $this->db->where("ComplainDate <=", date("Y-m-d",strtotime($date[1])) );
        }
        $d['records'] =  $this->Joborder_model->with("JOB_TO_TECH")->with("Customer")->with("Item")->with("Repair")->get_many_by(["Status"=>1,'JobOrderType'=>'P']);
        $d["page"] = "$this->page/printer_job"; 
        return $d;
    }
    function _Toner_Job(){
        if($this->input->get('daterange')){
            $date = explode("-",$this->input->get('daterange'));
            $this->db->where("ComplainDate >=", date("Y-m-d",strtotime($date[0])) );
            $this->db->where("ComplainDate <=", date("Y-m-d",strtotime($date[1])) );
        }
        $d['records'] =  $this->Joborder_model->with("JOB_TO_TECH")->with("Customer")->with("Item")->with("Repair")->get_many_by(["Status"=>1,'JobOrderType'=> 'T']);
        $d["page"] = "$this->page/toner_job";
        return $d;
    }

    function _All_Jobs(){
        if($this->input->get('daterange')){
            $date = explode("-",$this->input->get('daterange'));
            $this->db->where("ComplainDate >=", date("Y-m-d",strtotime($date[0])) );
            $this->db->where("ComplainDate <=", date("Y-m-d",strtotime($date[1])) );
        }
        $d['records'] =  $this->Joborder_model->with("JOB_TO_TECH")->with("Customer")->with("Item")->with("Repair")->get_many_by(["Status"=>1]);
        $d["page"] = "$this->page/job_order";
        return $d;
    }

    function _All_Pending_Jobs(){
        $where= [] ;
        $records = [];
        if($this->input->get('daterange')){
            $date = explode("-",$this->input->get('daterange'));
            $where = [
                "ComplainDate >=" => date("Y-m-d",strtotime($date[0])) ,
                "ComplainDate <=" =>  date("Y-m-d",strtotime($date[1]))
            ];
        }

        //_Parts_Pending_Job
        $this->db->join('job_order_to_technician_remove', "job_order_to_technician_remove.{$this->Joborder_model->getPrimaryKey()} = {$this->Joborder_model->table()}.{$this->Joborder_model->getPrimaryKey()}")
            ->where('reason','part pending')
            ->where($where);
        $records =  array_merge($records, add_element($this->Joborder_model->with("JOB_TO_TECH")->with("Customer")->with("Item")->with("Repair")->get_many_by( ["Status"=>1,'JobStatus NOT'=>[2,4]] ) ,
            ['pending_type'=> 'Parts Pending Job' ]) ) ;


        //_Quotation_Pending
        $this->load->model('Job_order_close_model');
        $this->db->join( $this->Job_order_close_model->table() ,
            "{$this->Job_order_close_model->table()}.{$this->Joborder_model->getPrimaryKey()} = {$this->Joborder_model->table()}.{$this->Joborder_model->getPrimaryKey()}"  )
            ->where($where)
            ->where([
                "PartUsedFor" => 2 ,
                "{$this->Job_order_close_model->table()}.Status" => 1  
            ])->select("{$this->Joborder_model->table()}.* , {$this->Job_order_close_model->table()}.Note as complainDetails");
        $records = array_merge($records,
            add_element($this->Joborder_model->with("JOB_TO_TECH")->with("Customer")->with("Item")->with("Repair")->get_many_by( ["Status"=>1,'JobStatus NOT'=>[2,4]] ) ,
                ['pending_type'=> 'Quotation Pending Job' ])
            );

        //_Not_Attend_Jobs
        $this->db->where($where);
        $records =  array_merge($records,
            add_element($this->Joborder_model->with("JOB_TO_TECH")->with("Customer")->with("Item")->with("Repair")
                ->get_many_by( ["Status"=>1 ,'JobStatus'=>1 , 'inHouse'=>0 ] ) ,
                ['pending_type'=> 'Not Attend Jobs' ])
            ) ;

        //_Collection_Pending_Report
        $this->db->where($where);
        $this->load->model("Job_pass_to_courier_model","JobPassToCourier");
        $records = array_merge($records,
            add_element($this->Joborder_model->with("Customer")->with("JOB_TO_TECH")->with("Item")->with("Repair")
                ->get_many_by( ['JobStatus'=>4,'Status'=>1,'inHouse'=> 0 ] ) ,
                ['pending_type'=> 'Collection Pending Jobs' ])) ;

        unique($records,'JobOrderId');
        $d['records'] = $records ;

        $d["page"] = "$this->page/Pending_Jobs";
        return $d;
    }

    function _Parts_Pending_Job(){
        if($this->input->get('daterange')){
            $date = explode("-",$this->input->get('daterange'));
            $this->db->where("ComplainDate >=", date("Y-m-d",strtotime($date[0])) );
            $this->db->where("ComplainDate <=", date("Y-m-d",strtotime($date[1])) );
        }

        $this->db->join('job_order_to_technician_remove', "job_order_to_technician_remove.{$this->Joborder_model->getPrimaryKey()} = {$this->Joborder_model->table()}.{$this->Joborder_model->getPrimaryKey()}")
            ->where('reason','part pending');

        $d['records'] =  $this->Joborder_model->with("JOB_TO_TECH")->with("Customer")->with("Item")->with("Repair")->get_many_by(["Status"=>1,'JobStatus NOT'=>[2,4]]);
        $d["page"] = "$this->page/job_order";
        return $d;
    }

    function _Quotation_Pending(){
        if($this->input->get('daterange')){
            $date = explode("-",$this->input->get('daterange'));
            $this->db->where("ComplainDate >=", date("Y-m-d",strtotime($date[0])) );
            $this->db->where("ComplainDate <=", date("Y-m-d",strtotime($date[1])) );
        }

        $this->load->model('Job_order_close_model');

        $this->db->join( $this->Job_order_close_model->table() ,
            "{$this->Job_order_close_model->table()}.{$this->Joborder_model->getPrimaryKey()} = {$this->Joborder_model->table()}.{$this->Joborder_model->getPrimaryKey()}"  )
            ->where([
                "PartUsedFor" => 2 ,
                "{$this->Job_order_close_model->table()}.Status" => 1
            ])->select("{$this->Joborder_model->table()}.* , {$this->Job_order_close_model->table()}.Note as complainDetails");


        $d['records'] =  $this->Joborder_model->with("JOB_TO_TECH")->with("Customer")->with("Item")->with("Repair")->get_many_by(["Status"=>1,'JobStatus NOT'=>[2,4]]);


        $d["page"] = "$this->page/job_order";
        return $d;
    }

    // still pending
    function _Not_Attend_Jobs(){
        if($this->input->get('daterange')){
            $date = explode("-",$this->input->get('daterange'));
            $this->db->where("ComplainDate >=", date("Y-m-d",strtotime($date[0])) );
            $this->db->where("ComplainDate <=", date("Y-m-d",strtotime($date[1])) );
        }
        $d['records'] =  $this->Joborder_model->with("JOB_TO_TECH")->with("Customer")->with("Item")->with("Repair")
            ->get_many_by(["Status"=>1 ,'JobStatus'=>1 , 'inHouse'=>0 ]);

        $d["page"] = "$this->page/job_order";
        return $d;
    }

    function _Completed_Jobs(){
        if($this->input->get('daterange')){
            $date = explode("-",$this->input->get('daterange'));
            $this->db->where("ComplainDate >=", date("Y-m-d",strtotime($date[0])) );
            $this->db->where("ComplainDate <=", date("Y-m-d",strtotime($date[1])) );
        }

        $this->load->model('Job_order_close_model');

        $this->db->join( $this->Job_order_close_model->table() ,
            "{$this->Job_order_close_model->table()}.{$this->Joborder_model->getPrimaryKey()} = {$this->Joborder_model->table()}.{$this->Joborder_model->getPrimaryKey()}"  )
            ->where([
                "PartUsedFor!=" => 2 ,
                "{$this->Job_order_close_model->table()}.Status" => 1
            ])->select("{$this->Joborder_model->table()}.* , {$this->Job_order_close_model->table()}.Note as complainDetails");



        $d['records'] =  $this->Joborder_model->with("JOB_TO_TECH")->with("Customer")->with("Item")->with("Repair")
            ->get_many_by(["Status"=>1 ,'JobStatus'=>2 ]);


        $d["page"] = "$this->page/job_order";
        return $d;
    }

    function _Customer_Wise_Reports(){
        if($this->input->get('daterange')){
            $date = explode("-",$this->input->get('daterange'));
            $this->db->where("ComplainDate >=", date("Y-m-d",strtotime($date[0])) );
            $this->db->where("ComplainDate <=", date("Y-m-d",strtotime($date[1])) );
        }

        if($this->input->get('Customer')){
            $this->db->where("CustomerId", $this->input->get('Customer') );
        }

        $d['records'] =  $this->Joborder_model->with("JOB_TO_TECH")->with("Customer")->with("Item")->with("Repair")->get_many_by(["Status"=>1]);
        $d["page"] = "$this->page/job_order";
        return $d;
    }


    function _Technician_Wise_Reports(){
        if($this->input->get('daterange')){
            $date = explode("-",$this->input->get('daterange'));
            $this->db->where("ComplainDate >=", date("Y-m-d",strtotime($date[0])) );
            $this->db->where("ComplainDate <=", date("Y-m-d",strtotime($date[1])) );
        }

        $this->load->model('Job_order_technician_model');

        $this->db->join($this->Job_order_technician_model->table() ,
            "{$this->Job_order_technician_model->table()}.{$this->Joborder_model->getPrimaryKey()} = {$this->Joborder_model->table()}.{$this->Joborder_model->getPrimaryKey()}"
        ,"RIGHT");

        if($this->input->get('Technician')){
            $this->db->where("TechnicianId", $this->input->get('Technician') );
        }


        $d['records'] =  $this->Joborder_model->with("JOB_TO_TECH")->with("Customer")->with("Item")->with("Repair")->get_many_by(["Status"=>1]);
        $d["page"] = "$this->page/job_order";
        return $d;
    }

    function _Workshop_Pending_Report(){
        if($this->input->get('daterange')){
            $date = explode("-",$this->input->get('daterange'));
            $this->db->where("ComplainDate >=", date("Y-m-d",strtotime($date[0])) );
            $this->db->where("ComplainDate <=", date("Y-m-d",strtotime($date[1])) );
        }




        $d['records'] =  $this->Joborder_model->with("JOB_TO_TECH")->with("Customer")->with("Item")->with("Repair")
            ->get_many_by(["Status"=>1,'inHouse'=>1 ,'JobStatus !='=>2]);
        $d["page"] = "$this->page/job_order";
        return $d;
    }

    function _Temporary_Solution(){
        if($this->input->get('daterange')){
            $date = explode("-",$this->input->get('daterange'));
            $this->db->where("ComplainDate >=", date("Y-m-d",strtotime($date[0])) );
            $this->db->where("ComplainDate <=", date("Y-m-d",strtotime($date[1])) );
        }

        $this->db->join('job_order_to_technician_remove', "job_order_to_technician_remove.{$this->Joborder_model->getPrimaryKey()} = {$this->Joborder_model->table()}.{$this->Joborder_model->getPrimaryKey()}")
            ->where('reason','temporary solution');

        $d['records'] =  $this->Joborder_model->with("JOB_TO_TECH")->with("Customer")->with("Item")->with("Repair")->get_many_by(["Status"=>1,'JobStatus NOT'=>[2,4]]);
        $d["page"] = "$this->page/job_order";
        return $d;
    }

    function _Courier_In_Hand_Reports(){
        if($this->input->get('daterange')){
            $date = explode("-",$this->input->get('daterange'));
            $this->db->where("ComplainDate >=", date("Y-m-d",strtotime($date[0])) );
            $this->db->where("ComplainDate <=", date("Y-m-d",strtotime($date[1])) );
        }

    /*    $this->load->model('Job_order_close_model');

        $this->db->join( $this->Job_order_close_model->table() ,
            "{$this->Job_order_close_model->table()}.{$this->Joborder_model->getPrimaryKey()} = {$this->Joborder_model->table()}.{$this->Joborder_model->getPrimaryKey()}"  )
            ->where([
                "PartUsedFor!=" => 2 ,
                "{$this->Job_order_close_model->table()}.Status" => 1
            ])->select("{$this->Joborder_model->table()}.* , {$this->Job_order_close_model->table()}.Note as complainDetails");
*/


        $d['records'] =  $this->Joborder_model->with("JOB_TO_TECH")->with("Customer")->with("Item")->with("Repair")
            ->get_many_by(["Status"=>1 ,'JobStatus'=> 3 ]);


        $d["page"] = "$this->page/job_order";
        return $d;
    }

    function _Collection_Pending_Report(){
        $this->load->model("Job_pass_to_courier_model","JobPassToCourier");
        $d['records'] = $this->Joborder_model->with("Customer")->with("JOB_TO_TECH")->with("Item")->with("Repair")->get_many_by(['JobStatus'=>4,'Status'=>1,'inHouse'=> 0 ]);
        $d['page'] ="$this->page/job_order";
//        p( $d['records'] );  exit;
        return $d;
    }

    function purchase_report(){

        $this->load->model("Item_model",'item');
        $this->load->model("Item_purchase",'model');
        $this->load->model("Purchase_item_detail",'detail');
        $this->load->model("Item_serial_no",'serial');

        $this->check_permission("Purchase","view");
        $this->load->model("supplier_model",'supplier');
        $suppliers = $this->supplier->get_many_by(['Status'=>1]);
        $d['suppliers'][0] = "All Suplier";
        foreach ($suppliers as $k => $customer ){
            $d['suppliers'][$customer->SupplierId] =  "$customer->sup_code > $customer->contact_person > $customer->company " ;
        }
        $supplier = $this->supplier->table();
        $supplierKey = $this->supplier->getPrimaryKey();
        $itemPurchase = $this->model->table();
        $this->db->join($supplier,"$supplier.$supplierKey = $itemPurchase.$supplierKey");
        $this->db->select("$itemPurchase.* , title , contact_person , company");
       // p($this->model->with('Items')->get_many_by(['status'=> 1]));
        $d['page'] = "$this->page/purchase_report" ;
        if($this->input->get('Supplier')){
            $this->db->where("$supplier.SupplierId" ,$this->input->get('Supplier')  );
        }
        $d['records'] =$this->model->with('Items')->get_many_by(['status'=> 1]) ;

        $this->view($d);
    }
    
    function Issuing_Parts_Report(){

        $this->load->model('Technician_hand');

        $records = $this->Technician_hand->with('TECH')->with('ITEM')->get_many_by(['Status'=>1]);

        $d['records'] = $records;

        $d["page"] = "$this->page/Issuing_Parts_Report";
        $this->view($d);
    } 

    function Return_Parts_Report(){
        $this->load->model('Technician_hand');

        $records = $this->Technician_hand->with('TECH')->with('ITEM')->get_many_by(['Status'=>1]);

        $d['records'] = $records;

        $d["page"] = "$this->page/Return_Parts_Report";
        $this->view($d);
    }

    function Replacement_Toners_Report(){

        if($this->input->get('daterange')){
            $date = explode("-",$this->input->get('daterange'));
            $this->db->where("EndDate >=", date("Y-m-d",strtotime($date[0])) );
            $this->db->where("EndDate <=", date("Y-m-d",strtotime($date[1])) );
        }

        $this->load->model("Job_order_close_model");
        $d['records'] = $this->Job_order_close_model->with("Repair")->with("REPLACE_TONER")->with("JOB")
            ->get_many_by(['JobOrderType'=>'T','JobStatus'=>2]);
//        p($records);
        $d['page'] ="$this->page/Replacement_Toners_Report";
//        p( $d['records'] );  exit;
        $this->view($d);
    }

    function Feedback(){
        $this->load->model("Joborder_model");
        if($this->input->get('daterange')){
            $date = explode("-",$this->input->get('daterange'));
            $this->db->where("ComplainDate >=", date("Y-m-d",strtotime($date[0])) );
            $this->db->where("ComplainDate <=", date("Y-m-d",strtotime($date[1])) );
        }
        
        $d['records'] =  $this->Joborder_model
            ->with("JOB_TO_TECH") ->with("Close")->with("Customer")->with("Item")->with("Repair")->get_many_by(["Status"=>1]);
        $d["page"] = "$this->page/Feedback";

//        p( $d['records']);
        $this->view($d);
    }
    
}