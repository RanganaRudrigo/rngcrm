<?php

class System_controllers extends MY_Controller
{

    function __construct(){
        parent::__construct();
        $this->load->model("System_model",'sys');
    }
    
    function index(){
        $this->check_permission(get_class(),"index");
         $d = [
            "controllers" => $this->sys->get_all() ,
            "page" => "controller_crud"
        ] ;
        $this->_form();
        $this->view($d);
    }

    function delete($UserId){
        $this->check_permission(get_class(),"delete");
        $re = $UserId ?  $this->sys->update($UserId,['status'=>0]) : false ;
        if( $this->input->is_ajax_request() ){
            echo json_encode( ['response' => $re ? TRUE : FALSE ]  );
        }else{
            redirect(base_url('user'));
        }
    }

    function methods($str){
        $str = explode(",", $str);
        return json_encode($str)  ;
    }

    function edit($id){
        $this->check_permission(get_class(),"edit");
    	$controller = $this->sys->get($id);
    	if(!is_object($controller)) show_404();
    	$controller->methods = implode(",", json_decode($controller->methods,true));
 		$d = [
            "controllers" => $this->sys->get_all() ,
            "page" => "controller_crud"  ,
            "result" => $controller
        ] ;
        $this->_form($id);
        $this->view($d);
    }

    function _form($Controller_id = 0){

    	$this->form_validation->set_rules("name","Controller Name","required");
    	$this->form_validation->set_rules("methods","Controller methods","required|callback_methods");

    	if( $this->form_validation->run() ){
    		if($Controller_id){
    			$this->sys->update( $Controller_id , $this->input->post() );
    		}else{
    			$this->sys->insert($this->input->post());
    		}
    		redirect( current_url() );	
    	}

    }

}