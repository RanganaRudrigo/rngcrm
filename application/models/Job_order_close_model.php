<?php

class Job_order_close_model extends MY_Model
{
    protected $_table = 'job_order_close';
    protected $primary_key = 'JobOrderClosedId';

    protected $before_create = ['prop_data_before_create'] ;
    protected $before_update = ['prop_data_before_update'] ;

    var $belongs_to  = [
        "REPLACE_TONER" => ["model"=>"Job_order_close_toner_model","primary_key"=>"JobOrderClosedId"],
        "JOB" => ["model"=>"Joborder_model","primary_key"=>"JobOrderId"] ,
        "Repair" => ["model"=>"Repair_mode_model","primary_key"=>"RepairModeId"]
    ];

    function get($primary_value)
    {
        $this->order_by($this->primary_key,"Desc");
        return $this->get_by($this->primary_key, $primary_value);
    }
}