<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 8/23/2016
 * Time: 4:36 AM
 */
class Item_brand_model extends MY_Model
{
    protected $_table = 'item_brand';
    protected $primary_key = 'ItemBrandId';

    protected $before_create = ['prop_data_before_create'] ;
    protected $before_update = ['prop_data_before_update'] ;

}