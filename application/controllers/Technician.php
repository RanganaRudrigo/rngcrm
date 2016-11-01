<?php

class Technician extends MY_Controller
{
    private $_page = 'technician';

    function __construct(){
        parent::__construct();
        $this->load->model("technician_model",'model');
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
        $this->form_validation->set_rules("form[technicianName]","technician Name","required|is_unique_multi[$table|technicianName.Status:1.technicianId !=:$_id]");

        if( $this->form_validation->run() ) {
            $data  = $this->input->post('form');
//            p($data);exit;
            if( $_id ? $this->model->update($_id , $data ) : $this->model->insert($data) ) {
                $this->session->set_flashdata('notification', ["alert"=>"success","text"=>'<strong>technician Successfully '.(!$_id?"Created.":"Updated.").'</strong>']);
            }else{
                $this->session->set_flashdata('notification', ["alert"=>"danger","text"=>"<strong> Failure !!!</strong>  "]);
            }
            redirect(current_url());
        }
        $this->view($d);
    }

    function item_takeout(){
        $this->check_permission("Technician Item","add");
        $this->load->model("Technician_hand","TechnicianHand");
        $this->load->model("Technician_hand_item","TechnicianHandItem");
        $this->load->model("Technician_hand_item_serial_no","TechnicianHandItemSerialNo");
        $this->load->model("Item_serial_no",'serial');
        $this->load->model("Technician_item_stock_model",'TechnicianItemStock');

        $this->form_validation->set_rules("form[TechnicianId]","Technician ","required");
        $this->form_validation->set_rules("item[id]","Item ","required");
        
        if($this->form_validation->run() ){
            $this->db->trans_start();
            $TechnicianHandId = $this->TechnicianHand->insert([
                "TechnicianId" => $this->input->post('form[TechnicianId]')
            ]);
            foreach ($this->input->post('item[id]') as $key => $ItemId ) {
                $TechnicianHandItemId = $this->TechnicianHandItem->insert([
                    "TechnicianHandId" => $TechnicianHandId ,
                    "ItemId" => $ItemId ,
                    "Qty" => $this->input->post("item[qty][$key]")  ,
                ])  ;

                $this->TechnicianItemStock
                    ->update_stock( $this->input->post("form[TechnicianId]") ,
                        $ItemId , $this->input->post("item[qty][$key]") ) ;

                //$SerialNoArray = unique($this->input->post("item[serial][$key]"))
                if($this->input->post("item[serial][$key]")){
                    $serialNoList = [] ;
                    foreach ($this->input->post("item[serial][$key]") as $serialNo ){
                        $this->serial->update($serialNo,["Status"=>0]);
                        $serialNoList[] = [ "SerialNo"=> $serialNo  ,"TechnicianHandItemId" => $TechnicianHandItemId ] ;
                    }
                    $this->db->insert_batch($this->TechnicianHandItemSerialNo->table(),$serialNoList);
                }
            }
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('notification', ["alert"=>"danger","text"=>'<strong> Some thing Goes Wrong Please Refill the form </strong>']);
            }
            else  {
                $this->session->set_flashdata('notification', ["alert"=>"success","text"=>'<strong> Successfully Items Hanover to Technician </strong>']);
                $this->db->trans_commit();
            }
            redirect(current_url());
        }else{
            if($this->input->post()){
                $this->session->set_flashdata('notification', ["alert"=>"danger","text"=> validation_errors() ]);
            }
        }

        $d['page'] = "$this->_page/item_takeout" ;
        $this->view($d);
    }

    function takeout_remove($view="list",$_id=0){

        if($view == "list"){
            $this->check_permission("Technician Item","view");
            $this->load->model("Technician_hand","TechnicianHand");
            $records= $this->TechnicianHand->with('TECH')->get_many_by(["Status"=>1]);

            $d['records'] = $records ;
            $d['page'] = "$this->_page/item_remove" ;
            $this->view($d);
        }else if($view == "delete"){
            $this->check_permission("Technician Item","delete");
            $this->load->model("Item_model","item");
            $this->load->model("Item_serial_no","serial");
            $this->load->model("Technician_hand_item","TechnicianHandItem");
            $this->load->model("Technician_hand_item_serial_no","TechnicianHandItemSerialNo");
            $this->load->model("Technician_hand","TechnicianHand");
            $this->load->model("Technician_item_stock_model");

            $this->db->trans_start();

            $this->TechnicianHand->update($_id,["Status"=>-1]);
            $tech = $this->TechnicianHand->get($_id);
            $TechnicianHandItem = $this->TechnicianHandItem->get_many_by(["TechnicianHandId"=>$_id]);

            foreach ($TechnicianHandItem as $item){
                $this->db->set('AvaQty', "AvaQty + $item->Qty", FALSE);
                $this->item->update($item->ItemId ,[]);
                $this->TechnicianHandItemSerialNo->update_by(   ["TechnicianHandItemId"=>$item->TechnicianHandItemId],["Status"=>-1]);
                $serial = $this->TechnicianHandItemSerialNo->get_many_by(["TechnicianHandItemId"=>$item->TechnicianHandItemId]);
                foreach ($serial as $s ){
                        $this->serial->update( $s->SerialNo ,["Status"=>1]);
                }
                $this->Technician_item_stock_model->update_stock($tech->TechnicianId,$item->ItemId,-$item->Qty);
            }


            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('notification', ["alert"=>"danger","text"=>'<strong> Customer Service Complete Failure </strong>']);
            }
            else  {
                $this->session->set_flashdata('notification', ["alert"=>"success","text"=>"<strong> Customer Service Successfully Completed </strong>"]);
                $this->db->trans_commit();
            }
            redirect(base_url("technician/takeout_remove"));
        }elseif($view == "view"){

            $this->load->model("Item_model","item");
            $this->load->model("Technician_model","Technician");
            $this->load->model("Technician_hand","TechnicianHand");
            $this->load->model("Technician_hand_item","TechnicianHandItem");
            $this->load->model("Technician_hand_item_serial_no","TechnicianHandItemSerialNo");
            $this->load->model("Item_serial_no",'serial');

            $item = $this->item->table();
            $item_key = $this->item->getPrimaryKey();
            $Technician = $this->Technician->table();
            $Technician_key = $this->Technician->getPrimaryKey();
            $TechnicianHand = $this->TechnicianHand->table();
            $TechnicianHand_key = $this->TechnicianHand->getPrimaryKey();
            $TechnicianHandItem = $this->TechnicianHandItem->table();

            $techHand = $this->TechnicianHand->get($_id);
            if(is_object($techHand)) {
                $d["technician"] = $this->Technician->get($techHand->TechnicianId);
            }

            $this->db->join($TechnicianHand , "$TechnicianHand.$TechnicianHand_key = $TechnicianHandItem.$TechnicianHand_key ");
            $this->db->join($Technician , "$TechnicianHand.$Technician_key = $Technician.$Technician_key ");
            $this->db->join($item , "$item.$item_key = $TechnicianHandItem.$item_key ");
            $this->db->where(["$TechnicianHand.CreatedBy"=>$this->user]);
            $this->db->select("$TechnicianHandItem.TechnicianHandItemId,$item.ItemId ,$item.ItemCode  , $TechnicianHandItem.Qty ,  ItemName  ,$TechnicianHand.CreatedDate ");
            $records =  $this->TechnicianHandItem->with("SerialList")->get_many_by(["TechnicianHandId"=>$_id]);
            $d['records'] = $records ;
            $d['page'] = "$this->_page/item_detail_view" ;
            $this->view($d);

        }


    }

    function item_return($view="list",$TechnicianId=0,$ItemId=0){
        $this->check_permission("Technician Item","return");

        $this->load->model("Item_model","item");
        $this->load->model("Technician_item_stock_model","Stock");
        $this->load->model("Technician_items_view_model","techItem");
        $this->load->model("Technician_hand_item_serial_no","TechnicianHandItemSerialNo");
        $this->load->model("Job_order_close_item_serial_no_model","JobOrderCloseItemSerialNo");
        $this->load->model("Item_serial_no","serial");
        if( $this->input->post() ){
            $TechnicianId = $this->input->post("TechnicianId");
            $ItemId = $this->input->post("ItemId");
            $SerialList = $this->input->post("serial_list");
            $damageSerial = $this->input->post("damageSerial");
            $Qty = empty($SerialList) ?  $this->input->post("qty") : count($this->input->post("serial_list"));

            if(!empty($SerialList)){
                $this->TechnicianHandItemSerialNo->update_by(["SerialNo"=>$SerialList],["Status"=>-2]);
                $this->serial->update_by(["SerialNo"=>$SerialList],["Status"=>1]);
            }
            if(!empty($damageSerial)){
                $this->JobOrderCloseItemSerialNo->update_by(["OldSerial"=>$damageSerial],["Status"=>0]);
            }

            $this->Stock->update_stock($TechnicianId,$ItemId,-$Qty);
            $this->db->set('AvaQty', "AvaQty + $Qty", FALSE);
            $this->item->update( $ItemId ,[]);
            redirect(base_url("technician/item_return/items/$TechnicianId"));
        }

        if($view == "list"){
            $d['records'] = $this->model->get_many_by(['status'=> 1]);
            $d['page'] = "$this->_page/item_return_list" ;
        }else{
            $records = $this->Stock->with('ITEM')->get_many_by(['TechnicianId'=>$TechnicianId , "Qty>"=>0]);
            foreach ($records as $record){
                $record->SerialList = $this->techItem->get_many_by(["TechnicianId"=>$TechnicianId , "ItemId" => $record->ItemId , "Status" => 1 ]);
                $record->DamageItems = $this->JobOrderCloseItemSerialNo->get_many_by(["TechnicianId"=>$TechnicianId , "ItemId" => $record->ItemId , "Status" => 1 , "OldSerial !="=>"" ]);
            }
            $d['records'] = $records ;
            $d['technician'] = $this->model->get($TechnicianId);
            $d['page'] = "$this->_page/item_return" ;
        }
        $this->view($d);
    }
    

}