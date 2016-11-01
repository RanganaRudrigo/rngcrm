<?php


class Migration_Job_order_close_star extends CI_Migration
{

    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "star" => [
                'type' => 'INT',
                'constraint' => 1
            ]
        ];
        $this->dbforge->add_column('job_order_close', $fields);
    }

    public function down(){
        $this->dbforge->drop_column( 'job_order_close','star');
    }

}