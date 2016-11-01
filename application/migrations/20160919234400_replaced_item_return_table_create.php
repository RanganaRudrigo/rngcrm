<?php

class Migration_Replaced_item_return_table_create extends CI_Migration
{
    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "ReplaceReturnId" => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ]  ,
            "ReplaceId" => [
                'type' => 'INT',
                'constraint' => 11,
            ]  ,
            "HandoverDate" => [
                'type' => 'DATE'
            ],
            "HandoverTime" => [
                'type' => 'TIME'
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
        $this->dbforge->add_key('ReplaceReturnId',TRUE);
        $this->dbforge->create_table('replace_item_return',TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('replace_item_return', TRUE);
    }
}