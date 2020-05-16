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

	public function btm() {
    
		$panggilan = $this->input->post('namapanggilan');
		$emailper = $this->input->post('emailpersonal');
		// $asal = $this->input->post('asal');
		$himada = $this->input->post('himada');
		// $ig = $this->input->post('ig');
		// $line = $this->input->post('line');
		// $pesan = $this->input->post('pesankesan');
		$nim = $this->session->userdata('nim');
        if($nim=='15.8614'){redirect('akun');};
		$checker=$this->input_model->cek_btm($nim);
		if( $checker==1) {
			// $this->input_model->update_btm($nim,$panggilan,$emailper,$asal,$himada,$ig,$line,$pesan);
			$this->input_model->update_btm($nim,$panggilan,$emailper,$himada);
		} else {
			// $this->input_model->insert_btm($nim,$panggilan,$emailper,$asal,$himada,$ig,$line,$pesan);
			$this->input_model->insert_btm($nim,$panggilan,$emailper,$himada);
		};
		$this->session->set_flashdata('result','Perubahan Sukses!');
		redirect('akun/btm');
	}

	public function topik() {

		$nama = $this->session->userdata('nama');
		$nim = $this->session->userdata('nim');
		if($nim=='15.8614'){redirect('akun');};
		$kelas = $this->session->userdata('kelas');
		$dosbing = $this->input->post('dosbing');
		$topik = $this->input->post('topik');
		if ($kelas[1]=='K'){
			$kelompok_tema = $this->input->post('kelompok_tema');
			$platform = $this->input->post('platform');

			if($this->input_model->cek_topik($nim) ==1) {
				$this->input_model->update_topikks($nim,$nama,$kelas,$dosbing,$topik,$kelompok_tema,$platform);
			} else {
				$this->input_model->insert_topikks($nim,$nama,$kelas,$dosbing,$topik,$kelompok_tema,$platform);
			}
			$this->session->set_flashdata('result','Perubahan Topik Sukses');
		} else {
			$metode = $this->input->post('metode');
			$y = $this->input->post('y');
			$periode = $this->input->post('periode');
			$lokus = $this->input->post('lokus');
			$sumberdata = $this->input->post('sumberdata');

			if($this->input_model->cek_topik($nim) ==1) {
				$this->input_model->update_topik($nim,$nama,$kelas,$dosbing,$topik,$metode,$y,$lokus,$sumberdata,$periode);
			} else {
				$this->input_model->insert_topik($nim,$nama,$kelas,$dosbing,$topik,$metode,$y,$lokus,$sumberdata,$periode);
			}
			$this->session->set_flashdata('result','Perubahan Topik Statistika Sukses');
		}
		
		redirect('akun/topik/'.$nim);
	}

	public 	function profil()
	{
		$nim=$this->session->userdata('nim');
		if($nim=='15.8614'){redirect('akun');};
		$alamat=$this->input->post('alamat');
		$ayah=$this->input->post('ayah');
		$wali=$this->input->post('wali');
		$no_telp_ortu=$this->input->post('no_telp_ortu');
		$alamat_ortu=$this->input->post('alamat_ortu');
		$desa=$this->input->post('desa');
		$kodepos=$this->input->post('kodepos');
		$kecamatan=$this->input->post('kecamatan');
		$kabkot=$this->input->post('kabkot');
		$provinsi=$this->input->post('provinsi');
		$teman_dekat=$this->input->post('teman_dekat');
		$no_telp_teman=$this->input->post('no_telp_teman');
		$date=$this->input->post('date');
		$this->input_model->update_profil($nim,$alamat,$ayah,$wali,$no_telp_ortu,$alamat_ortu,$desa,$kodepos,$kecamatan, $kabkot,$provinsi,$teman_dekat, $no_telp_teman,$date);
		$this->session->set_flashdata('result','Perubahan Sukses');
		redirect('akun');
	}

}
