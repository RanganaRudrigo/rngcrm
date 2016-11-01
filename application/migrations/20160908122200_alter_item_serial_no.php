<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 9/8/2016
 * Time: 12:23 PM
 */
class Migration_Alter_item_serial_no extends CI_Migration
{

    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "Status" => [
                'type' => 'INT',
                'constraint' => 1 ,
                'default' => 1 ,
                'COMMENT' => "1 : active , 0 : used"
            ] 
        ];
        $this->dbforge->add_column('item_serial_no', $fields);
    }
    
    public function down(){
        $this->dbforge->drop_column( 'item_serial_no','Status');
    }

}