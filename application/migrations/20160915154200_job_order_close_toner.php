<?php

class Migration_Job_order_close_toner extends CI_Migration
{

    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "JobOrderClosedId" => [
                'type' => 'INT',
                'constraint' => 11
            ]  ,
            "JobOrderId" => [
                'type' => 'INT',
                'constraint' => 11
            ]  ,
            "WarrantyStatus" => [
                'type' => 'INT',
                'constraint' => 1
            ],
            "CurrentItemSerialNo" => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            "CurrentItemSerialDate" => [
                'type' => 'DATE'
            ],
            "ReplaceItemSerialNo" => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            "ReplaceItemSerialDate" => [
                'type' => 'DATE'
            ]
        ];

        $this->dbforge->add_field($fields);
        $this->dbforge->create_table('job_order_close_toner',TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('job_order_close_toner', TRUE);
    }

}