<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 9/15/2016
 * Time: 1:39 PM
 */
class Migration_Job_order_close extends CI_Migration
{
    function __construct()
    {
        parent::__construct();
        $this->load->dbforge() ;
    }

    function up(){
        $fields = [
            "JobOrderClosedId" => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ]  ,
            "JobOrderId" => [
                'type' => 'INT',
                'constraint' => 11,
            ]  ,
            "JobOrderType" => [
                'type' => 'ENUM',
                'constraint' => ["P","T"],
            ]  ,
            "RepairModeId" => [
                'type' => 'INT',
                'constraint' => 11,
            ]  ,
            "Note" => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ]  ,
            "EndDate" => [
                'type' => 'DATE'
            ] ,
            "EndTime" => [
                'type' => 'TIME'
            ],
            "JobStatus" => [
                'type' => 'INT',
                'constraint' => 1,
            ],
            "PartUsedFor" => [
                'type' => 'INT',
                'constraint' => 1,
                'default' => 0,
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

    function down(){
        $this->dbforge->drop_table('job_order_close', TRUE);
    }
//20160913205400
}
