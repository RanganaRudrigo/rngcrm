<?php

class Courier extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Courier_model','model');
    }

    function autocomplete_get(){
        $this->db->group_start()
            ->like('courier_code', $this->get('str'))
            ->or_like('companyName', $this->get('str'))
            ->or_like('contact_person', $this->get('str'))
            ->group_end()
            ->select('CourierId,companyName');
        $couriers = $this->model->get_many_by(['status'=>1 ]);
        $this->response($couriers);
    }
 
}