<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 9/2/2016
 * Time: 9:59 PM
 */
class Purchase_item_detail extends MY_Model
{

    var $_table = "item_purchase_detail";
    var $primary_key = "PurchaseItemDetailId";

    var $belongs_to = [
        "Item" => ["model"=>"item_model","primary_key"=>"ItemId"]
    ];

    function get_many_by()
    {
        $this->with("Item");
        $where = func_get_args();
        $this->_set_where($where);
        return $this->get_all();
    }

}