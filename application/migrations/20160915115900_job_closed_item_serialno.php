<?php


class Migration_Job_closed_item_serialno  extends CI_Migration
{

    function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    function up(){
        $fields = [
            "JobOrderClosedItemId" => [
                'type' => 'INT',
                'constraint' => 11,
            ]  ,
            "ItemId" => [
                'type' => 'INT',
                'constraint' => 11
            ]  ,
            "SerialNo" => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ]
        ];

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('SerialNo',TRUE);
        $this->dbforge->create_table('job_order_close_item_serial_no',TRUE);
    }

    function down(){
        $this->dbforge->drop_table('job_order_close_item_serial_no', TRUE);
    }
}