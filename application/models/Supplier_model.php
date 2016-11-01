<?php

class Supplier_model  extends MY_Model
{
    protected $_table = 'supplier';
    protected $primary_key = 'SupplierId';

    protected $before_create = ['prop_data_before_create'] ;
    protected $before_update = ['prop_data_before_update'] ;

}