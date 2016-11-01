<?php


class User extends MY_Controller
{

    private $_page = 'user';

    function __construct(){
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("System_model",'sys');
    }

    function index(){
        $d = [
            "users" => $this->user_model->get_many_by(['status'=>1]) ,
            "page" => "$this->_page/index"
        ] ;
        $this->view($d);
    }

    function create(){
        $this->check_permission(get_class(),"create");
        $d = [
            "controllers" => $this->sys->get_all(),
            "page" => "$this->_page/create"
        ] ;
        $this->form_validation->set_rules("form[password]","User Name","required|sha1");
        $this->_form(0,$d);
    }

    function edit($UserId){
        $this->check_permission(get_class(),"edit");
        $user = $this->user_model->get($UserId);
        if( !is_object($user) ) show_404();

        $d = [
            "result" => $user ,
            "controllers" => $this->sys->get_all(),
            "page" => "$this->_page/create"
        ] ;
        $this->form_validation->set_rules("form[password]","User Name","sha1");
        $this->_form($UserId,$d);
    }

    function delete($UserId){
        $this->check_permission(get_class(),"delete");
        $re = $UserId ?  $this->user_model->update($UserId,['status'=>0]) : false ;
        if( $this->input->is_ajax_request() ){
            echo json_encode( ['response' => $re ? TRUE : FALSE ]  );
        }else{
            redirect(base_url('user'));
        }
    }

    function _form($UserId , $d ){

        $this->form_validation->set_rules("form[name]","Username","required");

        if( $this->form_validation->run() ) {
            $data  = $this->input->post('form');
            if(empty($data['password'])){
                unset($data['password']);
            }
            $data['role'] = json_encode($this->input->post('methods'));
            if( $UserId ? $this->user_model->update($UserId , $data ) : $this->user_model->insert($data) ) {
                $this->session->set_flashdata('notification', ["alert"=>"success","text"=>'<strong>User Successfully</strong> '.(!$UserId?"Created":"Updated")]);
            }else{
                $this->session->set_flashdata('notification', ["alert"=>"danger","text"=>"<strong> Failure !!!</strong>  "]);
            }
            redirect(current_url());
        }

        $this->view($d);

    }


}