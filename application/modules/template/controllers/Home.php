<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 4/27/2016
 * Time: 11:47 PM
 */
class Home extends CI_Controller
{
    function index(){ 
         $this->load->view('dashboard');
    }
 


    function master_customer(){
      $this->load->view('pages/master_customer');
    }



    function master_technician(){
      $this->load->view('pages/master_technician');
    }

	 function master_courier(){
      $this->load->view('pages/master_courier');
    }
	
	function master_supplier(){
      $this->load->view('pages/master_supplier');
    }
	
	function master_repair_mode(){
      $this->load->view('pages/master_repair_mode');
    }
	
    function master_product_item(){
      $this->load->view('pages/master_product_item');
    }
	
	function master_user(){
      $this->load->view('pages/master_user');
    }
	
	function transaction_purchase(){
      $this->load->view('pages/transaction_purchase');
    }
	
	function transaction_job_order(){
      $this->load->view('pages/transaction_job_order');
    }
	
	function transaction_job_order_technician(){
      $this->load->view('pages/transaction_job_order_technician');
    }
	
	function transaction_job_without_parts(){
      $this->load->view('pages/transaction_job_without_parts');
    }
	
	function transaction_job_with_parts(){
      $this->load->view('pages/transaction_job_with_parts');
    }

	function courier_job(){
      $this->load->view('pages/courier_job');
    }

	function transaction_technician_takeout(){
      $this->load->view('pages/transaction_technician_takeout');
    }

	function transaction_technician_return(){
      $this->load->view('pages/transaction_technician_return');
    }
	function transaction_customer_item(){
      $this->load->view('pages/transaction_customer_item');
    }
	function stock_model(){
      $this->load->view('pages/stock_model');
    }
	function stock_brand(){
      $this->load->view('pages/stock_brand');
    }
	function stock_type(){
      $this->load->view('pages/stock_type');
    }
	function courier_customer_item(){
      $this->load->view('pages/courier_customer_item');
    }
	function courier_item_return(){
      $this->load->view('pages/courier_item_return');
    }
	function courier_rng_item_return(){
      $this->load->view('pages/courier_rng_item_return');
    }
	function inhouse_job_without_parts(){
      $this->load->view('pages/inhouse_job_without_parts');
    }
	function transaction_job_close_toner(){
      $this->load->view('pages/transaction_job_close_toner');
    }

}