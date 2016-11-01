<?php


class Migration_Item_replace_table_create extends CI_Migration
{
    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "ReplaceId" => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ]  ,
            "CustomerId" => [
                'type' => 'INT',
                'constraint' => 11
            ],
            "CourierId" => [
                'type' => 'INT',
                'constraint' => 11
            ],
            "SerialNo" => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
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
        $this->dbforge->add_key('ReplaceId',TRUE);
        $this->dbforge->create_table('replace_item',TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('replace_item', TRUE);
    }

}