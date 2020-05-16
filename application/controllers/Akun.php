<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	function __construct(){
		parent ::__construct();
		$this->load->model('mahasiswa_model');
		$this->ceklogin->ceksesi();
	}

	public function index()
	{
		$data['profile']=$this->mahasiswa_model->get_profile($this->session->userdata('nim'));
		$this->load->view('akunhead');
		$this->load->view('akun',$data);
		$this->load->view('akunfooter');
	}

	public	function abrakadabra(){
		$this->load->model('model_penempatan');
		$data['prov']=$this->model_penempatan->get_prov()->result_array();
		$this->load->view('akunhead');
		$this->load->view('abrakadabra',$data);
		$this->load->view('akunfooter');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
	public function BTM()
	{
		$data['btm']= $this->mahasiswa_model->get_btm($this->session->userdata('nim'));
		$this->load->view('akunhead');
		if ($data['btm']->num_rows()<1){
		    $this->load->view('btmblank');
		} else {
		    $this->load->view('btm',$data);
		}
		$this->load->view('akunfooter');
	}

	public function rank(){
		$kon=substr($this->session->userdata('kelas'), 1,2);
		switch ($kon) {
			case 'KS':
				$ha=$this->mahasiswa_model->getRank('KS');
				break;

			case 'SE':
				$ha=$this->mahasiswa_model->getRank('SE');
				break;

			case 'SK':
				$ha=$this->mahasiswa_model->getRank('SK');
				break;
			

			default:
				redirect('https://google.com');
				break;
		}
		$data['rank']=$ha;
		$this->load->view('akunhead');
		$this->load->view('rank1',$data);
		$this->load->view('akunfooter');


	}

	public function topik($nimtopik)
	{	
	    //$this->load->view('maintenis');
		if($this->session->userdata('nim')!=$nimtopik){ redirect('Akun'); } else {
			$data['topik']=$this->mahasiswa_model->get_mytopik($nimtopik);
			$this->load->view('akunhead');
			$this->load->view('topik',$data);
			$this->load->view('akunfooter');
		}
	}

	public function alltopik()
	{
		$data['topik']=$this->mahasiswa_model->get_alltopik();
		$this->load->view('akunhead');
		$this->load->view('alltopik',$data);
		$this->load->view('akunfooter');
	}

	public function fulltopik()
	{
		$data['topik']=$this->mahasiswa_model->get_alltopik();
		$this->load->view('fulltopik',$data);
	}

	public function IPK()
	{
		$this->load->view('akunhead');
		$this->load->view('ipk');
		$this->load->view('akunfooter');
	}

		public function rekap_btm()
	{
		$nim=$this->session->userdata('nim');
		if($nim=='15.8658' || $nim== '15.8918' || $nim== '15.8605' || $nim== '15.8889' || $nim=='15.8792' || $nim=='15.8507' || $nim== '15.8825' || $nim== '15.8898' || $nim== '15.8888' || $nim== '15.8608' || $nim== '15.8493' || $nim== '15.8756' || $nim== '15.8873' || $nim== '15.8893'  || $nim== '15.8861' || $nim== '15.8636' || $nim== '15.8668'|| $nim== '15.8643'|| $nim== '15.8468'|| $nim== '15.8680'|| $nim== '15.8770'|| $nim== '15.8499' || $nim=='15.8725') {
                  
                  if ($this->session->userdata('jabatan')==1){
                  		$data['btm']=$this->mahasiswa_model->rekap_btm($this->session->userdata('kelas'));
                      	$this->load->view('akunhead');
						$this->load->view('allbtm',$data);
                  } elseif($this->session->userdata('jabatan')==2) { 
                  		$data['btm']=$this->mahasiswa_model->rekap_btm('all');
                  		$this->load->view('akunhead');
						$this->load->view('allbtm',$data);
						$this->load->view('akunfooter');
                  } else {
                      $this->load->view('error-nyasar');
                  }
                  		
                } else {
                	$this->load->model('input_model');
                	$this->input_model->log_access($this->session->userdata('nim'),'Rekap BTM');
                	$this->load->view('zonk');
                }
	}

		public function rekap_btm_full()
	{
		$nim=$this->session->userdata('nim');
		if($nim=='15.8658' ||$nim='15.8725' || $nim== '15.8918' || $nim== '15.8605' || $nim== '15.8889' || $nim=='15.8792' || $nim=='15.8507' || $nim== '15.8825' || $nim== '15.8898' || $nim== '15.8888' || $nim== '15.8608' || $nim== '15.8493' || $nim== '15.8756' || $nim== '15.8873' || $nim== '15.8893'  || $nim== '15.8861' || $nim== '15.8636' || $nim== '15.8668'|| $nim== '15.8643'|| $nim== '15.8468'|| $nim== '15.8680'|| $nim== '15.8770'|| $nim== '15.8499' || $nim=='15.8725') {
                  if ($this->session->userdata('jabatan')==1){
                  		$data['btm']=$this->mahasiswa_model->rekap_btm($this->session->userdata('kelas'));
						$this->load->view('fullbtm',$data);
                  } elseif($this->session->userdata('jabatan')==2 || $nim='15.8725' ) { 
                  		$data['btm']=$this->mahasiswa_model->rekap_btm('all');
						$this->load->view('fullbtm',$data);
						$this->load->view('akunfooter');
                  }
                } else {
                	$this->load->model('input_model');
                	$this->input_model->log_access($this->session->userdata('nim'),'Rekap BTM');
                	$this->load->view('zonk');
                }
	}

}
