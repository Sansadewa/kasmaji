<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gulugulu extends CI_Controller {

public function index(){
		
	$this->load->database();
	$SQL1="SELECT * FROM sipaju_btm";
    $que = $this->db->query($SQL1);


	foreach ($que->result() as $q) {
		# code...


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


	//$data['nama']=$q->nama;
	$data['ukm']="ngetes ae";
	$this->email->from('no-reply@stislimatuju.com','STISLIMATUJU');
	$this->email->subject('Mailer Test');
	$this->email->message('Test email personal. Mohon maap ganggu.');
	//$this->email->message($this->load->view('email_btm',$data,true));
	$this->email->set_mailtype("html");
	$this->email->to($q->email_personal);

	if(!$this->email->send()){
	  echo "Mailer Error: " . $this->email->print_debugger();

	} else {echo "hoho";}
	}
 }
}