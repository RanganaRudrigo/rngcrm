<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 4/28/2016
 * Time: 12:11 AM
 */
class User_model extends MY_Model
{
    protected $_table = 'user_tab';
    protected $primary_key = 'user_id';
    protected $protected_attributes = array( 'id' );

    protected $before_create = ['prop_data_before_create'] ;
    protected $before_update = ['prop_data_before_update'] ;

    protected $after_get = array('remove_sensitive_fields');

    protected function remove_sensitive_fields($user){
        unset($user->password);
        unset($user->date); 
        unset($user->status);
        unset($user->code);
        return $user;
    }

}