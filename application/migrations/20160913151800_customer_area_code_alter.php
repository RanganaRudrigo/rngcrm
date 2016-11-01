<?php

 
class Migration_Customer_area_code_alter extends CI_Migration
{

    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
		$this->dbforge->drop_column( 'customer','AreaCode');
        $fields = [
            "AreaCode" => [
                'type' => 'ENUM',
                'constraint' => ['CC','CS','CN','OS'] ,
                'default' => 'CC'
            ]
        ];
        $this->dbforge->add_column('customer', $fields);
    }

    public function down(){
        $this->dbforge->drop_column( 'customer','AreaCode');
    }
}