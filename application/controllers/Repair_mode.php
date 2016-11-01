<?php

class Repair_mode extends MY_Controller
{
    private $_page = 'repair_mode';

    function __construct(){
        parent::__construct();
        $this->load->model("repair_mode_model",'model');
    }

    function index(){
        $this->check_permission("Repair Mode","view");
        $d = [
            "page" => "$this->_page/index",
            "records" => $this->model->get_many_by(['status >= '=> 0])
        ] ;
        $this->view($d);
    }

    function create(){
        $this->check_permission("Repair Mode","add");
        $d = [
            "page" => "$this->_page/create"
        ] ;
        $this->_form(0,$d);
    }

    function detail($_id){
        $this->check_permission("Repair Mode","view");
        $result = $this->model->get($_id);
        if( !is_object($result) ) show_404();
        $d = [
            "page" => "$this->_page/view",
            "result" => $result
        ] ;
        $this->_form($_id,$d);
    }

    function edit($_id){
        $this->check_permission("Repair Mode","edit");
        $result = $this->model->get($_id);
        if( !is_object($result) ) show_404();
        $d = [
            "page" => "$this->_page/create",
            "result" => $result
        ] ;

        $this->_form($_id,$d);
    }

    function delete($_id){
        $this->check_permission("Repair Mode","delete");
        $re = $_id ?  $this->model->update($_id,['status'=>-1]) : false ;
        if( $this->input->is_ajax_request() ){
            echo json_encode( ['response' => $re ? TRUE : FALSE ]  );
        }else{
            redirect(base_url("$this->_page"));
        }
    }

    function _form($_id , $d ){
        $table = $this->model->table();
        $this->form_validation->set_rules("form[repair_code]","repair Code","required|is_unique_multi[$table|repair_code.Status:1.RepairModeId !=:$_id]");
        if( $this->form_validation->run() ) {
            $data  = $this->input->post('form');
            if( $_id ? $this->model->update($_id , $data ) : $this->model->insert($data) ) {
                $this->session->set_flashdata('notification', ["alert"=>"success","text"=>'<strong>Repair Mode Successfully '.(!$_id?"Created.":"Updated.").'</strong>']);
            }else{
                $this->session->set_flashdata('notification', ["alert"=>"danger","text"=>"<strong> Failure !!!</strong>  "]);
            }
            redirect(current_url()) ;
        }
        $this->view($d);
    }

}