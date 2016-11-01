<?php
 
class Item_model extends MY_Model
{
    protected $_table = 'item';
    protected $primary_key = 'ItemId';

    protected $before_create = ['prop_data_before_create'] ;
    protected $before_update = ['prop_data_before_update'] ;


}