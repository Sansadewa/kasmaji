<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lupa extends CI_Controller {

	function __construct(){
		parent ::__construct();
		$this->load->model('orang_model');
	}

	public function index() {
	    $this->load->view('teledornim');	
	}

	public function first() {
		$username = $this->input->post('username'); //inputan dengan nama = nim yang ada di popup Lupa Password

		$cek = $this->orang_model->get_info($username);
		$ha=$cek;
	    if(!empty($cek)){
	    $characters = '123456789zxcvbnmasdfghjkqwertyuipZXCVBNMASDFGHJKLQWERTYUP'; //membuat string dengan semua kemungkinan karakter yang ada
	    $password_token = ''; //membuat password baru
	    for ($i = 0; $i<8; $i++) {
	      $password_token .=$characters[rand(0, strlen($characters)-1)];
	    } 

	    //berjumlah 8 char. terdiri dari char random dengan kemungkinan mulai dari char pertama(0) di "characters" sampe ke bagian panjang "characters" akhir -1. karena array.
		$data['username'] = $username;
		$data['nama'] = $ha[0]['nama'];
	    $data['code']= $password_token;	    
		
		$this->load->library('email');
		
	    $surat['protocol']    = 'smtp';
	    $surat['smtp_host']    = 'ssl://sipaju.kasmaji15.web.id';
	    $surat['smtp_port']    = '465';
	    $surat['smtp_user']    = 'no-reply@sipaju.kasmaji15.web.id';
	    $surat['smtp_pass']    = 'c^Z3C%mgaryi';
		$surat['charset']    = 'utf-8';
		$surat['smtp_timeout'] = 12;
	    $surat['newline']  = "\r\n";
	    $surat['validate'] = TRUE;
    	$this->email->initialize($surat);	
	    $this->email->from('no-reply@kasmaji15.web.id','KASMAJI');
	    $this->email->subject('Reset Password KASMAJI');
	    $this->email->message($this->load->view('email_lupa',$data,true));
	    $this->email->set_mailtype("html");
	    $this->email->to($ha[0]['email']);


	    if(!$this->email->send()){
	      echo "Mailer Error: " . $this->email->print_debugger();
		  echo "Gagal";
	      $this->orang_model->savekode($username,$password_token); //menuju model untuk menyimpan nim dan kode
	      redirect('Login');
	    }
	    else{
	      $this->orang_model->savekode($username,$password_token); //menuju model untuk menyimpan nim dan kode
	      $this->load->view('teledor');
	    }
	  } else {
	    $this->session->set_flashdata('informasi','Username tidak terdaftar');
	    redirect('login');
	  }
	}

	 public function inputpass()
	{
		$this->load->view('teledor');
	}
	public function second() {
		$username=$this->input->post('username');
		$hm=$this->orang_model->get_info($username);
		$kode=$this->input->post('kode');
		$pw1=$this->input->post('Pass');
		$pw2=$this->input->post('Pass2');
		if ( $pw1==NULL ||$pw2==NULL || $username==NULL) {
		 	redirect('lupa/inputpass');
		 } else{
		 	$go=TRUE;
			if($pw1!=$pw2){$this->session->set_flashdata('report', 'Gak sama Passwordnya :('); redirect('lupa/inputpass');$go=FALSE;}

			if($hm[0]['forgot_token']===$kode && $go){
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
