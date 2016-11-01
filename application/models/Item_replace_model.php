<?php

class Item_replace_model extends MY_Model
{
    var $_table ="replace_item";
    var $primary_key ="ReplaceId";

    protected $before_create = ['prop_data_before_create'] ;
    protected $before_update = ['prop_data_before_update'] ;

    var $belongs_with = [
        "Serial" => ["model"=>"Item_serial_no","key"=>"SerialNo"] ,
        "Customer" => ["model"=>"Customer_model","key"=>"CustomerId"] ,
    ];

}