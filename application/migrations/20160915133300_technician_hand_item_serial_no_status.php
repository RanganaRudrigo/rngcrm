<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 9/15/2016
 * Time: 1:33 PM
 */
class Migration_Technician_hand_item_serial_no_status extends CI_Migration
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
                'default' => '1'
            ]
        ];
        $this->dbforge->add_column('technician_hand_item_serial_no', $fields);
    }

    public function down(){
        $this->dbforge->drop_column( 'technician_hand_item_serial_no','Status');
    }
}