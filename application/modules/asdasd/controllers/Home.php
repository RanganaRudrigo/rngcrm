<?php 


class Home  extends MY_Controller {

	private $_page = 'joborder';

    function __construct(){
        parent::__construct();
        $this->load->model("Joborder_model",'model');
	}
	
	function index(){

		 $this->load->model("repair_mode_model",'repair');
		$d = [
            "page" => "$this->_page/form", 
            'repair_modes' => $this->repair->get_many_by(['status'=> 1 ])
        ] ;

        
        $this->form_validation->set_rules("form[CustomerId]","Customer ","required");
        $this->form_validation->set_rules("form[ItemId]","Item ","required",['required' => "Select Product to Process " ]);
		$this->form_validation->set_rules("form[RepairModeId]","Repair Mode ","required");

         if( $this->form_validation->run() ) {
            $data  = $this->input->post('form');
        	if($this->model->insert($data )){
        		 $this->session->set_flashdata('notification', ["alert"=>"success","text"=>'<strong>courier Successfully Created</strong>']);
        	} 
        	redirect(current_url());
        } 

        
        $this->view($d);
	}

    function jobList(){

        $table = $this->model->table();

        $this->load->model("repair_mode_model",'repair');
        $repairTable = $this->repair->table();

        $this->load->model('Customer_serial_no','CustomerSerialNo');
        $CustomerSerialNoTable = $this->CustomerSerialNo->table();

        $this->load->model('Customer_item','CustomerItem');
        $CustomerItemTable = $this->CustomerItem->table();

        $this->load->model('Customer_model');
        $CustomerTable = $this->Customer_model->table();

        $this->load->model('Item_model');
        $ItemTable = $this->Item_model->table();


        $this->db->join($repairTable , "$repairTable.RepairModeId = $table.RepairModeId");
        $this->db->join($CustomerTable , "$CustomerTable.CustomerId = $table.CustomerId");
        $this->db->join($ItemTable , "$ItemTable.ItemId = $table.ItemId");

        $this->db->select("$table.* , rep_mode_name ,customerName ,ItemName ");


        $d = [
            "page" => "$this->_page/index", 
            'records' => $this->model->get_many_by(['Status'=> 1 ]) 
        ];

        $this->view($d);
    }

    function delete($_id){
        $this->model->update($_id,['Status'=>-1]);
        redirect(base_url('joborder/jobList'));
    }


    function passToTechnician(){
        $table = $this->model->table();
 
        $this->load->model('Customer_model');
        $CustomerTable = $this->Customer_model->table(); 
 
        $this->db->join($CustomerTable , "$CustomerTable.CustomerId = $table.CustomerId"); 

        $this->db->select("$table.* , company  ");
 
        $d = [
            "page" => "$this->_page/passToTechnician", 
            'records' => $this->model->get_many_by(['Status'=> 1 , "JobStatus" => 0  ]) 
        ];

        $this->view($d);


    }

}