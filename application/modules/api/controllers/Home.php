<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Home extends REST_Controller {

	public function index_get() {

	}

	function logout_get(){
		$this->session->sess_destroy() ;
		$this->response([
			'logout' => TRUE
		],REST_Controller::HTTP_OK);
	}
}
