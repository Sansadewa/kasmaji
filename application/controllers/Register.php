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
			
		} elseif ($aku->step==2){
			//kalau udah pass sama email, masuk ke biodata dasar
			redirect('register/third');
			
		} elseif ($aku->step==3){
			//kalau udah pass sama email, masuk ke biodata dasar
			redirect('register/fourth');

		} elseif ($aku->step==4){
			//kalau udah pass sama email, masuk ke biodata dasar
			redirect('register/fifth');

		} elseif ($aku->step==5){
			//kalau udah pass sama email, masuk ke biodata dasar
			redirect('register/sixth');
		} elseif ($aku->step==6){
		//kalau udah pass sama email, masuk ke biodata dasar
		redirect('register/selesai');
	} elseif ($aku->step==-1){
			//awalan
			redirect('register/tos');
			
		} else {
			$this->session->set_flashdata('informasi', 'Error pada registrasi.');
			redirect('login');
		}
	}

	public function tos(){
		$aku=$this->register_model->get_info($this->session->userdata('username'));
		//yang boleh kesini cuma yang step=0, yg belom pernah masuk samsasekali.
		if ($aku->step!=-1) redirect('register');
 		$this->load->view('tos');		
	}

	public function agreetos(){
		$aku=$this->register_model->get_info($this->session->userdata('username'));
		//yang boleh kesini cuma yang step=0, yg belom pernah masuk samsasekali.
		if ($aku->step!=-1) redirect('register');
		$this->register_model->update_step($this->session->userdata('username'),0);
		redirect('register/first');
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
			$tgl_lahir=$this->input->post('tgl_lahir');
			if ($pa!=$pb){
				$this->session->set_flashdata('informasi','Password tidak sama');
				redirect('register/first');
			} else{
				$this->register_model->putpass($pa, $email, $profil->username, $tgl_lahir);
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
 		$this->load->view('second');	
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
		$prov_dom=$this->input->post('prov_dom');
		$kabkot_dom=$this->input->post('kabkot_dom');
		$alamat_lengkap_dom=$this->input->post('alamat_lengkap_dom');
		$lanjut_belajar=$this->input->post('lanjut_belajar');
		$kegiatan=$this->input->post('kegiatan');

		if($this->register_model->putprofil($this->session->userdata('username'), $nomorhp,$nomorwa,$linkedin,$facebook,$ig,$twitter,$prov,$kabkot,$alamat_lengkap,$prov_dom,$kabkot_dom,$alamat_lengkap_dom,$lanjut_belajar,$kegiatan)){
		redirect('register/third');

		} else {
			echo ('Error PB 1');
		}

	}

	public function third() {
		$aku=$this->register_model->get_info($this->session->userdata('username'));
		if($aku->step!=2){
			$this->session->set_flashdata('informasi','Terjadi kesalahan, R3.');
			redirect('register');
		}

		$profil=$this->register_model->get_profil($this->session->userdata('username'));
		if($profil->lanjut_belajar==1){
			$this->load->view('third');
		}else{
			$this->register_model->update_step($this->session->userdata('username'),3);
			redirect('register/fourth');
		}
	}

	public function procpend(){
		$profil=$this->register_model->get_info($this->session->userdata('username'));
		if ($profil->step!=2) redirect('register');

		//BELOM DIAMANKAN ISINYA

		$pendidikan=$this->input->post('pendidikan');
		$tahun_masuk=$this->input->post('tahun_masuk');
		$tahun_keluar=$this->input->post('tahun_keluar');
		$instansi=$this->input->post('instansi');
		$jurusan=$this->input->post('jurusan');
		$pascasarjana=$this->input->post('pascasarjana');
		if ($pascasarjana==1){
			$instansi_lanjut=$this->input->post('instansi_lanjut');
			$jurusan_lanjut=$this->input->post('jurusan_lanjut');
		} else {
			$instansi_lanjut=NULL;
			$jurusan_lanjut=NULL;
		}
		$beasiswa=$this->input->post('beasiswa');


		if($this->register_model->putpendidkan($this->session->userdata('username'), $pendidikan, $tahun_masuk, $tahun_keluar, $instansi, $jurusan, $pascasarjana, $instansi_lanjut, $jurusan_lanjut, $beasiswa)){
		redirect('register/fourth');

		} else {
			echo ('Error PB 3');
		}
	}

	//VIEW KERJA
	public function fourth() {
		$aku=$this->register_model->get_info($this->session->userdata('username'));
		if($aku->step!=3){
			$this->session->set_flashdata('informasi','Terjadi kesalahan, R4.');
			redirect('register');
		}

		$profil=$this->register_model->get_profil($this->session->userdata('username'));
		if($profil->kegiatan==1 || $profil->kegiatan==3){
			//kalau bekerja, ngisi di data pekerjaan
			$this->load->view('fourth');
		} elseif ($profil->kegiatan==2){
			//kalau tidak bekerja, namun berusaha, ke laman usaha
			$this->register_model->update_step($this->session->userdata('username'),4);
			redirect('register/fifth');
		} elseif ($profil->kegiatan==4){
			//kalo nganggur ya langsung kelar
			$this->register_model->update_step($this->session->userdata('username'),5);
			redirect('register/selesai');
		}
	}

	//INPUT KERJA
	public function prockerja(){
		$aku=$this->register_model->get_info($this->session->userdata('username'));
		if ($aku->step!=3) redirect('register');
		
		$profil=$this->register_model->get_profil($this->session->userdata('username'));
		if($profil->kegiatan==1 || $profil->kegiatan==3){
		//BELOM DIAMANKAN ISINYA
			$kegiatan=$this->input->post('kegiatan');
			if ($kegiatan=='Bekerja' || $kegiatan=='Magang'){
				$status_pekerjaan=$this->input->post('status_pekerjaan');
				$tempat_kerja=$this->input->post('tempat_kerja');
				$bidang=$this->input->post('bidang');
				if ($bidang=='Lainnya'){
					$bidang='(Lainnya) '.$this->input->post('lainnya');
				}
				$jabatan=$this->input->post('jabatan');
				$deskripsi_pekerjaan=$this->input->post('deskripsi_pekerjaan');
				$rencana=NULL;
	
			} else if($kegiatan=='Koas'){
				$status_pekerjaan=NULL;
				$tempat_kerja=NULL;
				$bidang=NULL;
				$jabatan=NULL;
				$deskripsi_pekerjaan=NULL;
				$rencana=$this->input->post('rencana');
			}
	
	
			if($this->register_model->putpekerjaan($this->session->userdata('username'), $kegiatan, $status_pekerjaan, $tempat_kerja,$bidang, $jabatan, $deskripsi_pekerjaan, $rencana )){
			redirect('register/selesai');
			} else {
				echo ('Error PB 4');
			}
		} else{
			echo ("Error ProcKerja.");
		}
	}

	//ISI USAHA
	public function fifth() {
		$aku=$this->register_model->get_info($this->session->userdata('username'));
		if($aku->step!=4){
			$this->session->set_flashdata('informasi','Terjadi kesalahan, R5.');
			redirect('register');
		}

		$profil=$this->register_model->get_profil($this->session->userdata('username'));
		if($profil->kegiatan==2 || $profil->kegiatan==3){
			//kalau usaha, ngisi di data usaha
			$this->load->view('fifth');
		} else {
			$this->register_model->update_step($this->session->userdata('username'),5);
			redirect('register/selesai');
		}
	}

	// INPUT USAHA
	public function procusaha(){
		$aku=$this->register_model->get_info($this->session->userdata('username'));
		if ($aku->step!=4) redirect('register');
		
		$profil=$this->register_model->get_profil($this->session->userdata('username'));
		if($profil->kegiatan==2 || $profil->kegiatan==3){
			//BELOM DIAMANKAN ISINYA
			$nama_usaha=$this->input->post('nama_usaha');
			$alamat_usaha=$this->input->post('alamat_usaha');
			$deskripsi_usaha=$this->input->post('deskripsi_usaha');

			$bidang=$this->input->post('bidang_usaha');
			if ($bidang=='Lainnya'){
				$bidang='(Lainnya) '.$this->input->post('lainnya');
			}

		if($this->register_model->putusaha($this->session->userdata('username'), $nama_usaha, $bidang, $alamat_usaha, $deskripsi_usaha )){
		redirect('register/selesai');
		} else {
			echo ('Error PB 5');
		}
		} else {
			echo('Error Procusaha');
		}
	}

	public function sixth(){
		$profil=$this->register_model->get_info($this->session->userdata('username'));
		if ($profil->step!=5) redirect('register');
		$this->load->view('regisfoto');
	}

	public function fotoprofil(){
		$profil=$this->register_model->get_info($this->session->userdata('username'));
		if ($profil->step!=5) redirect('register');
		$data = $this->input->post('imagebase64');
		if($data==NULL){redirect('register');}
		if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
			$data = substr($data, strpos($data, ',') + 1);
			$type = strtolower($type[1]); // jpg, png, gif
		
			if (!in_array($type, [ 'jpg', 'jpeg', 'png' ])) {
				throw new \Exception('invalid image type');
			}
		
			$data = base64_decode($data);
		
			if ($data === false) {
				throw new \Exception('base64_decode failed');
			}
		} else {
			throw new \Exception('did not match data URI with image data');
		}
		$namefile=$this->session->userdata('username');
		file_put_contents("./public/profpic/{$namefile}.{$type}", $data);
		$this->session->set_flashdata('result', 'Perubahan Foto Berhasil');
		$this->register_model->update_step($this->session->userdata('username'),6);
		redirect('register');
	}


	public function selesai(){
		$profil=$this->register_model->get_info($this->session->userdata('username'));
		if ($profil->step!=6) redirect('register');
		$this->load->view('selesai');
	}

	public function kabkot(){
		$prov=$this->input->post('prov');
		$kabkot=$this->register_model->get_kabkot($prov);
		foreach($kabkot->result() as $row){
			echo("<option value='".$row->name."' >".$row->name."</option>");
		}
	}

	public function back(){
		$profil=$this->register_model->mundur($this->session->userdata('username'));
		redirect('register');
	}

	public function a(){
		$this->load->view('first');
	}

	public function aa(){
		$this->load->view('second');
	}
	public function aaa(){
		$this->load->view('third');
	}
	public function aaaa(){
		$this->load->view('fourth');
	}
	public function aaaaa(){
		$this->load->view('fifth');
	}
	public function aaaaaa(){
		$this->load->view('selesai');
	}
	public function aaaaaaa(){
		$this->load->view('tos');
	}

}
