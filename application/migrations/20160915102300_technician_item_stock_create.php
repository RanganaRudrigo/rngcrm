<?php

class Migration_Technician_item_stock_create extends CI_Migration
{
    public function __construct() {
        parent::__construct() ;
        $this->load->dbforge() ;
    }

    public function up()
    {
        $fields = [
            "TechnicianId" => [
                'type' => 'INT',
                'constraint' => 11,
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
        $this->dbforge->add_key('TechnicianId',TRUE);
        $this->dbforge->add_key('ItemId',TRUE);
        $this->dbforge->create_table('technician_item_stock',TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('technician_item_stock', TRUE);
    }

}