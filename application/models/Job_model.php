<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 6/10/2016
 * Time: 11:35 AM
 */
class Job_model extends MY_Model
{

    protected $primary_key = 'job_id';
    protected $_table = 'jobs';
    protected $after_get = array('remove_sensitive_fields');
    protected $before_create = array("prop_data");
    protected $after_create = ['generate_code'];
    protected $return_type ="array";
    protected $_private_fields = ['date','user_id'] ;
    protected $public_field = [] ;

    function __construct()
    {
        parent::__construct(); 
        $this->has_one['companies'] = array('company_id','company_id',"$this->_table.*,companies.title");
        $this->has_one['category'] = array('job_type','category_id',"$this->_table.*,category.title");
        $this->has_one['sectors'] = array('sector_id','sector_id',"$this->_table.*,sector.title");
    }

    protected function remove_sensitive_fields($data)
    {
        return (object)array_diff_key($data, array_flip($this->_private_fields) );
    }

    protected function prop_data($data)
    {
        $data['date'] = date("Y-m-d H:i:s");
        $data['user_id'] = $this->session->has_userdata("user") ? $this->session->userdata("user")->id : 0 ;
        return $data;
    }

    protected function generate_code($company_id){
        $this->update($company_id,['code' =>  "JOB-$company_id" ]);
    }

    public function get_filer_field($field){
        $result =  $this->db->from($this->_table)->select("$field")->group_by($field)
            ->where("status",1)->get()->result_array();
        foreach ($result as $k => &$row)
            $result[$k] = $row[$field];
       return $result;
    }

    public function front_get_by($where=[]){
        return parent::get_by(array_merge($where,[
            'status' =>1 ,
            " end_date >=" => date('Y-m-d'),
            " start_date <=" => date('Y-m-d')
        ] ));
    }

    public function front_get_many_by($where=[]){
        return parent::get_many_by(array_merge($where,[
            'status' =>1 ,
            " end_date >=" => date('Y-m-d'),
            " start_date <=" => date('Y-m-d')
        ] ));
    }

     function get_job_group_by_type(){
        $result = $this->db->select("job_type")->group_by("job_type")->where("status",1)->get("$this->_table")->result_array();
        foreach ($result as &$row){
            $row['jobs'] = $this->db->from($this->_table)
                ->join("companies","companies.company_id = $this->_table.company_id")
                ->where("$this->_table.status",1)
                ->where("$this->_table.job_type",$row['job_type'])
                ->where("companies.status",1)
                ->where("end_date >=",date('Y-m-d'))
                ->select("$this->_table.job_id ,$this->_table.title , $this->_table.salary_min , $this->_table.salary_max  , companies.company_name as company",false )
                ->limit(LIMIT)
                ->get()->result();
        }
        return $result ;
    }

    function get_job_group_by_country(){

        $countries = $this->db->from("companies")
            ->join("country","companies.country_id = country.country_id")
            ->select("companies.country_id ,country.name")
            ->group_by("companies.country_id ")
            ->limit(5)
            ->get()->result_array();

        foreach ($countries as &$country){
            $country['jobs'] = $this->db->from($this->_table)
                ->join("companies","companies.company_id = $this->_table.company_id")
                ->where("companies.country_id ",$country['country_id'] )
                ->where("$this->_table.status",1)
                ->where("companies.status",1)
                ->where("end_date >=",date('Y-m-d'))
                ->where("start_date <=",date('Y-m-d'))
                ->select("$this->_table.job_id ,$this->_table.title , $this->_table.salary_min , $this->_table.salary_max , companies.company_name as company",false )
                ->limit(LIMIT)
                ->get()->result();
        }
        return $countries;
    }
}