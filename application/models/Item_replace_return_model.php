<?php

 
class Item_replace_return_model extends MY_Model
{
    var $_table ="replace_item_return";
    var $primary_key ="ReplaceReturnId";

    protected $before_create = ['prop_data_before_create'] ;
    protected $before_update = ['prop_data_before_update'] ;

  

}