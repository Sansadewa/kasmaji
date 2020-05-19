<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	function __construct(){
		parent ::__construct();
		$this->load->model('orang_model');
		$this->ceklogin->ceksesi();
	}

	public function index()
	{
		$data['profile']=$this->orang_model->get_profile($this->session->userdata('username'));
		$this->load->view('akunhead');
		$this->load->view('akun',$data);
		$this->load->view('akunfooter');
	}

	public function pendidikan()
	{
		$data['profile']=$this->orang_model->get_profile($this->session->userdata('nim'));
		$this->load->view('akunhead');
		$this->load->view('akun',$data);
		$this->load->view('akunfooter');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}


}
