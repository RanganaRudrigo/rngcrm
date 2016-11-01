<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 9/12/2016
 * Time: 4:17 PM
 */
class Migration_Customer_item_master  extends CI_Migration
{
    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "CustomerItemId" => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ]  ,
            "CustomerId" => [
                'type' => 'INT',
                'constraint' => 11
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
        $this->dbforge->add_key('CustomerItemId',TRUE);
        $this->dbforge->create_table('customer_item_master',TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('customer_item_master', TRUE);
    }
}