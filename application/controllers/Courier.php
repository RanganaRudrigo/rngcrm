<?php

class Courier extends MY_Controller
{
    private $_page = 'courier';

    function __construct(){
        parent::__construct();
        $this->load->model("courier_model",'model');
    }

    function index(){
        $this->check_permission(get_class(),"view");
        $d = [
            "page" => "$this->_page/index",
            "records" => $this->model->get_many_by(['status >= '=> 0])
        ] ;
        $this->view($d);
    }

    function create(){
        $this->check_permission(get_class(),"add");
        $d = [
            "page" => "$this->_page/create"
        ] ;
        $this->_form(0,$d);
    }

    function detail($_id){
        $this->check_permission(get_class(),"view");
        $result = $this->model->get($_id);
        if( !is_object($result) ) show_404();
        $d = [
            "page" => "$this->_page/view",
            "result" => $result
        ] ;
        $this->_form($_id,$d);
    }

    function edit($_id){
        $this->check_permission(get_class(),"edit");
        $result = $this->model->get($_id);
        if( !is_object($result) ) show_404();
        $d = [
            "page" => "$this->_page/create",
            "result" => $result
        ] ;

        $this->_form($_id,$d);
    }

    function delete($_id){
        $this->check_permission(get_class(),"delete");
        $re = $_id ?  $this->model->update($_id,['status'=>-1]) : false ;
        if( $this->input->is_ajax_request() ){
            echo json_encode( ['response' => $re ? TRUE : FALSE ]  );
        }else{
            redirect(base_url("$this->_page"));
        }
    }

    function _form($_id , $d ){
        $table = $this->model->table();
        $this->form_validation->set_rules("form[companyName]","company Name","required|is_unique_multi[$table|companyName.Status:1.courierId !=:$_id]");

        if( $this->form_validation->run() ) {
            $data  = $this->input->post('form');
            //p($data);exit;
            if( $_id ? $this->model->update($_id , $data ) : $this->model->insert($data) ) {
                $this->session->set_flashdata('notification', ["alert"=>"success","text"=>'<strong>courier Successfully '.(!$_id?"Created.":"Updated.").'</strong>']);
            }else{
                $this->session->set_flashdata('notification', ["alert"=>"danger","text"=>"<strong> Failure !!!</strong>  "]);
            }
            redirect(current_url());
        }
        $this->view($d);
    }


    function new_request($view= "add",$JobToCourierId){
        $this->check_permission("Courier Department","new order");
        $this->load->model("Job_pass_to_courier_model","JobPassToCourier");
        $this->load->model("Joborder_model",'JobOrder');
        if($view=="add"){
            if($this->input->post()){
                $this->db->trans_start();
                $this->load->model("Job_pass_to_courier_model","JobPassToCourier");
                $this->JobPassToCourier->insert($this->input->post("form"));
                $this->JobOrder->update($this->input->post("form[JobOrderId]"),["JobStatus"=>4]);

                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $this->session->set_flashdata('notification', ["alert"=>"danger","text"=>'<strong> New Job Request Pass To Courier Failed Please Try Again </strong>']);
                }
                else  {
                    $this->session->set_flashdata('notification', ["alert"=>"success","text"=>'<strong>New Job Request Successfully Pass To Courier </strong>']);
                    $this->db->trans_commit();
                }
                redirect(current_url());
            }

//        $this->load->model("Job_order_courier_model","JobOrderCourier");

//        $d['records'] = $this->JobOrderCourier->with("jobOrder")->get_many_by(['Status'=>1]);
            $d['records'] = $this->JobOrder->with("Customer")->get_many_by(['JobStatus'=>3,'Status'=>1,'inHouse'=> 0 ]);
            $d['page'] ="$this->_page/new_request";
//        p($d['records'] );

        }else if($view=="list"){

            $d['records'] = $this->JobPassToCourier->with("jobOrder")->get_many_by(['Status'=>1]);
            $d['page'] ="$this->_page/new_request_list";
//    p( $d['records']);
        }elseif($view=="delete"){

            $this->JobPassToCourier->update($JobToCourierId,['Status'=> 0 ]);
            $JobOrderId = $this->JobPassToCourier->fields("JobOrderId")->get($JobToCourierId)->JobOrderId;
            $this->JobOrder->update( $JobOrderId,["JobStatus"=> 3 ]);
            redirect(base_url("courier/new_request/list"));
        }
        $this->view($d);

    }

    function new_complete_request($view= "add",$JobToCourierId){
        $this->check_permission("Courier Department","complete job");
        $this->load->model("Job_pass_to_courier_model","JobPassToCourier");
        $this->load->model("Joborder_model",'JobOrder');
        if($view=="add"){

            if($this->input->post()){
                $this->db->trans_start();
                $this->load->model("Job_pass_to_courier_model","JobPassToCourier");
                $this->JobPassToCourier->insert($this->input->post("form"));
                $this->JobOrder->update($this->input->post("form[JobOrderId]"),["JobStatus"=>4]);

                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $this->session->set_flashdata('notification', ["alert"=>"danger","text"=>'<strong> New Job Request Pass To Courier Failed Please Try Again </strong>']);
                }
                else  {
                    $this->session->set_flashdata('notification', ["alert"=>"success","text"=>'<strong>New Job Request Successfully Pass To Courier </strong>']);
                    $this->db->trans_commit();
                }
                redirect(current_url());
            }

//        $this->load->model("Job_order_courier_model","JobOrderCourier");

//        $d['records'] = $this->JobOrderCourier->with("jobOrder")->get_many_by(['Status'=>1]);
            $d['records'] = $this->JobOrder->with("Customer")->get_many_by(['JobStatus'=>2,'Status'=>1,'inHouse'=> 1 ]);
            $d['page'] ="$this->_page/new_request";
//        p($d['records'] );

        }else if($view=="list"){


            $d['records'] = $this->JobPassToCourier->with("jobOrder")->get_many_by(['Status'=>1]);
            $d['page'] ="$this->_page/new_request_list";
//    p( $d['records']);
        }elseif($view=="delete"){
            $this->JobPassToCourier->update($JobToCourierId,['Status'=> 0 ]);
            $JobOrderId = $this->JobPassToCourier->fields("JobOrderId")->get($JobToCourierId)->JobOrderId;
            $this->JobOrder->update( $JobOrderId,["JobStatus"=> 3 ]);
            redirect(base_url("courier/new_request/list"));
        }
        $this->view($d);

    }

    function order_arrived(){
        $this->check_permission("Courier Department","arrived job");
        $this->load->model("Job_pass_to_courier_model","JobPassToCourier");
        $this->load->model("Joborder_model",'JobOrder');
        $this->load->model("Job_order_pass_to_courier_close_model");

        if($this->input->post()){
            $this->db->trans_start();
            $JobOrder = $this->JobOrder->get($this->input->post("form[JobOrderId]"));
            unset($JobOrder->JobOrderId);
            unset($JobOrder->Customer);
            unset($JobOrder->Item);
            unset($JobOrder->Repair);
            $JobOrder->jobOrderNo = $this->input->post("form[JobOrderNo]");
            $JobOrder->JobOrderType = $this->input->post("form[JobOrderType]");
            $JobOrder->complainDetails = $this->input->post("form[note_of_any]");
            $JobOrder->inHouse = 1 ;
            $JobOrder->JobStatus = 0 ;
            $JobOrderId = $this->JobOrder->insert((array)$JobOrder);
            $post = $this->input->post("form");
            unset($post["JobOrderNo"]);
            unset($post["JobOrderType"]);
            $this->Job_order_pass_to_courier_close_model->insert($post);
            $this->JobPassToCourier->update( $this->input->post("form[JobToCourierId]") ,["Status"=>0]);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('notification', ["alert"=>"danger","text"=>'<strong> New Job Request Pass To Courier Failed Please Try Again </strong>']);
            }
            else  {
                $this->session->set_flashdata('notification', ["alert"=>"success","text"=>'<strong>New Job Request Successfully Pass To Courier </strong>']);
                $this->db->trans_commit();
            }
            redirect(current_url());
        }
        $this->db->join($this->JobOrder->table(),"{$this->JobOrder->table()}.JobOrderId = {$this->JobPassToCourier->table()}.JobOrderId")->select("{$this->JobPassToCourier->table()}.*");
        $this->db->where("{$this->JobOrder->table()}.inHouse",0);
        $d['records'] = $this->JobPassToCourier->with("jobOrder")->get_many_by(['Status'=>1]);
        $d['page'] ="$this->_page/order_arrived";
//        p($d['records']);
        $this->view($d);
    }
    function item_handover(){
        $this->check_permission("Courier Department","handover job");
        $this->load->model("Job_pass_to_courier_model","JobPassToCourier");
        $this->load->model("Joborder_model",'JobOrder');
        $this->load->model("Job_order_pass_to_courier_close_model");

        if($this->input->post()){
            $post = $this->input->post("form") ;
            unset($post["JobOrderNo"]);
            unset($post["JobOrderType"]);
            $this->Job_order_pass_to_courier_close_model->insert($post);
            $this->JobPassToCourier->update( $this->input->post("form[JobToCourierId]") ,["Status"=>0]);
        }
        $this->db->join($this->JobOrder->table(),"{$this->JobOrder->table()}.JobOrderId = {$this->JobPassToCourier->table()}.JobOrderId")->select("{$this->JobPassToCourier->table()}.*");
        $this->db->where("{$this->JobOrder->table()}.inHouse",1);
        $d['records'] = $this->JobPassToCourier->with("jobOrder")->get_many_by(['Status'=>1]);
        $d['page'] ="$this->_page/order_arrived" ;
        $this->view($d);
    }

    function item_replace_handover($view="add",$_id=0){
        $this->check_permission("Courier Department","backup item");
        $this->load->model("Item_replace_model","ItemReplace");
        $this->load->model("Item_model","Item");
        $this->load->model("Item_serial_no",'serial');
        if($view == "add"){
            if($this->input->post()){

              //  p($this->input->post("form"));
               // exit;

                $this->db->trans_start();


                $this->ItemReplace->insert($this->input->post("form"));
                $this->serial->update($this->input->post("form[SerialNo]"),["Status"=>0]);
                $serial = $this->serial->get($this->input->post("form[SerialNo]"));

                $this->db->set('AvaQty', "AvaQty - 1", FALSE);
                $this->Item->update($serial->ItemId ,[]);

                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $this->session->set_flashdata('notification', ["alert"=>"danger","text"=>'<strong> New Job Request Pass To Courier Failed Please Try Again </strong>']);
                }
                else  {
                    $this->session->set_flashdata('notification', ["alert"=>"success","text"=>'<strong>New Job Request Successfully Pass To Courier </strong>']);
                    $this->db->trans_commit();
                }
                redirect(current_url());
            }
            $d['page'] ="$this->_page/item_replace_handover";
        }
        elseif($view =="take_in"){
            $result = $this->ItemReplace->with("Serial")->get($_id);
            $this->db->set('AvaQty', "AvaQty + 1", FALSE);
            $this->Item->update($result->Serial->ItemId ,[]);
            $this->serial->update($result->SerialNo,["Status"=>1]);
            $this->ItemReplace->update($_id,["Status"=>0]);
            
            $this->load->model("Item_replace_return_model");
            $this->Item_replace_return_model->insert([
                "ReplaceId" => $_id ,
                "HandoverDate" => date('Y-m-d'),
                "HandoverTime" => date('H:i')
            ]);
            
            redirect(base_url("courier/item_replace_handover/list"));
            
        }elseif($view == "delete"){
            $result = $this->ItemReplace->with("Serial")->get($_id);
            $this->db->set('AvaQty', "AvaQty + 1", FALSE);
            $this->Item->update($result->Serial->ItemId ,[]);
            $this->ItemReplace->update($_id,["Status"=>-1]);
            $this->serial->update($result->SerialNo,["Status"=>1]);

            redirect(base_url("courier/item_replace_handover/list"));
        } else{
            $this->load->helper('date'); 


            $d['records'] = $this->ItemReplace->with("Serial")->with("Customer")->get_many_by(["Status"=>1]);
            foreach ($d['records'] as $row){
                $row->Item = $this->Item->get($row->Serial->ItemId);
            }
            $d['page'] ="$this->_page/item_replace_handover_list";
        }

        $this->view($d);
    }

}