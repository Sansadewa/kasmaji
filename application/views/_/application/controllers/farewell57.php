<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FAREWELL57 extends CI_Controller {

	function __construct(){
		parent ::__construct();
	}

	public function index()
	{
		redirect('https://docs.google.com/forms/d/e/1FAIpQLSdV16NzhGYa1ta4mXcmufsFSHYr7OowDwPksdWyrGaMkasK_g/viewform',false);
	}
}