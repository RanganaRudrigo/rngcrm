<?php

class Migration_Login_history_create_table extends CI_Migration
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
            ]  ,
            "date" => [
                'type' => 'DATETIME'
            ]
        ];

        $this->dbforge->add_field($fields); 
        $this->dbforge->create_table('login_history',TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('login_history', TRUE);
    }
}

