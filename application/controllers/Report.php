<?php

class Report extends MY_Controller
{
    var $page = "report";

    function stock_balance(){
        $this->load->model("Item_model","Item");
        $Item =  $this->Item->table();
        $ItemKey =  $this->Item->getPrimaryKey();

        $this->load->model("item_brand_model",'brand');
        $brand =  $this->brand->table();
        $brandKey =  $this->brand->getPrimaryKey();

        $this->load->model("item_model_model",'model');
        $model =  $this->model->table();
        $modelKey =  $this->model->getPrimaryKey();

        $this->load->model("item_type_model",'type');
        $type =  $this->type->table();
        $typeKey =  $this->type->getPrimaryKey();

        $this->load->model("Customer_item",'CusItem');
        $CusItem =  $this->CusItem->table();

        $this->load->model("Job_order_close_item_serial_no_model",'DamageItem');
        $CusItem =  $this->CusItem->table();

        $this->load->model("Job_order_close_item_serial_no_model",'DamageItem');
        $DamageItem =  $this->DamageItem->table();

        $this->db->join("$brand","$Item.$brandKey = $brand.$brandKey","LEFT");
        $this->db->select("$brand.ItemBrandName");
        $this->db->join("$model","$Item.$modelKey = $model.$modelKey","LEFT");
        $this->db->select("$model.ItemModelName");
        $this->db->join("$type","$Item.$typeKey = $type.$typeKey","LEFT");
        $this->db->select("$type.ItemTypeName");

        $this->db->join("$CusItem","$Item.$ItemKey = $CusItem.$ItemKey","LEFT");
        $this->db->select("$CusItem.Qty as cus_qty");

        $this->db->join("$DamageItem","$Item.$ItemKey = $DamageItem.$ItemKey","LEFT");
        $this->db->select("COUNT($DamageItem.ItemId) as dam_qty",FALSE);

        $this->db->group_by("$Item.ItemId");
        $this->db->select("$Item.*");

        $d['records'] = $this->Item->get_many_by(["Status"=>1]);

        $d["page"] = "$this->page/item/stock_balance";
        $this->view($d);
    }
    
    function technician_hand(){
        $this->load->model("Technician_model");
        $Technician =  $this->Technician_model->table();
        $TechnicianKey =  $this->Technician_model->getPrimaryKey();

        $this->load->model("Item_model");
        $Item =  $this->Item_model->table();
        $ItemKey =  $this->Item_model->getPrimaryKey();

        $this->load->model("Technician_item_stock_model");
        $Stock =  $this->Technician_item_stock_model->table();

        $this->db->join($Stock,"$Stock.$TechnicianKey = $Technician .$TechnicianKey");
        $this->db->join($Item,"$Item.$ItemKey = $Stock.$ItemKey");

        $d['records'] = $this->Technician_model->get_many_by(['Status'=>1]);

        $d["page"] = "$this->page/technician_hand";
        $this->view($d);
    }

    function job_order(){
 
        if($this->input->post('daterange')){
            $date = explode("-",$this->input->post('daterange'));
            $this->db->where("ComplainDate >=", date("Y-m-d",strtotime($date[0])) );
            $this->db->where("ComplainDate <=", date("Y-m-d",strtotime($date[1])) );
        }

        $this->load->model("Joborder_model");

        $records = $this->Joborder_model->with("Customer")->with("Item")->with("Repair")->get_many_by(["Status"=>1]);

        $d['records'] = $records ;

        $d["page"] = "$this->page/job_order";
        $this->view($d);
    }

}