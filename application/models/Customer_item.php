<?php

class Customer_item extends MY_Model
{
    protected $_table = 'customer_item';
    protected $primary_key = 'CustomerItemDetailId';

    var $has_many = [
        "Serial" => ["model" => "Customer_serial_no" ,"primary_key" => "CustomerItemId"  ]
    ];

   // protected $before_create = ['prop_data_before_create'] ;
   // protected $before_update = ['prop_data_before_update'] ;

}