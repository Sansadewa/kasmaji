<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	function __construct(){
		parent ::__construct();
		$this->load->model('orang_model');
		$this->ceklogin->ceksesi();
	}

	
	public function index()
	{
		$data['profile']=$this->orang_model->get_profile($this->session->userdata('username'));
		$this->load->view('akunhead');
		$this->load->view('akun',$data);
		$this->load->view('akunfooter');
	}

	public function kabkot(){
		$prov=$this->input->post('prov');
		$sess_kab=$this->input->post('sess_kab');
		$this->load->model('register_model');
		$kabkot=$this->register_model->get_kabkot($prov);
		foreach($kabkot->result() as $row){
			if($row->name==$sess_kab){$selected='selected';} else $selected='';
			echo("<option value='".$row->name."' ".$selected.">".$row->name."</option>");
		}
	}

	public function pendidikan()
	{
		$data['pendidikan']=$this->orang_model->get_pendidikan($this->session->userdata('username'));
		$data['profile']=$this->orang_model->get_profile($this->session->userdata('username'));
		
		$data['tbl_pendidikan']=$this->orang_model->get_all_pendidikan();
		$this->load->view('akunhead');
		$this->load->view('pendidikan',$data);
		$this->load->view('akunfooter');
	}

	public function pekerjaan()
	{
		$data['profile']=$this->orang_model->get_profile($this->session->userdata('username'));
		$data['pekerjaan']=$this->orang_model->get_pekerjaan($this->session->userdata('username'));
		$data['tbl_pekerjaan']=$this->orang_model->get_all_pekerjaan();
		$this->load->view('akunhead');
		$this->load->view('pekerjaan',$data);
		$this->load->view('akunfooter');
	}

	public function usaha()
	{
		$data['profile']=$this->orang_model->get_profile($this->session->userdata('username'));
		$data['usaha']=$this->orang_model->get_usaha($this->session->userdata('username'));
		$data['tbl_usaha']=$this->orang_model->get_all_usaha();

		$this->load->view('akunhead');
		$this->load->view('usaha',$data);
		$this->load->view('akunfooter');
	}

	public function sharing()
	{
		$data['sharing']=$this->orang_model->get_own_sharing($this->session->userdata('username'));
		$data['tbl_sharing']=$this->orang_model->get_all_sharing();
		$this->load->view('akunhead');
		$this->load->view('sharing',$data);
		$this->load->view('akunfooter');
	}

	public function hapussharing($kodesharing)
	{
		$datanya=$this->orang_model->search_sharing($this->session->userdata('username'),$kodesharing);
		if($datanya->num_rows()){
		$this->load->model('input_model');
		$data['tbl_sharing']=$this->input_model->delete_sharing($kodesharing);
		$this->session->set_flashdata('result', 'Berhasil menghapus');
		// echo (FCPATH.'public/lihatsharing/'.$kodesharing);s
		// echo getcwd();
		// unlink(getcwd()."public/lihatsharing/".$datanya->row()->gambar);
		unlink(FCPATH."public/lihatsharing/".$datanya->row()->gambar);
		redirect('akun/sharing');
		} else {
			$this->session->set_flashdata('result', 'Terjadi Kesalahan. Sharing bukan milik anda.');
		redirect('akun/sharing');
		}
	}

	public function lihatfoto($username){
		if(file_exists("./public/profpic/{$username}.png")!=NULL){
		$remoteImage = "./public/profpic/{$username}.png";
		} elseif(file_exists("./public/profpic/{$username}.jpg")!=NULL){
			$remoteImage = "./public/profpic/{$username}.jpg";
			} elseif(file_exists("./public/profpic/{$username}.jpeg")!=NULL){
				$remoteImage = "./public/profpic/{$username}.jpeg";
				} else {
					$remoteImage = "./public/profpic/default.png";
				}
		$imginfo = getimagesize($remoteImage);
		header("Content-type: {$imginfo['mime']}");
		readfile($remoteImage);
		
	}

	public function lihatsharing($username){
		if(file_exists("./public/lihatsharing/{$username}")!=NULL){
		$remoteImage = "./public/lihatsharing/{$username}";
		} else {$remoteImage = "./public/lihatsharing/missing.png";}
		$imginfo = getimagesize($remoteImage);
		header("Content-type: {$imginfo['mime']}");
		readfile($remoteImage);
		
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}


}
