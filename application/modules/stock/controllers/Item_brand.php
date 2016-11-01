<?php

class Item_brand extends MY_Controller
{
    private $_page = 'brand';

    function __construct(){
        parent::__construct();
        $this->load->model("item_brand_model",'model');
    }

    function index(){
        $this->check_permission("Brand","view");
        $d = [
            "page" => "$this->_page/index",
            "records" => $this->model->get_many_by(['status >= '=> 0])
        ] ;
        $this->view($d);
    }

    function create(){
        $this->check_permission("Brand","add");
        $d = [
            "page" => "$this->_page/create"
        ] ;
        $this->_form(0,$d);
    }

    function detail($_id){
        $this->check_permission("Brand","view");
        $result = $this->model->get($_id);
        if( !is_object($result) ) show_404();
        $d = [
            "page" => "$this->_page/view",
            "result" => $result
        ] ;
        $this->_form($_id,$d);
    }

    function edit($_id){
        $this->check_permission("Brand","edit");
        $result = $this->model->get($_id);
        if( !is_object($result) ) show_404();
        $d = [
            "page" => "$this->_page/create",
            "result" => $result
        ] ;

        $this->_form($_id,$d);
    }

    function delete($_id){
        $this->check_permission("Brand","delete");
        $re = $_id ?  $this->model->update($_id,['status'=>-1]) : false ;
        if( $this->input->is_ajax_request() ){
            echo json_encode( ['response' => $re ? TRUE : FALSE ]  );
        }else{
            redirect(base_url("stock/item_brand"));
        }
    }

    function _form($_id , $d ){
        $table = $this->model->table();
        $this->form_validation->set_rules("form[ItemBrandName]","Brand Name","required");
//        $this->form_validation->set_rules("form[ItemBrandName]","Brand Name","required|is_unique_multi[$table|ItemBrandName.Status:1.ItemBrandId !=:$_id]");

        if( $this->form_validation->run() ) {
            $data  = $this->input->post('form');
            if( $_id ? $this->model->update($_id , $data ) : $this->model->insert($data) ) {
                $this->session->set_flashdata('notification', ["alert"=>"success","text"=>'<strong>model Successfully '.(!$_id?"Created.":"Updated.").'</strong>']);
            }else{
                $this->session->set_flashdata('notification', ["alert"=>"danger","text"=>"<strong> Failure !!!</strong>  "]);
            }
            redirect(current_url());
        }
        $this->view($d);
    }

}