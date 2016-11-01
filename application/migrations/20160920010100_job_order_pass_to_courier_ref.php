<?php

class Migration_Job_order_pass_to_courier_ref extends CI_Migration
{
    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "ReferenceNo" => [
                'type' => 'VARCHAR',
                'constraint' => 50  
            ]
        ];
      //  $this->dbforge->add_column('job_order_pass_to_courier', $fields);
    }

    public function down(){
        $this->dbforge->drop_column( 'job_order_pass_to_courier','ReferenceNo');
    }

}