<?php

class Technician_item_stock_model extends MY_Model
{
    var $_table = "technician_item_stock";

    var $belongs_to = [
        "ITEM" => ['model'=>'Item_model' , 'primary_key' => 'ItemId' ]
    ];
    
    function update_stock($technicianId,$ItemId,$Qty){
         if(is_object($this->get_by(["TechnicianId"=>$technicianId ,"ItemId" =>$ItemId ]))){
             $this->db->set('Qty', "Qty+$Qty",FALSE);
             $this->update_by(["TechnicianId"=>$technicianId ,"ItemId" =>$ItemId ] , []  );
         }else{
             $this->insert(["TechnicianId"=>$technicianId ,"ItemId" =>$ItemId , "Qty" => $Qty  ]);
         }
    }
}