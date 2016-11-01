<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 6/10/2016
 * Time: 10:54 AM
 */
class Job extends MY_Controller
{

    var $obj = null;
    var $method = "";

    function __construct()
    {
        parent::__construct();
        $this->_checkLogin();
        $this->controller =  get_class();
        $this->load->model("job_model",'model');
        $this->obj =  $this->model->get_all_fields();  
        $this->obj->country_id = 196 ;
        $this->obj->status = 1 ;
    }

    function index(){
        $d['records'] =
            $this->model->join('companies')
                ->join('category')
                ->fields("{$this->model->table()}.*,companies.company_name as company , category.title as job_type")->get_many_by( ['status !=' => 2 ,'status !=' => 3 ]  ) ;
        $this->view("list",$d);
    }

    function create(){
        $this->method = __METHOD__ ;
        $this->_from();
    }

    function edit($id){
        $this->method = __METHOD__ ;
        $this->obj = $this->model->get($id);
        $this->_from();
    }

    function _from(){

        $this->form_validation->set_rules('form[title]', "$this->controller Name", 'required');
        $this->form_validation->set_rules('form[salary]', "Salary", 'price');
        if ($this->form_validation->run() == TRUE){
            if(!empty($this->obj->job_id)){
                if($this->model->update($this->obj->job_id , $this->input->post('form'))){
                    $this->session->set_flashdata('valid', 'Record Inserted Successfully');
                }else{
                    $this->session->set_flashdata('error', 'Record Insert Failure !!!');
                }
            }else{
                if($this->model->insert($this->input->post('form'))){
                    $this->session->set_flashdata('valid', 'Record Inserted Successfully');
                }else{
                    $this->session->set_flashdata('error', 'Record Insert Failure !!!');
                }
            }
            redirect(current_url());
        }else{
            if($this->input->post()){
                $this->session->set_flashdata('error', validation_errors() );
                $this->obj = (object) $this->input->post('form');
            }
        }
        $d['result'] = $this->obj  ;

        $this->load->model('company_model','company');
        $d['companies'] = $this->company->get_many_by(['status'=>1]);

        $this->load->model("country_model",'country');
        $this->load->model("sector_model",'sector');
        $d['countries'] = $this->country->get_all();
        $d['sectors'] = $this->sector->get_many_by(['status'=>1]);

        $this->load->model('category_model','category');
        $d['job_types'] = $this->category->get_many_by(['status' => 1]);

        $d['years_experiences'] =[
            '< 1' , '1 - 3 ','3 - 5 ','5 - 10 ' ,'< 10 '
        ];

        $this->view("create",$d);
    }

    function do_upload($a="",$b="",$c="")   {

        parent::do_upload(true,150,false);
    }


    function request(){
        $job = $this->model->table();
        $d['records'] = $this->model->join('companies')->fields("{$job}.*,companies.company_name as company")->get_many_by( [ 'status' => 3 ]  ) ;
        $this->view("list",$d);
    }

    function createCategory($id){
        $this->load->model('category_model','category');
        $d['records'] = $this->category->get_many_by(['status'=> 1 ]);

        $d['result'] = $this->category->get($id);

        $this->form_validation->set_rules('form[title]',"Tit",'required');
        if($this->form_validation->run()){
            if(is_object($d['result'])){
                $this->category->update($id,$this->input->post('form'));
            }else{
                $this->category->insert($this->input->post('form'));
            }
            redirect(current_url());
        }

        $this->view("category",$d);
    }

    function removeCategory($id){
        $this->load->model('category_model','category');
        echo  json_encode(array('result' => $this->category->update($id , array('status'=>0 ) ) ? 1 : 0 ));
    }


}