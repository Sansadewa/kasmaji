<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input extends CI_Controller {

	function __construct(){
		parent ::__construct();
		$this->ceklogin->ceksesi();
		$this->load->model('input_model');
	}

	public function index()	{
		redirect('Akun');
	}

	

}
