<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 9/12/2016
 * Time: 4:23 PM
 */
class Customer_item_master extends MY_Model
{
    protected $_table = 'customer_item_master';
    protected $primary_key = 'CustomerItemId';

    var $has_many = [
        "ItemDetail" => ["model" => "Customer_item" ,"primary_key" => "CustomerItemId"  ]
    ];

    protected $before_create = ['prop_data_before_create'] ;
    protected $before_update = ['prop_data_before_update'] ;
}