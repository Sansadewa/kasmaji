<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input extends CI_Controller {

	function __construct(){
		parent ::__construct();
		$this->ceklogin->ceksesi();
		$this->load->model('input_model');
	}

	public function index()	{
		redirect('Akun');
	}

	public function fotoprofil(){
		$data = $this->input->post('imagebase64');
		if($data==NULL){redirect('akun');}
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
		redirect('akun');
	}

	public function sharing(){
		// print_r( $this->input->post()); die();
		$judul=$this->input->post('judul');
		$jenis_sharing=$this->input->post('jenis_sharing');
		$deskripsi_sharing=$this->input->post('deskripsi_sharing');
		$nama=$this->session->userdata('nama');
		$username=$this->session->userdata('username');
		$characters = '123456789zxcvbnmasdfghjkqwertyuipZXCVBNMASDFGHJKLQWERTYUP'; //membuat string dengan semua kemungkinan karakter yang ada
	    $password_token = ''; //membuat password baru
	    for ($i = 0; $i<13; $i++) {
	      $password_token .=$characters[rand(0, strlen($characters)-1)];
	    } 
		$kodesharing=$username.$password_token;
				$tgl_unggah=date('Y-m-d H:i:s', time());
		//kalo ada gambar masuk sini
		if(!empty($_FILES['uploadgambarsharing']['name'])){
			$namagambar=$kodesharing;
			$config['upload_path'] = './public/lihatsharing/';
			$config['file_name'] = $kodesharing;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '5120';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('uploadgambarsharing'))
			{
				$this->session->set_flashdata('result', $this->upload->display_errors());
				redirect('akun/sharing');
			}
			else
			{
				$this->input_model->put_sharing($nama,$username,$judul,$jenis_sharing,$deskripsi_sharing, $kodesharing, $tgl_unggah, $this->upload->data('file_name'));
				$this->session->set_flashdata('result', 'Sharing Berhasil');
				redirect('akun/sharing');
			}
		} else {
			//kalo gaada gambar masuk sini
			$this->input_model->put_sharing($nama,$username,$judul,$jenis_sharing,$deskripsi_sharing, $kodesharing, $tgl_unggah, NULL);
			$this->session->set_flashdata('result', 'Sharing Berhasil');
			redirect('akun/sharing');



		}
	}

	public function profilbase(){
			//BELOM DIAMANKAN ISINYA.
			$email=$this->input->post('email');
			$tgl_lahir=$this->input->post('tgl_lahir');
			if($this->input_model->update_profilbase($email,$this->session->userdata('username'),$tgl_lahir)){
				$this->session->set_userdata('email', $email);
				$this->session->set_userdata('tgl_lahir', $tgl_lahir);
				$this->session->set_flashdata('result', 'Perubahan Sukses.');
				redirect('akun');
			}		
	}

	public function profil(){
			//BELOM DIAMANKAN ISINYA.
		$nomorhp=$this->input->post('nomor_hp');
		$nomorwa=$this->input->post('nomor_wa');
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

		

		if($this->input_model->update_profil($this->session->userdata('username'), $nomorhp,$nomorwa,$linkedin,$facebook,$ig,$twitter,$prov,$kabkot,$alamat_lengkap,$prov_dom,$kabkot_dom,$alamat_lengkap_dom,$lanjut_belajar,$kegiatan)){
			$this->session->set_flashdata('result', 'Perubahan Sukses.');
			redirect('akun');
		} else {
			$this->session->set_flashdata('result', 'Perubahan Gagal.');
			redirect('akun');
		}
	}


	public function pendidikan(){
			//BELOM DIAMANKAN ISINYA.

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


		if($this->input_model->update_pendidkan($this->session->userdata('username'), $pendidikan, $tahun_masuk, $tahun_keluar, $instansi, $jurusan, $pascasarjana, $instansi_lanjut, $jurusan_lanjut, $beasiswa)){
			$this->session->set_flashdata('result', 'Perubahan Sukses.');
			redirect('akun/pendidikan');

		} else {
			$this->session->set_flashdata('result', 'Perubahan Gagal.');
			redirect('akun');
		}	
	}

	public function pekerjaan(){
		// VALIDASI PEKERJAAN.
		$profil=$this->input_model->get_profil($this->session->userdata('username'));
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


			if($this->input_model->update_pekerjaan($this->session->userdata('username'), $kegiatan, $status_pekerjaan, $tempat_kerja,$bidang, $jabatan, $deskripsi_pekerjaan, $rencana )){
				$this->session->set_flashdata('result', 'Perubahan Sukses.');
				redirect('akun/pekerjaan');
			} else {
				$this->session->set_flashdata('result', 'Perubahan GAGAL.');
				redirect('akun/pekerjaan');
			}
		} else{
			$this->session->set_flashdata('result', 'Perubahan GAGAL. Profil Menyatakan anda tidak bekerja.');
				redirect('akun/pekerjaan');
		} 
	}

	public function usaha(){
		$profil=$this->input_model->get_profil($this->session->userdata('username'));
		if($profil->kegiatan==2 || $profil->kegiatan==3){
			//BELOM DIAMANKAN ISINYA
			$nama_usaha=$this->input->post('nama_usaha');
			$alamat_usaha=$this->input->post('alamat_usaha');
			$deskripsi_usaha=$this->input->post('deskripsi_usaha');

			$bidang=$this->input->post('bidang_usaha');
			if ($bidang=='Lainnya'){
				$bidang='(Lainnya) '.$this->input->post('lainnya');
			}

		if($this->input_model->update_usaha($this->session->userdata('username'), $nama_usaha, $bidang, $alamat_usaha, $deskripsi_usaha )){
			$this->session->set_flashdata('result', 'Perubahan Sukses.');
			redirect('akun/usaha');
		} else {
			echo ('Error PB 5');
		}
		} else {
			$this->session->set_flashdata('result', 'Perubahan GAGAL. Profil Menyatakan anda tidak memiliki usaha.');
			redirect('akun/pekerjaan');

		}
	}
}
