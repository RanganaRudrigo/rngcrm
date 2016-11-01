<?php

class Migration_Job_order_inhouse_field extends CI_Migration
{
    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "inHouse" => [
                'type' => 'INT',
                'constraint' => 1 ,
                'default' => '0'
            ]
        ];
        //$this->dbforge->add_column('job_order', $fields);
    }

    public function down(){
        $this->dbforge->drop_column( 'job_order','inHouse');
    }

}