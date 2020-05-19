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
		$data['pendidikan']=$this->orang_model->get_pendidikan($this->session->userdata('username'));
		$this->load->view('akunhead');
		$this->load->view('pendidikan',$data);
		$this->load->view('akunfooter');
	}

	public function pekerjaan()
	{
		$data['pekerjaan']=$this->orang_model->get_pekerjaan($this->session->userdata('username'));
		$this->load->view('akunhead');
		$this->load->view('pekerjaan',$data);
		$this->load->view('akunfooter');
	}

	public function usaha()
	{
		$data['usaha']=$this->orang_model->get_usaha($this->session->userdata('username'));
		$this->load->view('akunhead');
		$this->load->view('usaha',$data);
		$this->load->view('akunfooter');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}


}
