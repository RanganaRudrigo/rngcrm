<?php

class Migration_Job_order_create_table extends CI_Migration
{
    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "JobOrderId" => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ]  ,
            "jobOrderNo" => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ]  ,
            "SerialNo" => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ]  ,
            "JobOrderType" => [
                'type' => 'ENUM',
                'constraint' => ["P","T"]
            ]  ,
            "CustomerId" => [
                'type' => 'INT',
                'constraint' => 11
            ]  ,
            "ItemId" => [
                'type' => 'INT',
                'constraint' => 11
            ]  ,
            "RepairModeId" => [
                'type' => 'INT',
                'constraint' => 11
            ]  ,
            "ComplainDate" => [
                'type' => 'DATE'
            ]  ,
            "contactPerson" => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ]  ,
            "complainDetails" => [
                'type' => 'TEXT'
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
        $this->dbforge->add_key('JobOrderId',TRUE);
        $this->dbforge->create_table('job_order',TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('job_order', TRUE);
    }
}