<?php

class Migration_Technician_hand_item_create_table extends CI_Migration
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
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ]  ,
            "TechnicianHandId" => [
                'type' => 'INT',
                'constraint' => 11
            ]   ,
            "ItemId" => [
                'type' => 'INT',
                'constraint' => 11
            ],
            "Qty" => [
                'type' => 'INT',
                'constraint' => 11
            ]
        ];

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('TechnicianHandItemId',TRUE);
        $this->dbforge->create_table('technician_hand_item',TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('technician_hand_item', TRUE);
    }
}