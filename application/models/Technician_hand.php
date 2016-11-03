<?php
 
class Technician_hand extends MY_Model
{
    protected $_table = 'technician_hand';
    protected $primary_key = 'TechnicianHandId';

    protected $before_create = ['prop_data_before_create'] ;
    protected $before_update = ['prop_data_before_update'] ;

    var $belongs_to = [
        "TECH" => ["model"=>"Technician_model","primary_key"=>"TechnicianId"]
    ];
    var $has_many = [
        "ITEM" => ["model"=>"Technician_hand_item","primary_key"=>"TechnicianHandId"]
    ];
 
}