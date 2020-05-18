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

	public function first() {
		$aku=$this->register_model->get_info($this->session->userdata('username'));
		//yang boleh kesini cuma yang step=0, yg belom pernah masuk samsasekali.
		if ($aku->step!=0) redirect('register');
 		$this->load->view('first');		
	}

	public function procpass() {
		$profil=$this->register_model->get_info($this->session->userdata('username'));
		if($profil->step==0){

			//BELOM DIAMANKAN ISINYA.

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
		if ($aku->step!=1) {
			$this->session->set_flashdata('informasi','Terjadi kesalahan, R2.');
			redirect('register');
		}
 		$this->load->view('secondblank');	
	}
	
	public function procbase(){
		$profil=$this->register_model->get_info($this->session->userdata('username'));
		if ($profil->step!=1) redirect('register');

		//BELOM DIAMANKAN ISINYA

		$nomorhp=$this->input->post('nomorhp');
		$nomorwa=$this->input->post('nomorwa');
		$linkedin=$this->input->post('linkedin');
		$facebook=$this->input->post('facebook');
		$ig=$this->input->post('ig');
		$twitter=$this->input->post('twitter');
		$prov=$this->input->post('prov');
		$kabkot=$this->input->post('kabkot');
		$alamat_lengkap=$this->input->post('alamat_lengkap');
		$lanjut_belajar=$this->input->post('lanjut_belajar');
		$kegiatan=$this->input->post('kegiatan');

		$this->register_model->putprofil($this->session->userdata('username'), $nomorhp,$nomorwa,$linkedin,$facebook,$ig,$twitter,$prov,$kabkot,$alamat_lengkap,$lanjut_belajar,$kegiatan);

		redirect('register/third');
	}

	public function third() {
		$aku=$this->register_model->get_info($this->session->userdata('username'));
		if($aku->step!=2){
			$this->session->set_flashdata('informasi','Terjadi kesalahan, R3.');
			redirect('register');
		}

		$profil=$this->register_model->get_profil($this->session->userdata('username'));
		if($profil->lanjut_belajar=1){
			echo('kamu belajar');
		}else{
			$this->register_model->update_step($this->session->userdata('username'),3);
			redirect('register/fourth');
		}


	}

	public function ah(){
		$this->load->view('first');
	}

	public function ih(){
		$this->load->view('secondblank');
	}

}
