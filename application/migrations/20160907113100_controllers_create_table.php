<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Controllers_create_table extends CI_Migration {

    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
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

    public function down()
    {
        $this->dbforge->drop_table('controllers', TRUE);
    }
}