<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Item extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('item_model','model');
    }

    function autocomplete_get(){
        $this->db->group_start()
            ->like('ItemCode', $this->get('str'))
            ->or_like('ItemName', $this->get('str'))
            ->group_end()
            ->select('ItemId,ItemCode,ItemName,has_serial') ;

        $items = $this->model->get_many_by(['status'=>1 ]);
        $this->response($items);
    }
    function autocomplete_with_serial_get(){
        $this->load->model("Item_serial_no",'serial');
        $this->db->join($this->model->table(), "{$this->model->table()}.ItemId = {$this->serial->table()}.ItemId ");
        $this->db->group_start()
            ->like('ItemCode', $this->get('str'))
            ->or_like('ItemName', $this->get('str'))
            ->or_like('SerialNo', $this->get('str'))
            ->group_end()
            ->select("{$this->model->table()}.ItemId,ItemCode,ItemName,SerialNo") ;

        $items = $this->serial->get_many_by(['status'=>1 ]);
        $this->response($items);
    }

    function serialNoFromItemId_get(){
        $this->load->model("Item_serial_no",'serial');
        $this->response($this->serial->fields("SerialNo")->get_many_by(["ItemId" => $this->get('ItemId'), 'Status'=>1 ]) );
    }

    function serial_no_get(){
        $this->load->model("Item_serial_no",'serial');
        $this->load->model("Customer_serial_no");

        $serialNo = $this->db->query("SELECT  SerialNo FROM {$this->serial->table()} WHERE SerialNo = '{$this->get('SerialNo')}'
        UNION SELECT  SerialNo FROM {$this->Customer_serial_no->table()} WHERE  SerialNo = '{$this->get('SerialNo')}' ")->row();

        $this->response([
            "hasError"=> is_object( $serialNo )
        ]);
    }

    function check_qty_get(){ 
        $this->response($this->model->fields('AvaQty')->get($this->get("ItemId")));

    }

}