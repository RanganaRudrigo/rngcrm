<?php
 
class TechnicianHand extends MY_Model
{
    protected $_table = 'technician_hand';
    protected $primary_key = 'TechnicianHandId';

    protected $before_create = ['prop_data_before_create'] ;
    protected $before_update = ['prop_data_before_update'] ;
}