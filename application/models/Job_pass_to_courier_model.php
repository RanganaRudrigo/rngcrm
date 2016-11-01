<?php


class Job_pass_to_courier_model extends MY_Model
{
    var $_table ="job_order_pass_to_courier";
    var $primary_key ="JobToCourierId";
    protected $before_create = ['prop_data_before_create'] ;
    protected $before_update = ['prop_data_before_update'] ;
    //protected $after_create = ['prop_data_after_create'] ;

    var $belongs_to = [
        "jobOrder" => ["model" => "Joborder_model" ,"primary_key" => "JobOrderId"  ]
    ];

    
    function prop_data_after_create($JobToCourierId){

        $data = $this->get($JobToCourierId);
        $count = $this->count_by(['JobOrderType'=>$data->JobOrderType ]);
        return  $this->update($JobToCourierId , ['jobOrderNo' => "$data->JobOrderNo-$count" ] )? TRUE : FALSE ;

    }
}