<?php

class Trash extends MY_Controller
{

    private $_page = 'trash';

    function customer(){
        $this->load->model("customer_model",'model');
        $this->check_permission(get_class(),"view");
        $d = [
            "page" => "$this->_page/customer",
            "records" => $this->model->get_many_by(['status'=> -1 ])
        ] ;
        $this->view($d);
    }

    function technician(){
        $this->load->model("technician_model",'model');
        $this->check_permission(get_class(),"view");
        $d = [
            "page" => "$this->_page/technician",
            "records" => $this->model->get_many_by(['status'=> -1 ])
        ] ;
        $this->view($d);
    }

    function courier(){
        $this->load->model("courier_model",'model');
        $this->check_permission(get_class(),"view");
        $d = [
            "page" => "$this->_page/courier",
            "records" => $this->model->get_many_by(['status'=> -1 ])
        ] ;
        $this->view($d);
    }

    function supplier(){
        $this->load->model("supplier_model",'model');
        $this->check_permission(get_class(),"view");
        $d = [
            "page" => "$this->_page/supplier",
            "records" => $this->model->get_many_by(['status'=> -1 ])
        ] ;
        $this->view($d);
    }

    function repair_mode(){
        $this->load->model("repair_mode_model",'model');
        $this->check_permission(get_class(),"view");
        $d = [
            "page" => "$this->_page/repair_mode",
            "records" => $this->model->get_many_by(['status'=> -1 ])
        ] ;
        $this->view($d);
    }

    function item_type(){
        $this->load->model("item_type_model",'model');
        $this->check_permission(get_class(),"view");
        $d = [
            "page" => "$this->_page/item_type",
            "records" => $this->model->get_many_by(['status'=> -1 ])
        ] ;
        $this->view($d);
    }

    function item_brand(){
        $this->load->model("item_brand_model",'model');
        $this->check_permission(get_class(),"view");
        $d = [
            "page" => "$this->_page/item_brand",
            "records" => $this->model->get_many_by(['status'=> -1 ])
        ] ;
        $this->view($d);
    }
    
    function item_model(){
        $this->load->model("item_model_model",'model');
        $this->check_permission(get_class(),"view");
        $d = [
            "page" => "$this->_page/item_model",
            "records" => $this->model->get_many_by(['status'=> -1 ])
        ] ;
        $this->view($d);
    }
    
    function item(){
        $this->load->model("item_model",'model');
        $this->check_permission(get_class(),"view");
        $d = [
            "page" => "$this->_page/item",
            "records" => $this->model->get_many_by(['status'=> -1 ])
        ] ;
        $this->view($d);
    }
    
    function purchase(){
        $this->load->model("item_purchase",'model');
        $this->load->model("supplier_model",'supplier');
        $supplier = $this->supplier->table() ;
        $supplierKey = $this->supplier->getPrimaryKey() ;
        $itemPurchase = $this->model->table() ;
        $this->db->join($supplier,"$supplier.$supplierKey = $itemPurchase.$supplierKey");
        $this->db->select("$itemPurchase.* , title , contact_person , company");
        $d = [
            "page" => "$this->_page/purchase",
            "records" => $this->model->get_many_by(['status'=> -1])
        ] ;
        
        
        $this->view($d);
    }

}