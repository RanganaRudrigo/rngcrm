<?php

class Migration_Job_order_close_item_old_serial_no extends CI_Migration
{

    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "OldSerial" => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ]
        ];
      //  $this->dbforge->add_column('job_order_close_item_serial_no', $fields);
    }

    public function down(){
        $this->dbforge->drop_column( 'job_order_close_item_serial_no','OldSerial');
    }

}