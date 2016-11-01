<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 9/7/2016
 * Time: 2:55 PM
 */
class Job_order_technician_model extends MY_Model
{

    var $_table ="job_order_to_technician",
        $primary_key = "JobOrderTechnicianId";

    protected $before_create = ['prop_data_before_create'] ,
        $after_create = ['prop_data_after_create'] ,
        $before_update = ['prop_data_before_update'] ;

    var $belongs_to = [
        "JobOrder" => ["model"=>"Joborder_model","primary_key"=>"JobOrderId"] ,
        "Technician" => ["model"=>"Technician_model","primary_key"=>"TechnicianId"] ,
    ];

    function __construct()
    {
        parent::__construct();
    }

     public function get($primary_value)
    {
        $this->db->where('Status',1);
        return $this->get_by($this->primary_key, $primary_value);
    }

    function prop_data_after_create($_id){

        $this->load->model("Joborder_model");
        $this->Joborder_model->update($this->input->post('form[JobOrderId]'),['JobStatus'=>1]);


    }

}