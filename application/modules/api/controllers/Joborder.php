<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Joborder extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model','model');
    }

    function autocomplete_get(){
        $this->db->group_start()
                ->like('cus_code', $this->get('str'))
                ->or_like('customerName', $this->get('str'))
                ->or_like('company', $this->get('str'))
                ->group_end()
                ->select('CustomerId,company');
        $customers = $this->model->get_many_by(['status'=>1 ]);
        $this->response($customers);
    }

    function product_get(){
        $this->load->model('Customer_serial_no','CustomerSerialNo');
        $CustomerSerialNoTable = $this->CustomerSerialNo->table();

        $this->load->model('Customer_item','CustomerItem');
        $CustomerItemTable = $this->CustomerItem->table();

        $this->load->model('Customer_item_master','CustomerItemMaster');
        $CustomerItemMaster = $this->CustomerItemMaster->table();

        $this->load->model('Customer_model');
        $CustomerTable = $this->Customer_model->table();

        $this->load->model('Item_model');
        $ItemTable = $this->Item_model->table();


        $this->db->from($CustomerSerialNoTable )
        ->join($CustomerItemTable , "$CustomerSerialNoTable.CustomerItemId = $CustomerItemTable.CustomerItemId" )
        ->join($CustomerItemMaster , "$CustomerItemMaster.CustomerItemId = $CustomerItemTable.CustomerItemId" )
        ->join($CustomerTable , "$CustomerTable.CustomerId = $CustomerItemMaster.CustomerId" )
        ->join($ItemTable , "$ItemTable.ItemId = $CustomerItemTable.ItemId" )

        ->where([
            "$CustomerItemMaster.Status" => 1 ,
            "$CustomerTable.Status" => 1 ,
            "$ItemTable.Status" => 1 
            ]);

         $this->db->group_start()
                    ->like('cus_code', $this->get('str'))
                    ->or_like('customerName', $this->get('str'))
                    ->or_like('company', $this->get('str'))
                    ->or_like('ItemCode', $this->get('str'))
                    ->or_like('ItemName', $this->get('str')) 
                    ->or_like('SerialNo', $this->get('str')) 
                ->group_end(); 

        $this->db->group_by("$CustomerSerialNoTable.SerialNo");
        $this->db->select("SerialNo,cus_code,customerName,$CustomerTable.AreaCode,company,$CustomerTable.CustomerId,$ItemTable.ItemId,ItemCode,ItemName");


        $this->response($this->db->get()->result());




    }

     
}