<?php

 
class Migration_Technician_area_code extends CI_Migration
{

    public function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up()
    {
		$this->dbforge->drop_column( 'technician','AreaCode');
        $fields = [
            "AreaCode" => [
                'type' => 'ENUM',
                'constraint' => ['CC','CS','CN','OS'] ,
                'default' => 'CC'
            ]
        ];
        $this->dbforge->add_column('technician', $fields);
    }

    public function down(){
        $this->dbforge->drop_column( 'technician','AreaCode');
    }
}