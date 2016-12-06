<?php

class Customer extends MY_Controller
{
    private $_page = 'customer';

    function __construct(){
        parent::__construct();
        $this->load->model("customer_model",'model');
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
        $table = $this->model->table();
        $this->form_validation->set_rules("form[cus_code]","customer Code","required|is_unique_multi[$table|cus_code.Status:1]");

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
        $this->form_validation->set_rules("form[customerName]","customer Name","required");
        //$this->form_validation->set_rules("form[customerName]","customer Name","required|is_unique_multi[$table|customerName.Status:1.CustomerId !=:$_id]");
        $this->form_validation->set_rules("form[company]","Company","required|is_unique_multi[$table|customerName.Status:1.CustomerId !=:$_id]");
        if( $this->form_validation->run() ) {
            $data  = $this->input->post('form');
           if( $_id ? $this->model->update($_id , $data ) : $this->model->insert($data) ) {
                $this->session->set_flashdata('notification', ["alert"=>"success","text"=>'<strong>customer Successfully '.(!$_id?"Created.":"Updated.").'</strong>']);
            }else{
                $this->session->set_flashdata('notification', ["alert"=>"danger","text"=>"<strong> Failure !!!</strong>  "]);
            }
            redirect(current_url());
        }
        $this->view($d);
    }

    function item_load(){
        $this->check_permission("Customer Item","add");
        if($this->input->post()){
            $this->load->model('Customer_item_master','CustomerItemMaster');
            $this->load->model('Customer_item','CustomerItemDetail');
            $this->load->model('Customer_serial_no','CustomerSerialNo');
            $this->load->model("Item_serial_no",'serial');

            $data['CustomerId'] = $this->input->post('form[CustomerId]');

            $this->db->trans_start();
            $CustomerItemId = $this->CustomerItemMaster->insert($data);
            $serialNoList= [];
            //p($this->input->post());
            foreach ($this->input->post('item[id]') as $key => $itemId ){
                $d['CustomerItemId'] = $CustomerItemId;
                $d['ItemId'] = $itemId;
                $d['Qty'] = $this->input->post("item[qty][$key]");
                $d['Property'] = $this->input->post("item[property][$key]");
                $CustomerItemDetailId =  $this->CustomerItemDetail->insert($d);
                //p($this->db->last_query());
                foreach ($this->input->post("item[serial_list][$key]")  as  $serialNo ){
                    $serialNoList[] = [
                        'SerialNo' => $serialNo ,
                        'CustomerItemId' => $CustomerItemDetailId
                    ];
                } 
            }
            $this->db->insert_batch($this->CustomerSerialNo->table(),$serialNoList);
            //p($this->db->last_query());
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('notification', ["alert"=>"danger","text"=>'<strong> Customer Item Load Failure Please Try Again </strong>']);
            }
            else  {
                $this->session->set_flashdata('notification', ["alert"=>"success","text"=>'<strong>Customer Item Successfully loaded </strong>']);
               // $this->db->trans_rollback();
                $this->db->trans_commit();
            }
            redirect(current_url());
        }
        $d['page'] = "$this->_page/load_item";
        $this->view($d);
    }

    function item_load_manage($view,$id){
        $this->check_permission("Customer Item","add");
        if($view== "delete"){
            $this->item_load_delete($id);
            redirect(base_url("Customer/item_load_manage"));
        }
        if($view== "view"){
            $this->item_load_view($id);
        }else{
            $this->check_permission(get_class(),"view");
            $this->load->model('Customer_model','customer');
            $this->load->model('Customer_item_master','CustomerItemMaster');

            $this->db->join($this->customer->table(),"{$this->customer->table()}.{$this->customer->getPrimaryKey()} = {$this->CustomerItemMaster->table()}.CustomerId");
//			$this->db->group_by("{$this->customer->table()}.CustomerId");
            $d['CustomerItem'] = $this->CustomerItemMaster->get_many_by(["Status"=>1]);

            $d['page'] = "$this->_page/load_item_manage";
            $this->view($d);
        }
    }

    function item_load_view($id){
        $this->check_permission("Customer Item","view");
        $this->load->model('Customer_model','customer');
        $this->load->model('Customer_item_master','CustomerItemMaster'); 
        $this->load->model('Customer_serial_no','CustomerSerialNo');
        $this->load->model('item_model','item');

        $this->db->join($this->customer->table(),"{$this->customer->table()}.{$this->customer->getPrimaryKey()} = {$this->CustomerItemMaster->table()}.CustomerId ");
        $d['CustomerItem'] = $this->CustomerItemMaster->with("ItemDetail")->get($id);
        foreach ($d['CustomerItem']->ItemDetail as &$item){
            $item = (object)array_merge((array) $item , (array) $this->item->fields("ItemCode,ItemName")->get($item->ItemId)  );
           $item->serial = $this->CustomerSerialNo->get_many_by(['CustomerItemId'=>$item->CustomerItemDetailId]);
        }
       // p($d['CustomerItem']);
        $d['page'] = "$this->_page/item_load_view";
        $this->view($d);
    }

    function item_load_delete($id){
        $this->check_permission("Customer Item","delete");
        $this->load->model('Customer_item_master','CustomerItemMaster');
        $this->CustomerItemMaster->update($id,['Status'=>0]);

        $this->db->query("update customer_item_serial_no 
join customer_item on 
customer_item.CustomerItemDetailId = customer_item_serial_no.CustomerItemId
set customer_item_serial_no.SerialNo = concat(customer_item_serial_no.SerialNo, '-$id') 
 where customer_item.CustomerItemId = $id ");

    }

}