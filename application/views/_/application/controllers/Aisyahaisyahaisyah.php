<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aisyahaisyahaisyah extends CI_Controller {

	function __construct(){
		parent ::__construct();
		$this->load->model('mahasiswa_model');
		//$this->ceklogin->ceksesi();
	}

	public function index()
	{
		$data['topik']=$this->mahasiswa_model->get_history();
		$this->load->view('kuns',$data);
	}
    
    public function a()
	{
		$this->load->view('reset');
	}
	
	public function b()
	{
		$nim=$this->input->post('nim');
		$this->mahasiswa_model->reset($nim);
	}
}
