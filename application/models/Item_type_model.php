<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 8/23/2016
 * Time: 4:49 AM
 */
class Item_type_model extends MY_Model
{
    protected $_table = 'item_type';
    protected $primary_key = 'ItemTypeId';

    protected $before_create = ['prop_data_before_create'] ;
    protected $before_update = ['prop_data_before_update'] ;

}