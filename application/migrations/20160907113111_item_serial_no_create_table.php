<?php

class Migration_Item_serial_no_create_table extends CI_Migration
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
            ]  ,
            "ItemId" => [
                'type' => 'INT',
                'constraint' => 11
            ],"SerialNo" => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ]
        ];

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('SerialNo',TRUE);
        $this->dbforge->create_table('item_serial_no',TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('item_serial_no', TRUE);
    }
}

