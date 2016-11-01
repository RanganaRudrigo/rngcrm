<?php

class Migration_Job_order_close_item extends CI_Migration
{

    function __construct()
    {
        parent::__construct();
        $this->load->dbforge() ;
    }

    function up(){
       // $this->dbforge->drop_table('job_order_close_item', TRUE);
        $fields = [
            "JobOrderClosedItemId" => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ]  ,
            "JobOrderClosedId" => [
                'type' => 'INT',
                'constraint' => 11,
            ]  ,
            "Type" => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ]  ,
            "ItemId" => [
                'type' => 'INT',
                'constraint' => 11
            ]  ,
            "Qty" => [
                'type' => 'INT',
                'constraint' => 11
            ]
        ];

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('JobOrderClosedItemId',TRUE);
        $this->dbforge->create_table('job_order_close_item',TRUE);
    }

    function down(){
        $this->dbforge->drop_table('job_order_close_item', TRUE);
    }
//20160913205400
} 