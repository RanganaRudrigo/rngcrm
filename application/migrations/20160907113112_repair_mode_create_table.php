<?php

class Migration_Repair_mode_create_table extends CI_Migration
{
    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "RepairModeId" => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ]  ,
            "repair_code" => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ]  ,
            "rep_mode_name" => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ]  ,
            "has_serial" => [
                'type' => 'INT',
                'constraint' => 1
            ]  ,
            "CreatedBy" => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            "CreatedDate" => [
                'type' => 'DATETIME'
            ],
            "ModifiedBy" => [
                'type' => 'INT',
                'constraint' => 11
            ],
            "ModifiedDate" => [
                'type' => 'DATETIME'
            ],
            "Status" => [
                'type' => 'INT',
                'constraint' => 1,
            ]
        ];

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('RepairModeId',TRUE);
        $this->dbforge->create_table('repair_mode',TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('repair_mode', TRUE);
    }
}