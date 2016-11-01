<?php

class Migration_Item_purchase_detail_create_table extends CI_Migration
{
    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "PurchaseItemDetailId" => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ]  ,
            "PurchaseId" => [
                'type' => 'INT',
                'constraint' => 11
            ]  ,
            "ItemId" => [
                'type' => 'INT',
                'constraint' => 11
            ]  ,
            "Qty" => [
                'type' => 'INT',
                'constraint' => 11
            ]  ,
            "Status" => [
                'type' => 'INT',
                'constraint' => 1,
            ]
        ];

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('PurchaseItemDetailId',TRUE);
        $this->dbforge->create_table('item_purchase_detail',TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('item_purchase_detail', TRUE);
    }
}

