<?php


class Job_order_courier_model extends MY_Model
{
    var $_table ="job_order_courier";
    var $primary_key ="CourierJobOrderId";
    protected $before_create = ['prop_data_before_create'] ;
    protected $before_update = ['prop_data_before_update'] ;

    protected $after_create = ['prop_data_after_create'] ;

    var $belongs_to = [
        "jobOrder" => ["model" => "Joborder_model" ,"primary_key" => "JobOrderId"  ]
    ];

    function prop_data_after_create($_id){
        $data = $this->get($_id); 
        $count = $this->count_by(['JobOrderType'=>$data->JobOrderType ]);
        return  $this->update($_id , ['jobOrderNo' => "$data->JobOrderNo-$count" ] )? TRUE : FALSE ;
    }
    
}