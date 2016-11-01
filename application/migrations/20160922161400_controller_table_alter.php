<?php

class Migration_Controller_table_alter extends CI_Migration
{
    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $this->dbforge->drop_table('controllers', TRUE);
        $fields = [
            "controller_id" => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ] ,
            "name" => [
                'type' => 'VARCHAR',
                'constraint' => 60,
                'unique'=>TRUE
            ] ,
            "methods" => [
                'type' => 'TEXT'
            ]
        ];

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('controller_id',TRUE);
        $this->dbforge->create_table('controllers',TRUE);

        $controllers = array(
            array('controller_id' => '1','name' => 'Customer','methods' => '["add","delete","edit","view"]'),
            array('controller_id' => '2','name' => 'Customer Item','methods' => '["add","delete","view"]'),
            array('controller_id' => '3','name' => 'Courier','methods' => '["add","delete","edit","view"]'),
            array('controller_id' => '4','name' => 'Courier Department ','methods' => '["new order","arrived job","complete job","handover job","backup item"]'),
            array('controller_id' => '5','name' => 'Technician','methods' => '["add","edit","delete","view"]'),
            array('controller_id' => '6','name' => 'Supplier','methods' => '["add","edit","delete","view"]'),
            array('controller_id' => '7','name' => 'Repair Mode','methods' => '["add","edit","delete","view"]'),
            array('controller_id' => '9','name' => 'Model','methods' => '["add","edit","delete","view"]'),
            array('controller_id' => '10','name' => 'Brand','methods' => '["add","edit","delete","view"]'),
            array('controller_id' => '11','name' => 'Type','methods' => '["add","edit","delete","view"]'),
            array('controller_id' => '12','name' => 'Item','methods' => '["add","edit","delete","view"]'),
            array('controller_id' => '13','name' => 'Purchase','methods' => '["add","edit","delete","view"]'),
            array('controller_id' => '14','name' => 'Technician Item','methods' => '["add","delete","view","return"]'),
            array('controller_id' => '15','name' => 'Job Order','methods' => '["add","edit","delete","view"]'),
            array('controller_id' => '16','name' => 'Job Order Technician','methods' => '["add","view"]'),
            array('controller_id' => '17','name' => 'Print Job Close ','methods' => '["add"]'),
            array('controller_id' => '18','name' => 'Toner Job Close ','methods' => '["add"]'),
            array('controller_id' => '19','name' => 'Service','methods' => '["add","delete","view","finish"]'),
            array('controller_id' => '20','name' => 'In House Job To Technician','methods' => '["add","view"]'),
            array('controller_id' => '21','name' => 'In House Print Job Close ','methods' => '["add"]'),
            array('controller_id' => '22','name' => 'In House Toner Job Close ','methods' => '["add"]')
        );
        $this->db->insert_batch("controllers",$controllers); 
        
    }

    public function down(){
        $this->dbforge->drop_table('controllers', TRUE);
        $fields = [
            "contoller_id" => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ] ,
            "controller" => [
                'type' => 'VARCHAR',
                'constraint' => 60,
                'unique'=>TRUE
            ] ,
            "methods" => [
                'type' => 'TEXT'
            ]
        ];

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('contoller_id',TRUE);
        $this->dbforge->create_table('controllers',TRUE);
    }
}