<?php

class Purchase extends MY_Controller
{
    private $_page = 'purchase';

    function __construct(){
        parent::__construct();
        $this->load->model("Item_model",'item');
        $this->load->model("Item_purchase",'model');
        $this->load->model("Purchase_item_detail",'detail');
        $this->load->model("Item_serial_no",'serial');
    }

    function index(){
        $this->check_permission("Purchase","view");
        $this->load->model("supplier_model",'supplier');
        $supplier = $this->supplier->table();
        $supplierKey = $this->supplier->getPrimaryKey();
        $itemPurchase = $this->model->table();
        $this->db->join($supplier,"$supplier.$supplierKey = $itemPurchase.$supplierKey");
        $this->db->select("$itemPurchase.* , title , contact_person , company");
        $d = [
            "page" => "$this->_page/index",
            "records" => $this->model->get_many_by(['status'=> 1])
        ] ;
        $this->view($d);
    }

    function create(){
        $this->check_permission("Purchase","add");
        $d = [
            "page" => "$this->_page/form"
        ] ;
        $this->_form(0,$d);
    }

    function detail($_id){
        $this->check_permission("Purchase","view");
        $result = $this->model->get($_id);
        if( !is_object($result) ) show_404();
        $d = [
            "page" => "$this->_page/view",
            "result" => $result
        ] ;
        $this->_form($_id,$d);
    }

    function edit($_id){
        $this->check_permission("Purchase","edit");
        $result = $this->model->get($_id);
        if( !is_object($result) ) show_404();
        $d = [
            "page" => "$this->_page/form",
            "result" => $result
        ] ;

        $this->_form($_id,$d);
    }

    function delete($_id){
        $this->check_permission("Purchase","delete");
        $this->db->trans_start();

        $re = $_id ?  $this->model->update($_id,['status'=>-1]) : false ;
        $this->detail->update_by(["PurchaseId"=>$_id],["Status"=>-1]);
        $purchaseDetail = $this->detail->fields("PurchaseItemDetailId,ItemId,Qty")->get_many_by(["PurchaseId"=>$_id]);
        foreach ($purchaseDetail  as $item ){
            $this->serial->delete_by(["PurchaseItemDetailId"=>$item->PurchaseItemDetailId]);
            $this->db->set('AvaQty', "AvaQty - $item->Qty", FALSE);
            $this->item->update($item->ItemId,[]);
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('notification', ["alert"=>"danger","text"=>'<strong> Purchased Record Failure Please Try Again </strong>']);
        }
        else  {
            $this->session->set_flashdata('notification', ["alert"=>"success","text"=>'<strong>Purchased Record Successfully Created </strong>']);
            $this->db->trans_commit();
        }
        if( $this->input->is_ajax_request() ){
            echo json_encode( ['response' => $re ? TRUE : FALSE ]  );
        }else{
            redirect(base_url("$this->_page"));
        }
    }

    function _form($_id , $d ){

         $this->form_validation->set_rules("form[SupplierId]","Supplier","required");

        if( $this->form_validation->run()  )  {

            $this->db->trans_start();
            $PurchaseId  = $this->model->insert(['SupplierId' => $this->input->post('form[SupplierId]') ]);
            foreach( $this->input->post("item[id]") as  $key => $item_id  ){

                $PurchaseItemDetailId = $this->detail->insert([
                        'PurchaseId' =>  $PurchaseId ,
                        'ItemId' =>  $item_id ,
                        "Qty" => $this->input->post("item[qty][$key]"),
                        "Status" =>1
                ]);

                if($this->input->post("item[serial_list][$key]"))
                    foreach ( $this->input->post("item[serial_list][$key]") as $serial_list ) {
                        /* $this->serial->insert([
                            'PurchaseItemDetailId' =>  $PurchaseItemDetailId ,
                            'SerialNo' =>  $serial_list ,
                            'ItemId' =>  $item_id
                        ]); */
                        $serialList[] = [
                            'PurchaseItemDetailId' =>  $PurchaseItemDetailId ,
                            'SerialNo' =>  $serial_list ,
                            'ItemId' =>  $item_id
                        ];
                    }
            }
            if(isset($serialList)){
                $this->db->insert_batch($this->serial->table(),$serialList);
            }
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('notification', ["alert"=>"danger","text"=>'<strong> Item Purchased Failure Please Try Again </strong>']);
            }
            else  {
                $this->session->set_flashdata('notification', ["alert"=>"success","text"=>'<strong>Item Purchased Successfully Created </strong>']);
                $this->db->trans_commit();
            }

            redirect(current_url());
        }
        $this->view($d);
    }

    function view_detail($PurchaseId){
        $this->check_permission("Purchase","view");
        $Purchase = $this->model->get($PurchaseId);
        if(is_object($Purchase)){
            $this->load->model("supplier_model","supplier");
            $item = $this->item->table();
            $itemKey = $this->item->getPrimaryKey();
            $supplier =  $this->supplier->get($Purchase->SupplierId);
            $this->db->join($item,"$item.$itemKey = {$this->detail->table()}.$itemKey");
            $PurchaseDetails = $this->detail->get_many_by(["PurchaseId"=>$PurchaseId]);
            foreach ($PurchaseDetails as $detail){
                $detail->serialList = $this->serial->get_many_by(["PurchaseItemDetailId"=>$detail->PurchaseItemDetailId]);
            }
            $d['PurchaseDetails'] = $PurchaseDetails;
            $d['supplier'] = $supplier;
            $d['PurchaseId'] = $PurchaseId;
            $d['page'] = "$this->_page/view_detail";
//            p($d);
            $this->view($d);
        }
    }

}