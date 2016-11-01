<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 9/8/2016
 * Time: 2:53 PM
 */
class Migration_technician_hand_item_serial_no_create_table extends CI_Migration
{

    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "TechnicianHandItemId" => [
                'type' => 'INT',
                'constraint' => 11,
            ]  ,
            "SerialNo" => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ]  ,
        ];

        $this->dbforge->add_field($fields);
        $this->dbforge->create_table('technician_hand_item_serial_no',TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('technician_hand_item_serial_no', TRUE);
    }

}