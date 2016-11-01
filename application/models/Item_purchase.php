<?php

class Item_purchase extends MY_Model
{
    protected $_table = 'item_purchase';
    protected $primary_key = 'PurchaseId';

    protected $before_create = ['prop_data_before_create'] ;
    protected $before_update = ['prop_data_before_update'] ;

}