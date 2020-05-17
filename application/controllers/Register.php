<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct(){
		parent ::__construct();
		$this->load->model('register_model');
	}
	public function index()
	{	
		$this->session->sess_destroy();
		$this->load->view('register');
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
		$key=$this->input->post('key');
		//$this->session->sess_destroy();
		if(empty($key)){redirect('register');} else{
			$profil=$this->register_model->get_info($key);
			if($profil[0]['step']==0){
				$this->session->set_userdata('key',$key);
				$this->load->view('first');		
			} elseif ($profil[0]['step']==1){
				$this->session->set_userdata('key',$key);
				redirect('register/second');
			} else {
				$this->session->set_flashdata('report','Terjadi kesalahan, 1.');
				redirect('register');
			}
		}

	}

	public function procpass() {
		$key=$this->session->userdata('key');
		$profil=$this->register_model->get_info($key);
		$nim=$profil[0]['nim'];
		if($profil[0]['step']==0){
			$pa=$this->input->post('pa');
			$pb=$this->input->post('pb');
			if ($pa!=$pb){
				$this->session->set_flashdata('report','Password tidak sama');
				redirect('register/first');
			} else{
				$this->register_model->putpass($pa,$nim);
				redirect('register/second');
			}
		} else {
			$this->session->set_flashdata('report','Terjadi kesalahan, 2.');
			redirect('register');
		}
	}

	public function second() {
		$key=$this->session->userdata('key');
		$profil=$this->register_model->get_info($key);
		if($profil[0]['step']==1){
			$this->load->model('orang_model');
			$nim = $profil[0]['nim'];
			$data['topik']=$this->orang_model->get_mytopik($nim);
			$this->session->set_userdata('nim',$profil[0]['nim']);
			$this->session->set_userdata('nama',$profil[0]['nama']);
			$this->session->set_userdata('kelas',$profil[0]['kelas']);
			//$this->session->unset_userdata('key');
			
			if($data['topik']->num_rows()<1){
			    $this->load->view('secondblank',$data);
			} else { 
			$this->load->view('second',$data); 
			}
			
		} else {
			$this->session->set_flashdata('report','Terjadi kesalahan, 3.');
			redirect('register');
		}
	}	

	public function topik() {
		$this->load->model('input_model');
		$nama = $this->session->userdata('nama');
		$nim = $this->session->userdata('nim');
		$kelas = $this->session->userdata('kelas');
		$dosbing = $this->input->post('dosbing');
		$topik = $this->input->post('topik');
		$validi=$this->input_model->cek_topik($nim);
		if ($kelas[1]=='K'){
			$kelompok_tema = $this->input->post('kelompok_tema');
			$platform = $this->input->post('platform');

			if($validi ==1) {
				$this->input_model->update_topikks($nim,$nama,$kelas,$dosbing,$topik,$kelompok_tema,$platform);
			} else {
				$this->input_model->insert_topikks($nim,$nama,$kelas,$dosbing,$topik,$kelompok_tema,$platform);
			}
		} else {
			$metode = $this->input->post('metode');
			$y = $this->input->post('y');
			$lokus = $this->input->post('lokus');
			$sumberdata = $this->input->post('sumberdata');

			if($validi ==1) {
				$this->input_model->update_topik($nim,$nama,$kelas,$dosbing,$topik,$metode,$y,$lokus,$sumberdata);
			} else {
				$this->input_model->insert_topik($nim,$nama,$kelas,$dosbing,$topik,$metode,$y,$lokus,$sumberdata);
			}
		}
		$this->register_model->update_step($nim);
		$this->session->set_flashdata('result','Perubahan Sukses');
		$this->session->set_userdata('logged_in',TRUE);
		redirect('akun/topik/'.$nim);
	}

	public function ah(){
		$this->load->view('second');
	}

	public function ih(){
		$this->load->view('secondblank');
	}

}
