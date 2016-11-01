<?php


class Migration_Item_create_table extends CI_Migration
{
    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "ItemId" => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ] ,
            "ItemTypeId" => [
                'type' => 'INT',
                'constraint' => 11
            ] ,
            "ItemModelId" => [
                'type' => 'INT',
                'constraint' => 11
            ] ,
            "ItemBrandId" => [
                'type' => 'INT',
                'constraint' => 11
            ]  ,
            "ItemCode" => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ]  ,
            "ItemName" => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ]  ,
            "AvaQty" => [
                'type' => 'INT',
                'constraint' => 11
            ]  ,
            "has_serial" => [
                'type' => 'INT',
                'constraint' => 1
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
        $this->dbforge->add_key('ItemId',TRUE);
        $this->dbforge->create_table('item',TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('item', TRUE);
    }
}