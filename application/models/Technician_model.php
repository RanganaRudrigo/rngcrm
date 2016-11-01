<?php

class Technician_model extends MY_Model
{
    protected $_table = 'technician';
    protected $primary_key = 'TechnicianId';

    protected $before_create = ['prop_data_before_create'] ;
    protected $before_update = ['prop_data_before_update'] ;

}