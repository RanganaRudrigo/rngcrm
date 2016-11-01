<?php

class Migration_Customer_service_complete_detail_table_create extends CI_Migration
{
    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "ServiceId" => [
                'type' => 'INT',
                'constraint' => 11
            ]  ,
            "ItemId" => [
                'type' => 'INT',
                'constraint' => 11
            ] ,
            "TechnicianId" => [
                'type' => 'INT',
                'constraint' => 11
            ] ,
            "SerialNo" => [
                'type' => 'VARCHAR',
                'constraint' => 10
            ],
            "Note" => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ]
        ];
        $this->dbforge->add_field($fields);
        $this->dbforge->create_table('customer_service_complete_detail',TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('customer_service_complete_detail', TRUE);
    }

}