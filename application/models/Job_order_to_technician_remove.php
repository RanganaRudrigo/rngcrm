<?php


class Job_order_to_technician_remove extends MY_Model
{

    var $_table ="job_order_to_technician_remove",
        $primary_key = "JobOrderTechnicianRemoveId";

    protected
        $before_create = ['prop_data_before_create'] ,
        $before_update = ['prop_data_before_update'] ;

}