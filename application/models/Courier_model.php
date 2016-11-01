<?php

class Courier_model  extends MY_Model
{
    protected $_table = 'courier';
    protected $primary_key = 'CourierId';

    protected $before_create = ['prop_data_before_create'] ;
    protected $before_update = ['prop_data_before_update'] ;

}