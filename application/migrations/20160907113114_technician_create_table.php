<?php

class Migration_Technician_create_table extends CI_Migration
{
    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "TechnicianId" => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ]  ,
            "tec_code" => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ]  ,
            "AreaCode" => [
                'type' => 'ENUM',
                'constraint' => ['CC','CS','CN','OS'] ,
                'default' => 'CC'
            ]  , 
            "title" => [
                'type' => 'VARCHAR',
                'constraint' => 5
            ]  ,
            "technicianName" => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ]  ,
            "address" => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ]  ,
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
            "personal_mob_no" => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            "personal_tel_no" => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            "personal_email" => [
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
        $this->dbforge->add_key('TechnicianId',TRUE);
        $this->dbforge->create_table('technician',TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('technician', TRUE);
    }
}