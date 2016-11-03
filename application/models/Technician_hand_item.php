<?php
 
class Technician_hand_item extends MY_Model
{
    var $_table = "technician_hand_item";
    var $primary_key = "TechnicianHandItemId";

    var $has_many = [
        "SerialList" => ["model" => "Technician_hand_item_serial_no" ,"primary_key" => "TechnicianHandItemId"  ]
    ];
    var $belongs_to = [
        "Item" => ["model"=>"Item_model","primary_key"=>"ItemId"]
    ];

    function get_many_by()
    {
        $where = func_get_args();
        $this->_set_where($where);
        $this->with('SerialList');
        $this->with('Item');
        return $this->get_all();
    }
}