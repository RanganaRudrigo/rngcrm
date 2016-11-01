<?php


class Migration_Job_order_technician_remove_table_create extends CI_Migration
{

    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "JobOrderTechnicianRemoveId" => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ]  ,
            "JobOrderTechnicianId" => [
                'type' => 'INT',
                'constraint' => 11,
            ]  ,
            "JobOrderId" => [
                'type' => 'INT',
                'constraint' => 11,
            ]  ,
            "CancelDate" => [
                'type' => 'DATE'
            ],
            "CancelTime" => [
                'type' => 'TIME'
            ],
            "reason" => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            "note_of_any" => [
                'type' => 'TEXT'
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
        $this->dbforge->add_key('JobOrderTechnicianRemoveId',TRUE);
        $this->dbforge->create_table('job_order_to_technician_remove',TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('job_order_to_technician_remove', TRUE);
    }
}