<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 4/27/2016
 * Time: 11:47 PM
 */
class Home extends CI_Controller
{
    function index(){
        if($this->session->has_userdata('user') == FALSE){
            $d['error'] ="";
            $this->form_validation->set_rules('UserLogin[username]','','required');
            $this->form_validation->set_rules('UserLogin[password]','','required|sha1');
            if($this->form_validation->run()){
                 $this->load->model('user_model','user');

                $user = $this->user->get_by([
                    'name' =>  $this->input->post('UserLogin[username]') ,
                    'password' =>  $this->input->post('UserLogin[password]')
                ] ) ;

                if(is_object($user)) {
                    $this->session->set_userdata("user",$user);
                   /* if($this->session->userdata('url'))
                        redirect($this->session->userdata('url'));*/
                    redirect(base_url());
                }else{
                    $d['error'] = "Invalid Username or Password" ;
                }
            }
            $this->load->view('login',$d);
        }else{ 
            if($this->session->has_userdata('url'))
                redirect($this->session->userdata('url'));
            $this->dashboard();
           
        }
    }

    function invalid_browser(){
        echo " <center> <h2> PLEASE USE CHROME  </h2> 
            <a href='https://www.google.com/chrome/browser/desktop/' > Download  </a>
 </center> ";
    }


    function dashboard(){
        $d['technicianHandPrinter'] = $this->_technician_hand_printer_job();
        $d['technicianHandToner'] = $this->_technician_hand_toner_job();
        $d['pendingJob'] = $this->_pending_jobs();
        $d['quotationJob'] = $this->_quotation_jobs();
        $d['partsPendingJob'] = $this->_Parts_Pending_Job();
        $d['notAttendJob'] = $this->_Not_Attend_Jobs();
        $d['workingSolutionJobs'] = $this->_Temporary_Solution();
        $d['collectionPendingJob'] = $this->_Collection_Pending_Report();
        $d['pendingJob'] = $this->_Collection_Pending_Report();

        $this->load->view('dashboard',$d);
    }

    function _technician_hand_printer_job(){
        $this->load->model("Joborder_model",'model');
        $this->load->model("Job_order_technician_model","JobOrderTechnician");
        $table = $this->model->table();

        $this->load->model('Technician_model');
        $Technician = $this->Technician_model->table();

        $JobOrderTechnician = $this->JobOrderTechnician->table();

        $this->db->join($JobOrderTechnician , "$JobOrderTechnician.JobOrderId = $table.JobOrderId" );
        $this->db->join($Technician , "$JobOrderTechnician.TechnicianId = $Technician.TechnicianId" );

      //  $this->db->select("$Technician.title , $Technician.technicianName , JobOrderTechnicianId , HandoverDate ,HandoverTime, ComplainDate , ItemId,$table.JobOrderId,JobOrderType,RepairModeId,SerialNo, complainDetails, $table.jobOrderNo  ");
        $this->db->where("$JobOrderTechnician.status",1);
//        $records = $this->model->get_many_by(['Status'=> 1 , "JobStatus" => 1 ,'inHouse'=> 0  ]) ;
        $records = $this->model->count_by(['Status'=> 1 , "JobStatus" => 1 ,'inHouse'=> 0 , 'JobOrderType' => 'P'  ]) ;
        return $records ;
    }
    function _technician_hand_toner_job(){
        $this->load->model("Joborder_model",'model');
        $this->load->model("Job_order_technician_model","JobOrderTechnician");
        $table = $this->model->table();

        $this->load->model('Technician_model');
        $Technician = $this->Technician_model->table();

        $JobOrderTechnician = $this->JobOrderTechnician->table();

        $this->db->join($JobOrderTechnician , "$JobOrderTechnician.JobOrderId = $table.JobOrderId" );
        $this->db->join($Technician , "$JobOrderTechnician.TechnicianId = $Technician.TechnicianId" );

        //  $this->db->select("$Technician.title , $Technician.technicianName , JobOrderTechnicianId , HandoverDate ,HandoverTime, ComplainDate , ItemId,$table.JobOrderId,JobOrderType,RepairModeId,SerialNo, complainDetails, $table.jobOrderNo  ");
        $this->db->where("$JobOrderTechnician.status",1);
//        $records = $this->model->get_many_by(['Status'=> 1 , "JobStatus" => 1 ,'inHouse'=> 0  ]) ;
        $records = $this->model->count_by(['Status'=> 1 , "JobStatus" => 1 ,'inHouse'=> 0  , 'JobOrderType' => 'T' ]) ;
        return $records ;
    }

    function _pending_jobs(){
        $this->load->model("Joborder_model",'model');
        $table = $this->model->table();

       /// $this->load->model('Customer_model');
       // $this->load->model('Repair_mode_model','repair');
       // $CustomerTable = $this->Customer_model->table();

       // $this->db->join($CustomerTable , "$CustomerTable.CustomerId = $table.CustomerId");
        //$this->db->select("ComplainDate  ,JobOrderId,JobOrderType,RepairModeId,SerialNo,company,complainDetails,contactPerson,jobOrderNo ,JobOrderType  ");
//        return   $this->model->get_many_by(['Status'=> 1 , "JobStatus" => 0 ,'inHouse'=> 0  ]);
        return   $this->model->count_by(['Status'=> 1 , "JobStatus" => 0 ,'inHouse'=> 0  ]);
    }

    function _quotation_jobs(){
        $this->load->model("Joborder_model");
        $this->load->model('Job_order_close_model');
        $this->db->join( $this->Job_order_close_model->table() ,
            "{$this->Job_order_close_model->table()}.{$this->Joborder_model->getPrimaryKey()} = {$this->Joborder_model->table()}.{$this->Joborder_model->getPrimaryKey()}"  )
            ->where([
                "PartUsedFor" => 2 ,
                "{$this->Job_order_close_model->table()}.Status" => 1
            ])->select("{$this->Joborder_model->table()}.* , {$this->Job_order_close_model->table()}.Note as complainDetails");
        return $this->Joborder_model->count_by(["Status"=>1]);


        $this->load->model("Joborder_model",'model');
        $table = $this->model->table();

        $this->load->model('Customer_model');
        $this->load->model('Job_order_close_model');
        $this->load->model('Repair_mode_model','repair');
        $CustomerTable = $this->Customer_model->table();
        $JobOrderClose = $this->Job_order_close_model->table();

        $this->db->join($CustomerTable , "$CustomerTable.CustomerId = $table.CustomerId");
        $this->db->join($JobOrderClose , "$JobOrderClose.JobOrderId = $table.JobOrderId");
        $this->db->where("$JobOrderClose.PartUsedFor",2);

      //  $this->db->select("ComplainDate  ,$table.JobOrderId,$table.JobOrderType,SerialNo,company,complainDetails,contactPerson,jobOrderNo  ");

       // return   $this->model->get_many_by(['Status'=> 1  ]);
        return   $this->model->count_by(['Status'=> 1  ]);
    }

    function _Parts_Pending_Job(){
        if($this->input->get('daterange')){
            $date = explode("-",$this->input->get('daterange'));
            $this->db->where("ComplainDate >=", date("Y-m-d",strtotime($date[0])) );
            $this->db->where("ComplainDate <=", date("Y-m-d",strtotime($date[1])) );
        }

        $this->db->join('job_order_to_technician_remove', "job_order_to_technician_remove.{$this->Joborder_model->getPrimaryKey()} = {$this->Joborder_model->table()}.{$this->Joborder_model->getPrimaryKey()}")
            ->where('reason','part pending');

        return $this->Joborder_model->count_by(["Status"=>1,'JobStatus NOT'=>[2]]);

    }

    function _Not_Attend_Jobs(){
        if($this->input->get('daterange')){
            $date = explode("-",$this->input->get('daterange'));
            $this->db->where("ComplainDate >=", date("Y-m-d",strtotime($date[0])) );
            $this->db->where("ComplainDate <=", date("Y-m-d",strtotime($date[1])) );
        }
        $this->db->join('job_order_to_technician_remove',
            "job_order_to_technician_remove.{$this->Joborder_model->getPrimaryKey()} = {$this->Joborder_model->table()}.{$this->Joborder_model->getPrimaryKey()}",'LEFT')
            ->where('reason',NULL);
        return  $this->Joborder_model
            ->count_by(["Status"=>1 ,'JobStatus'=> 0 , 'inHouse'=>0 ]);

    }

    function _Temporary_Solution(){
        if($this->input->get('daterange')){
            $date = explode("-",$this->input->get('daterange'));
            $this->db->where("ComplainDate >=", date("Y-m-d",strtotime($date[0])) );
            $this->db->where("ComplainDate <=", date("Y-m-d",strtotime($date[1])) );
        }

        $this->db->join('job_order_to_technician_remove', "job_order_to_technician_remove.{$this->Joborder_model->getPrimaryKey()} = {$this->Joborder_model->table()}.{$this->Joborder_model->getPrimaryKey()}")
            ->where('reason','temporary solution');

        return $this->Joborder_model->count_by(["Status"=>1,'JobStatus NOT'=>[2] ]);

    }

    function _Collection_Pending_Report(){
        $this->load->model("Job_pass_to_courier_model","JobPassToCourier");
        return $this->Joborder_model->count_by(['JobStatus'=> [4] ,'Status'=>1 ]);

    }

}