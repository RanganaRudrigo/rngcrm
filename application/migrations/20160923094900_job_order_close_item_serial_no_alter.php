<?php

class Migration_Job_order_close_item_serial_no_alter extends CI_Migration
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
                'constraint' => 11
            ] ,
            "Status" => [
                'type' => 'INT',
                'constraint' => 1 ,
                'default' => 1
            ]
        ];
        $this->dbforge->add_column('job_order_close_item_serial_no', $fields);
        $this->db->query("
        update job_order_close_item_serial_no  
left join job_order_close_item  on
    job_order_close_item.JobOrderClosedItemId = job_order_close_item_serial_no.JobOrderClosedItemId
left join job_order_close on 
	job_order_close.JobOrderClosedId = job_order_close_item.JobOrderClosedId
left join job_order_to_technician on 
	job_order_to_technician.JobOrderId = job_order_close.JobOrderId
set
     job_order_close_item_serial_no.TechnicianId = job_order_to_technician.TechnicianId
     ");
    }

    public function down(){
        $this->dbforge->drop_column( 'job_order_close_item_serial_no','TechnicianId');
        $this->dbforge->drop_column( 'job_order_close_item_serial_no','Status');
    }

}