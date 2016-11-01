<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Supplier extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('supplier_model','model');
    }

    function autocomplete_get(){
        $this->db->group_start()
                ->like('sup_code', $this->get('str'))
                ->or_like('contact_person', $this->get('str'))
                ->or_like('company', $this->get('str'))
                ->group_end()
                ->select('SupplierId,company');
        $Supplers = $this->model->get_many_by(['status'=>1 ]);
        $this->response($Supplers);
    }

     
}