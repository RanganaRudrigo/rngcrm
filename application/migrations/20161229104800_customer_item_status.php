<?php


class Migration_Customer_item_status extends CI_Migration
{
    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "status" => [
                'type' => 'INT',
                'constraint' => 1 ,
                'default' => 1
            ],
            "isDeleted" => [
                'type' => 'INT',
                'constraint' => 1 ,
                'default' => 0
            ],
            "reason" => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            "previous_customer" => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ]
        ];
        $this->dbforge->add_column('customer_item_serial_no', $fields);
    }

    public function down(){
        $this->dbforge->drop_column( 'customer_item_serial_no','status');
        $this->dbforge->drop_column( 'customer_item_serial_no','isDeleted');
        $this->dbforge->drop_column( 'customer_item_serial_no','reason');
        $this->dbforge->drop_column( 'customer_item_serial_no','previous_customer');
    }
}