<?php

class Migration_Job_pass_to_courier_table_create extends CI_Migration
{
    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "JobToCourierId" => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ]  ,
            "JobOrderId" => [
                'type' => 'INT',
                'constraint' => 11
            ], 
            "CourierId" => [
                'type' => 'INT',
                'constraint' => 11
            ],
            "HandoverDate" => [
                'type' => 'DATE'
            ],
            "HandoverTime" => [
                'type' => 'TIME'
            ],
            "note_of_any" => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
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
        $this->dbforge->add_key('JobToCourierId',TRUE);
        $this->dbforge->create_table('job_order_pass_to_courier',TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('job_order_pass_to_courier', TRUE);
    }

}