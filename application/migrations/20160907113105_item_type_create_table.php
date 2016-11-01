<?php

class Migration_Item_type_create_table extends CI_Migration
{
    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "ItemTypeId" => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ]  ,
            "ItemTypeCode" => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ]  ,
            "ItemTypeName" => [
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
        $this->dbforge->add_key('ItemTypeId',TRUE);
        $this->dbforge->create_table('item_type',TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('item_type', TRUE);
    }
}