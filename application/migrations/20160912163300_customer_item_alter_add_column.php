<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 9/12/2016
 * Time: 4:33 PM
 */
class Migration_Customer_item_alter_add_column extends CI_Migration
{

    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    function up(){
        $this->dbforge->drop_table('customer_item', TRUE);
        $fields = [
            "CustomerItemDetailId" => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ] ,
            "CustomerItemId" => [
                'type' => 'INT',
                'constraint' => 11
            ] ,
            "ItemId" => [
                'type' => 'INT',
                'constraint' => 11
            ] ,
            "Qty" => [
                'type' => 'INT',
                'constraint' => 11
            ],
            "Property" => [
                'type' => 'INT',
                'constraint' => 1
            ]
        ];

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('CustomerItemDetailId',TRUE);
        $this->dbforge->create_table('customer_item',TRUE);
    }

    function down(){
        $this->dbforge->drop_table('customer_item', TRUE);
        $fields = [
            "CustomerItemId" => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ] ,
            "CustomerId" => [
                'type' => 'INT',
                'constraint' => 11
            ] ,
            "ItemId" => [
                'type' => 'INT',
                'constraint' => 11
            ] ,
            "Qty" => [
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
        $this->dbforge->create_table('customer_item',TRUE);
    }

}