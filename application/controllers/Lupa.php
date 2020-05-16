<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lupa extends CI_Controller {

	function __construct(){
		parent ::__construct();
		$this->load->model('mahasiswa_model');
	}

	public function index() {
	    $this->load->view('teledornim');	
	}

	public function first() {
		$nim = $this->input->post('nimbodoh'); //inputan dengan nama = nim yang ada di popup Lupa Password

	    $cek = $this->mahasiswa_model->get_info($nim);
	    $btm = $this->mahasiswa_model->get_btm($nim);
	    if(!empty($cek) && !empty($btm)){
	    $characters = '123456789zxcvbnmasdfghjkqwertyuipZXCVBNMASDFGHJKLQWERTYUP'; //membuat string dengan semua kemungkinan karakter yang ada
	    $password_token = ''; //membuat password baru
	    for ($i = 0; $i<8; $i++) {
	      $password_token .=$characters[rand(0, strlen($characters)-1)];
	    } 

	    //berjumlah 8 char. terdiri dari char random dengan kemungkinan mulai dari char pertama(0) di "characters" sampe ke bagian panjang "characters" akhir -1. karena array.
	    $data['nim'] = $nim;
	    $data['code']= $password_token;	    
		
	    $this->load->library('email');
	    $surat['protocol']    = 'smtp';
	    $surat['smtp_host']    = 'ssl://mail.stislimatuju.com';
	    $surat['smtp_port']    = '465';
	    $surat['smtp_user']    = 'no-reply@stislimatuju.com';
	    $surat['smtp_pass']    = 'tgUBET9qAbCP5Lh';
	    $surat['charset']    = 'utf-8';
	    $surat['newline']  = "\r\n";
	    $surat['validate'] = TRUE;
    	$this->email->initialize($surat);	
    	$ha=$btm->result_array();
	    $this->email->from('no-reply@stislimatuju.com','STISLIMATUJU');
	    $this->email->subject('Reset Password SIPAJU');
	    $this->email->message($this->load->view('email_lupa',$data,true));
	    $this->email->set_mailtype("html");
	    $this->email->to($nim.'@stis.ac.id, '.$ha[0]['email_personal']);

	    if(!$this->email->send()){
	      echo "Mailer Error: " . $this->email->print_debugger();
	      echo "Gagal";
	      redirect('Login');
	    }
	    else{
	      $this->mahasiswa_model->savekode($nim,$password_token); //menuju model untuk menyimpan nim dan kode
	      $this->load->view('teledor');
	    }
	  } else {
	    $this->session->set_flashdata('informasi','NIM tidak terdaftar/kosong');
	    redirect('login');
	  }
	}

	public function second() {
		$nim=$this->input->post('nim');
		$hm=$this->mahasiswa_model->get_info($nim);
		$kode=$this->input->post('kode');
		$pw1=$this->input->post('Pass');
		$pw2=$this->input->post('Pass2');
		if ( $pw1==NULL ||$pw2==NULL || $nim==NULL) {
		 	$this->load->view('teledor');
		 } else{
		 	$go=TRUE;
			if($pw1!=$pw2){$this->session->set_flashdata('report', 'Gak sama Passwordnya :('); $go=FALSE;}

			if($hm[0]['kodeLupaPass']===$kode && $go){
				$this->load->model('register_model');
				$this->register_model->putPass($pw1,$nim);
				$this->session->set_flashdata('informasi', 'Password Updated.');
				redirect('login');
			} else {
				$this->session->set_flashdata('report', 'Gak Bener :(');
				$this->load->view('teledor');
			}
		}


	}
}
