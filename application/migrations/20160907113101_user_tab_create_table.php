<?php

class Migration_User_tab_create_table extends CI_Migration
{
    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "user_id" => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ]  ,
            "type" => [
                'type' => 'INT',
                'constraint' => 1
            ]   ,
            "name" => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ]   ,
            "password" => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ]   ,
            "rule" => [
                'type' => 'TEXT'
            ]   ,
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
        $this->dbforge->add_key('user_id',TRUE);
        $this->dbforge->create_table('user_tab',TRUE);
       /* $this->db->insert("user_tab",[
            'user_id' => '1', 
            'type' => '1', 
            'name' => 'admin', 
            'password' => '7c4a8d09ca3762af61e59520943dc26494f8941b', 
            'rule' => "[]",
            'CreatedBy' => '0', 
            'CreatedDate' => '2016-07-24 18:29:19', 
            'ModifiedBy' => '0', 
            'ModifiedDate' => '2016-07-24 18:29:19', 
            'Status' => '1'
        ]);*/
    }

    public function down()
    {
        $this->dbforge->drop_table('user_tab', TRUE);
    }
}