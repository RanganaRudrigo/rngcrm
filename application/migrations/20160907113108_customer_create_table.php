<?php

class Migration_Customer_create_table extends CI_Migration {

    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "CustomerId" => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE  
            ] ,
            "cus_code" => [
                'type' => 'VARCHAR',
                'constraint' => 60,
                'unique'=>TRUE
            ] ,
            "AreaCode" => [
                'type' => 'ENUM',
                'constraint' => ['CC','CS','CN','OS'] ,
                'default' =>"CC"
            ] ,
            "customerName" => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            "company" => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            "address" => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            "tel_no" => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            "mob_no" => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            "fax_no" => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            "email" => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
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
        $this->dbforge->add_key('CustomerId',TRUE);
        $this->dbforge->create_table('customer',TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('customer', TRUE);
    }
}