<?php
 
class Technician_hand_item extends MY_Model
{
    var $_table = "technician_hand_item";
    var $primary_key = "TechnicianHandItemId";

    var $has_many = [
        "SerialList" => ["model" => "Technician_hand_item_serial_no" ,"primary_key" => "TechnicianHandItemId"  ]
    ];
}