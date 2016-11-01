<?php

class Item extends MY_Controller
{
    private $_page = 'item';

    function __construct(){
        parent::__construct();
        $this->load->model("Item_model",'model');
        $this->load->model("Item_model_model",'itemModel');
        $this->load->model("Item_brand_model",'Brand');
        $this->load->model("Item_type_model",'Type');
    }

    function index(){
        $this->check_permission("Item","view");
        $d = [
            "page" => "$this->_page/index",
            "records" => $this->model->get_many_by(['status >= '=> 0])
        ] ;
        $this->view($d);
    }

    function create(){
        $this->check_permission("Item","add");
        $d = [
            "page" => "$this->_page/create"
        ] ;
        $this->_form(0,$d);
    }

    function detail($_id){
        $this->check_permission("Item","view");
        $result = $this->model->get($_id);
        if( !is_object($result) ) show_404();
        $d = [
            "page" => "$this->_page/view",
            "result" => $result
        ] ;
        $this->_form($_id,$d);
    }

    function edit($_id){
        $this->check_permission("Item","edit");
        $result = $this->model->get($_id);
        if( !is_object($result) ) show_404();
        $d = [
            "page" => "$this->_page/create",
            "result" => $result
        ] ;

        $this->_form($_id,$d);
    }

    function delete($_id){
        $this->check_permission("Item","delete");
        $re = $_id ?  $this->model->update($_id,['status'=>-1]) : false ;
        if( $this->input->is_ajax_request() ){
            echo json_encode( ['response' => $re ? TRUE : FALSE ]  );
        }else{
            redirect(base_url("stock/item"));
        }
    }

    function _form($_id , $d ){
        $d['models'] = $this->itemModel->fields('itemModelId,ItemModelName')->get_many_by(['status'=>1]);
        $d['brands'] = $this->Brand->fields('itemBrandId,ItemBrandName')->get_many_by(['status'=>1]);
        $d['types'] = $this->Type->fields('itemTypeId,ItemTypeName')->get_many_by(['status'=>1]);
        $table = $this->model->table();
//        $this->form_validation->set_rules("form[ItemCode]"," Code","required|is_unique_multi[$table|ItemCode.Status:1.ItemId !=:$_id]");
        $this->form_validation->set_rules("form[ItemTypeId]"," Item Type","required");
        $this->form_validation->set_rules("form[ItemModelId]"," Item Model","required");
        $this->form_validation->set_rules("form[ItemBrandId]"," Item Brand","required");
        $this->form_validation->set_rules("form[ItemName]"," Item Name","required");

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