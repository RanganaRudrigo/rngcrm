<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 9/2/2016
 * Time: 10:02 PM
 */
class Item_serial_no extends MY_Model
{
    var $_table = "item_serial_no";
    var $primary_key = "SerialNo";

    var $belongs_to = [
        "Item" => ["model"=>"item_model","primary_key"=>"ItemId"]
    ];

    

}