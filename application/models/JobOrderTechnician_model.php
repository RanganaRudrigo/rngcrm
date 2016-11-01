<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 9/7/2016
 * Time: 2:55 PM
 */
class JobOrderTechnician_model extends MY_Model
{

    var $_table ="job_order_to_technician",
        $primary_key = "JobOrderTechnicianId";

    protected $before_create = ['prop_data_before_create'] ,
        $after_create = ['prop_data_after_create'] ,
        $before_update = ['prop_data_before_update'] ;

    function prop_data_after_create($_id){

        $this->load->model("Joborder_model");
        $this->Joborder_model->update($this->input->post('form[JobOrderId]'),['JobStatus'=>1]);


    }

}