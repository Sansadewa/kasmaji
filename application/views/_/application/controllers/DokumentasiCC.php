<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DokumentasiCC extends CI_Controller {

	function __construct(){
		parent ::__construct();
	}

	public function index()
	{
		redirect('https://drive.google.com/open?id=16Hcok2REeRKcMqgiSFzfh9_rhIYaDBan',false);
	}
}