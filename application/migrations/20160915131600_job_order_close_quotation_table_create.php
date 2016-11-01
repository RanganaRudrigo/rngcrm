<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 9/15/2016
 * Time: 1:17 PM
 */
class Migration_Job_order_close_quotation_table_create extends CI_Migration
{
    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
        $fields = [
            "JobOrderClosedId" => [
                'type' => 'INT',
                'constraint' => 11
            ]  ,
            "JobOrderId" => [
                'type' => 'INT',
                'constraint' => 11
            ]  ,
            "QuotationNo" => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            "QuotationDate" => [
                'type' => 'DATE'
            ]
        ];

        $this->dbforge->add_field($fields);
        $this->dbforge->create_table('job_order_close_quotation',TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('job_order_close_quotation', TRUE);
    }
}