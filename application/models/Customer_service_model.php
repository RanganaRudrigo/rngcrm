<?php

class Customer_service_model   extends MY_Model
{
    protected $_table = 'customer_service';
    protected $primary_key = 'ServiceId';

    protected $before_create = ['prop_data_before_create'] ;
    protected $before_update = ['prop_data_before_update'] ;

    var $belongs_to = [
        "CUSTOMER" => ["model"=>"Customer_model","primary_key"=>"CustomerId"]
    ];

    var $has_many = [
        "ITEM" => ["model"=>"Customer_service_detail_model","primary_key"=>"ServiceId"]
    ];
}