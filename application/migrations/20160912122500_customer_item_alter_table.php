<?php

class Migration_Customer_item_alter_table extends CI_Migration
{

    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "Property" => [
                'type' => 'INT',
                'constraint' => 1 ,
                'default' => 1 ,
                'COMMENT' => "1 : RNG Property , 0 : Customer Property"
            ]
        ];
        $this->dbforge->add_column('customer_item', $fields);
    }

    public function down(){
        $this->dbforge->drop_column( 'customer_item','Property');
    }
}