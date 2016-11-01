<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Technician extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('technician_model','model');
    }

    function autocomplete_get(){
        $this->db->group_start()
            ->like('tec_code', $this->get('str'))
            ->or_like('technicianName', $this->get('str'))
            ->or_like('email', $this->get('str'))
            ->group_end()
            ->select('TechnicianId,tec_code,AreaCode,title,technicianName') ;
        $technicians = $this->model->get_many_by(['status'=>1 ]);
        $this->response($technicians);
    }
    
    function serialNoFromItemId_get(){

        $this->load->model("Job_order_technician_model","JobOrder");
        $this->load->model("Technician_hand","TechnicianHand");
        $this->load->model("Technician_hand_item","TechnicianHandItem");
        $this->load->model("Technician_hand_item_serial_no","TechnicianHandItemSerial");
        
        $JobOrder = $this->JobOrder->table();

        $TechnicianHand = $this->TechnicianHand->table();
        $TechnicianHandKey = $this->TechnicianHand->getPrimaryKey();

        $TechnicianHandItem = $this->TechnicianHandItem->table();
        $TechnicianHandItemKey = $this->TechnicianHandItem->getPrimaryKey();

        $TechnicianHandItemSerial = $this->TechnicianHandItemSerial->table();

        $this->db->join($TechnicianHandItem,"$TechnicianHandItem.$TechnicianHandItemKey = $TechnicianHandItemSerial.$TechnicianHandItemKey ");
        $this->db->join($TechnicianHand,"$TechnicianHand.$TechnicianHandKey = $TechnicianHandItem.$TechnicianHandKey ");
        $this->db->where(
            ["$TechnicianHandItem.ItemId" => $this->get('ItemId') ,
            "$TechnicianHand.TechnicianId" =>  $this->get('TechnicianId') ,
            "$TechnicianHandItemSerial.Status" =>  1
        ]);
        $this->db->group_by("$TechnicianHandItemSerial.SerialNo");
        $records = $this->TechnicianHandItemSerial->fields("$TechnicianHandItemSerial.SerialNo")->get_many_by([]);

        $this->response($records);
    }

    function check_qty_get(){
        $ItemId = $this->get('ItemId');
        $this->load->model("Job_order_technician_model","JobOrder");
        $this->load->model("Technician_item_stock_model","TechnicianItemStock");

        $JobOrder = $this->JobOrder->fields("TechnicianId")->get_by(["JobOrderId"=>$this->get('JobOrderId')]);
        if(is_object($JobOrder)){
            $stock = $this->TechnicianItemStock->fields("Qty")->get_by(["TechnicianId"=> $JobOrder->TechnicianId , "ItemId"=>$this->get('ItemId')]);
            
            if(is_object($stock)){
                $this->response($stock);
            }else{
                $this->response(["Qty"=>0]);
            }
        }else{
            $this->response(["Qty"=>0]);
        }

    }

}