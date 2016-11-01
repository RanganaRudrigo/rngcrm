<?php

class CustomerItem extends MY_Model
{
    protected $_table = 'customer_item';
    protected $primary_key = 'CustomerItemId';

    protected $before_create = ['prop_data_before_create'] ;
    protected $before_update = ['prop_data_before_update'] ;

}