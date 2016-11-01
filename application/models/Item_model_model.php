<?php


class Item_model_model extends MY_Model
{
    protected $_table = 'item_model';
    protected $primary_key = 'ItemModelId';

    protected $before_create = ['prop_data_before_create'] ;
    protected $before_update = ['prop_data_before_update'] ;

}