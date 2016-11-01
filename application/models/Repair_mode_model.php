<?php

class Repair_mode_model extends MY_Model
{
    protected $_table = 'repair_mode';
    protected $primary_key = 'RepairModeId';

    protected $before_create = ['prop_data_before_create'] ;
    protected $before_update = ['prop_data_before_update'] ;

}