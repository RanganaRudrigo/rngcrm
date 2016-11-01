<?php

class Customer_model extends MY_Model
{
    protected $_table = 'customer';
    protected $primary_key = 'CustomerId';

    protected $before_create = ['prop_data_before_create'] ;
    protected $before_update = ['prop_data_before_update'] ;

}