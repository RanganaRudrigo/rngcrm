<?php
 
class Migration_Job_close_create_table extends CI_Migration
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
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ]  ,
            "JobOrderId" => [
                'type' => 'INT',
                'constraint' => 11
            ]  ,
            "JobOrderType" => [
                'type' => 'ENUM',
                'constraint' => ['P','T']
            ]  ,
            "RepairModeId" => [
                'type' => 'INT',
                'constraint' => 11
            ]  ,
            "Note" => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            "EndDate" => [
                'type' => 'DATE'
            ],
            "EndTime" => [
                'type' => 'TIME' 
            ], 
            "JobStatus" => [
                'type' => 'INT',
                'constraint' => 1
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
        $this->dbforge->add_key('JobOrderClosedId',TRUE);
        $this->dbforge->create_table('job_order_close',TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('job_order_close', TRUE);
    }
}