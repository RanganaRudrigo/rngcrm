<?php

class Job_order_pass_to_courier_close_model extends MY_Model
{
    var $_table = "job_order_pass_to_courier_close";
    var $primary_key = "CourierJobOrderId";

    protected $before_create = ['prop_data_before_create'] ;
    protected $before_update = ['prop_data_before_update'] ;
}