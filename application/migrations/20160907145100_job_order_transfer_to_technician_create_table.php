<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 9/7/2016
 * Time: 2:52 PM
 */
class Migration_Job_order_transfer_to_technician_create_table extends CI_Migration
{

    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "JobOrderTechnicianId" => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ]  ,
            "JobOrderId" => [
                'type' => 'INT',
                'constraint' => 11
            ]  ,
            "TechnicianId" => [
                'type' => 'INT',
                'constraint' => 11
            ]  ,
            "HandoverDate" => [
                'type' => 'DATE'
            ]  ,
            "HandoverTime" => [
                'type' => 'TIME'
            ]  ,
            "note_of_any" => [
                'type' => 'VARCHAR',
                'constraint' => 255
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
        $this->dbforge->add_key('JobOrderTechnicianId',TRUE);
        $this->dbforge->create_table('job_order_to_technician',TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('job_order_to_technician', TRUE);
    }

}