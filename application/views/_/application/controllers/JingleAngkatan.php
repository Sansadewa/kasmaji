<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JingleAngkatan extends CI_Controller {

	function __construct(){
		parent ::__construct();
	}

	public function index()
	{
		redirect('https://www.youtube.com/watch?v=BF-4v-e2oQE',false);
	}
}