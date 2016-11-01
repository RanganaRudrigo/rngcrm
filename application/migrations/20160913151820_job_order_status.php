<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 9/12/2016
 * Time: 4:09 PM
 */
class Migration_Job_order_status extends CI_Migration
{

    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
		 
        $fields = [
            "JobStatus" => [
                'type' => 'INT',
                'constraint' => 1 ,
                'default' => 0
            ]
        ];
        $this->dbforge->add_column('job_order', $fields);
    }

    public function down(){
        $this->dbforge->drop_column( 'job_order','JobStatus');
    }
}