<?php


class Migration_Customer_item_serial_no_create_table extends CI_Migration {

    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "SerialNo" => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ] ,
            "CustomerItemId" => [
                'type' => 'INT',
                'constraint' => 11
            ]
        ];

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('SerialNo',TRUE);
        $this->dbforge->create_table('customer_item_serial_no',TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('customer_item_serial_no', TRUE);
    }
}