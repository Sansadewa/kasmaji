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

	public function kabkot(){
		$prov=$this->input->post('prov');
		$sess_kab=$this->input->post('sess_kab');
		$this->load->model('register_model');
		$kabkot=$this->register_model->get_kabkot($prov);
		foreach($kabkot->result() as $row){
			if($row->name==$sess_kab){$selected='selected';} else $selected='';
			echo("<option value='".$row->name."' ".$selected.">".$row->name."</option>");
		}
	}

	public function pendidikan()
	{
		$data['pendidikan']=$this->orang_model->get_pendidikan($this->session->userdata('username'));
		$data['tbl_pendidikan']=$this->orang_model->get_all_pendidikan();
		$this->load->view('akunhead');
		$this->load->view('pendidikan',$data);
		$this->load->view('akunfooter');
	}

	public function pekerjaan()
	{
		$data['pekerjaan']=$this->orang_model->get_pekerjaan($this->session->userdata('username'));
		$data['tbl_pekerjaan']=$this->orang_model->get_all_pekerjaan();
		$this->load->view('akunhead');
		$this->load->view('pekerjaan',$data);
		$this->load->view('akunfooter');
	}

	public function usaha()
	{
		$data['usaha']=$this->orang_model->get_usaha($this->session->userdata('username'));
		$data['tbl_usaha']=$this->orang_model->get_all_usaha();

		$this->load->view('akunhead');
		$this->load->view('usaha',$data);
		$this->load->view('akunfooter');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}


}
