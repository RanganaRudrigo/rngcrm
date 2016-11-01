<?php

class Job_order_close_model extends MY_Model
{
    protected $_table = 'job_order_close';
    protected $primary_key = 'JobOrderClosedId';

    protected $before_create = ['prop_data_before_create'] ;
    protected $before_update = ['prop_data_before_update'] ;

}