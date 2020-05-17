<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct(){
		parent ::__construct();
		$this->ceklogin->ceksesiregister();
		$this->load->model('register_model');
		
	}

	public function index()
	{	
		$aku=$this->register_model->get_info($this->session->userdata('username'));
		// echo($aku->username);
		if($aku->step==0){
			//kalau belum ngapa-ngapain, ke first. Bikin Password baru dan email.
			redirect('register/first');
		} elseif ($aku->step==1){
			//kalau udah pass sama email, masuk ke biodata dasar
			redirect('register/second');
			
		} else {
			$this->session->set_flashdata('informasi', 'Error pada registrasi.');
			redirect('login');
		}
	}

	//Ini manggil halaman buat input email untuk dikirimkan kode aktivasi
	// public function request(){
	// 	$this->load->view('request');
	// }


	//Ini disimpen, siapatau maunya aktivasi via email.
	//Ini mengirimkan kode aktivasi via email.
	// public function process(){
	// 	$nim=$this->input->post('nim');

	// 	$this->load->library('email');
	//     $surat['protocol']    = 'smtp';
	//     $surat['smtp_host']    = 'ssl://mail.stislimatuju.com';
	//     $surat['smtp_port']    = '465';
	//     $surat['smtp_user']    = 'no-reply@stislimatuju.com';
	//     $surat['smtp_pass']    = 'tgUBET9qAbCP5Lh';
	//     $surat['charset']    = 'utf-8';
	//     $surat['newline']  = "\r\n";
	//     $surat['validate'] = TRUE;
    // 	$this->email->initialize($surat);

    // 	$q=$this->register_model->get_profile($nim);

    // 	$data['code']=md5($nim.$q->ayah);
    // 	$data['nim']=$nim;
    // 	$this->email->from('no-reply@stislimatuju.com','STISLIMATUJU');
	//     $this->email->subject('Kode Unik SIPAJU');
	//     $this->email->message($this->load->view('email_daftar',$data,true));
	//     $this->email->set_mailtype("html");
	//     $this->email->to($nim.'@stis.ac.id');

	//     if(!$this->email->send()){
	//       echo "Mailer Error: " . $this->email->print_debugger();
	//       echo "Gagal";
	//       redirect('Login');
	//     }
	//     else{
	//     	$this->register_model->update_unik($nim,$data['code']);
	//       $this->session->set_flashdata('report','Kode Unik sedang dikirimkan ke email STIS anda. Mohon tunggu beberapa menit.');
	//       redirect('register');
	//     }

	// }

	public function first() {
		$aku=$this->register_model->get_info($this->session->userdata('username'));
		//yang boleh kesini cuma yang step=0, yg belom pernah masuk samsasekali.
		if ($aku->step!=0) redirect('register');
 		$this->load->view('first');		
	}

	public function procpass() {
		$profil=$this->register_model->get_info($this->session->userdata('username'));
		if($profil->step==0){
			$pa=$this->input->post('pa');
			$pb=$this->input->post('pb');
			$email=$this->input->post('email');
			if ($pa!=$pb){
				$this->session->set_flashdata('informasi','Password tidak sama');
				redirect('register/first');
			} else{
				$this->register_model->putpass($pa, $email, $profil->username);
				redirect('register/second');
			}
		} else {
			$this->session->set_flashdata('informasi','Terjadi kesalahan, R1.');
			redirect('register');
		}
	}

	public function second() {
		$aku=$this->register_model->get_info($this->session->userdata('username'));
		//yang boleh kesini cuma yang step=1, yg belom pernah isi biodata dasar
		if ($aku->step!=1) redirect('register');
 		$this->load->view('secondblank');	
	}	

	public function ah(){
		$this->load->view('first');
	}

	public function ih(){
		$this->load->view('secondblank');
	}

}
