<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	function __construct(){
		parent ::__construct();
		$this->load->model('mahasiswa_model');
		$this->ceklogin->ceksesi();
	}

	public function index()
	{
		$data['profile']=$this->mahasiswa_model->get_profile($this->session->userdata('nim'));
		$this->load->view('akunhead');
		$this->load->view('akun',$data);
		$this->load->view('akunfooter');
	}

	// public	function elah(){
	// 	$mahasiswaa=$this->mahasiswa_model->getMahasiswaa()->result_array();
	// 	foreach ($mahasiswaa as $key) {
	// 		if ($this->mahasiswa_model->masukk($key['NIM'], $key['Ranking'])){
	// 			echo $key['NIM']." RANK ".$key['Ranking']." ".$key['Nama']." Perubahan Sukses \n";
	// 		} else{echo $key['NIM'].' Perubahan Gagal';}
	// 	}
	// }


	public	function duarr(){
		$this->load->model('model_penempatan');
		if($this->model_penempatan->cekstatus()){
			$pil1=$this->input->post('hoho1');
			$pil2=$this->input->post('hoho2');
			$pil3=$this->input->post('hoho3');
			$kab1=$this->input->post('hoho4');
			$kab2=html_escape($this->input->post('hoho5'));
			$kab3=html_escape($this->input->post('hoho6'));
			$bersama=$this->input->post('bersama');

			if ($bersama==$this->session->userdata('nim')) {
				$this->session->set_flashdata('result', 'Jomblo amat elah.');
				redirect('akun/abrakadabra');
				
			}

			
			$mhs=$this->model_penempatan->get_mahasiswa($this->session->userdata('nim'))->result_array();
			$thr=$this->model_penempatan->get_batas()->row();
			if(
				($mhs[0]['prodi']=='SK' && $mhs[0]['ranking']<$thr->SK) ||
				($mhs[0]['prodi']=='SE' && $mhs[0]['ranking']<$thr->SE) ||
				($mhs[0]['prodi']=='KS' && $mhs[0]['ranking']<$thr->KS) 
			 ) {
				$this->session->set_flashdata('result', 'Entri ditolak, data sudah dikunci.');
						redirect('akun/abrakadabra');
			}
			if ($mhs[0]['jenis_daftar']==0){
				if ($pil1==$pil2 && $pil2==$pil3 && $mhs[0]['asal_pmb']==$pil1) {
					if($this->model_penempatan->set_pilihan($this->session->userdata('nim'), $pil1, $pil2, $pil3, $kab1,$kab2, $kab3, $bersama)){
						$this->session->set_flashdata('result', 'Perubahan Sukses.');
						redirect('akun/abrakadabra');
					}
				}
				$this->session->set_flashdata('result', 'Maaf kak, kamu sudah di <i>tag</i> oleh  daerah.');
				redirect('akun/abrakadabra');
			} else{
				if($pil1==999 && ($pil2!=999 || $pil3!=999)){
					$this->session->set_flashdata('result', 'Maaf kak, Pilihan 1 harus diisi kalo mau isi 2 dan 3.');
					redirect('akun/abrakadabra');
				}

				if($pil2==999 && $pil3!=999){
					$this->session->set_flashdata('result', 'Maaf kak, Pilihan 2 harus diisi kalo mau isi pilihan 3.');
					redirect('akun/abrakadabra');
				}
				if ($pil1==999){$pil1=NULL;}
				if ($pil2==999){$pil2=NULL;}
				if ($pil3==999){$pil3=NULL;}
				if ($bersama==''){$bersama=NULL;} elseif (substr($bersama,0,2)!='15') {
					$this->session->set_flashdata('result', 'Entri NIM Bersama Janggal.'); redirect('akun/abrakadabra');	
				}
				
				if ($pil1==NULL || strlen($pil1)==2) {
					if ($pil2==NULL || strlen($pil2)==2) {
						if ($pil3==NULL || strlen($pil3)==2) {
							if (strlen($bersama)==7 || $bersama==NULL) {
								if($this->model_penempatan->set_pilihan($this->session->userdata('nim'), $pil1, $pil2, $pil3, $kab1,$kab2, $kab3, $bersama)){
									$this->session->set_flashdata('result', 'Perubahan Sukses.');
										redirect('akun/abrakadabra');
								} else {$this->session->set_flashdata('result', 'Something Went Wrong!.'); redirect('akun/abrakadabra');}
								
							} else {$this->session->set_flashdata('result', 'Entri NIM Bersama Janggal.'); redirect('akun/abrakadabra');}
						} else {$this->session->set_flashdata('result', 'Entri Pilihan 1 Janggal.');  redirect('akun/abrakadabra');}
					} else {$this->session->set_flashdata('result', 'Entri Pilihan 2 Janggal.'); redirect('akun/abrakadabra');}
				} else {$this->session->set_flashdata('result', 'Entri Pilihan 3 Janggal.'); redirect('akun/abrakadabra');}
			}
		} else {
		$this->session->set_flashdata('result', 'Sistem sedang menghitung simulasi. Coba lagi nanti.');
		redirect('akun/abrakadabra');			
		}
		

	}

	public	function abrakadabra(){
		$this->load->model('model_penempatan');
		$data['formasi']=$this->model_penempatan->get_prov()->result_array();
		$data['datanya']=$this->model_penempatan->get_mahasiswa($this->session->userdata('nim'))->result_array();
		if($this->session->userdata('nim')=='15.8636'){
			$data['pilihan']=$this->model_penempatan->get_pilihan('ALL');
		}else{
			$data['pilihan']=$this->model_penempatan->get_pilihan($data['datanya'][0]['prodi']);
		}
		
		$this->load->view('akunhead');
		$this->load->view('abrakadabra',$data);
		if ($data['datanya'][0]['pil_1']!=NULL ||$data['datanya'][0]['pil_2']!=NULL ||$data['datanya'][0]['pil_3']!=NULL || $this->session->userdata('nim')=='15.8636') {
			$this->load->view('pilihan',$data);
		}
		$this->load->view('akunfooter');
	}

	public function prokprokprok(){
		$this->load->model('model_penempatan');
		$data['datanya']=$this->model_penempatan->get_mahasiswa($this->session->userdata('nim'))->result_array();
		$this->load->view('akunhead');
		if($this->session->userdata('nim')=='15.8636'){
			$data['pilihan']=$this->model_penempatan->get_pilihan('ALL');
		}else{
			$data['pilihan']=$this->model_penempatan->get_pilihan($data['datanya'][0]['prodi']);
		}
		if ($data['datanya'][0]['pil_1']!=NULL ||$data['datanya'][0]['pil_2']!=NULL ||$data['datanya'][0]['pil_3']!=NULL || $this->session->userdata('nim')=='15.8636' || $this->model_penempatan->cekhasil($this->session->userdata('nim'))) {
		// if ($this->session->userdata('nim')=='15.8636'||$this->session->userdata('nim')=='15.8880'||$this->session->userdata('nim')=='15.8691') {
			$this->load->view('simsalabimmm',$data);
		}
		$this->load->view('akunfooter');
	}

	public function simbagula(){
		$this->load->model('model_penempatan');
		$data['datanya']=$this->model_penempatan->get_mahasiswa($this->session->userdata('nim'))->result_array();
		$this->load->view('akunhead');
		$a['belom']=$this->model_penempatan->getbelom();
		$this->load->view('belomanisi',$a);
		if($this->session->userdata('nim')=='15.8636'){
			$data['pilihan']=$this->model_penempatan->get_pilihan('ALL', 'sipaju_tmp');
		}else{
			$data['pilihan']=$this->model_penempatan->get_pilihan($data['datanya'][0]['prodi'], 'sipaju_tmp');
		}
		if ($data['datanya'][0]['pil_1']!=NULL ||$data['datanya'][0]['pil_2']!=NULL ||$data['datanya'][0]['pil_3']!=NULL || $this->session->userdata('nim')=='15.8636' || $this->model_penempatan->cekhasil($this->session->userdata('nim'),'sipaju_tmp')) {
			$data['jam']=$this->model_penempatan->getjam()->result_array();
			$this->load->view('simsalabimmm',$data);

			$b['kosong']=$this->model_penempatan->get_provinsi_kosong();
			$this->load->view('kosong', $b);
		} else { $this->session->set_flashfata('result','Ngisi sini dulu kak'); redirect('akun/abrakadabra');}

		
		$this->load->view('akunfooter');
	}



	public function hohihohe($s){
		if ($s=='gas') {
			$this->db->query("truncate status_simulasi");
			$this->db->query("insert into status_simulasi values(1)");
			$this->session->set_flashdata('result', 'ENTRI DIBUKA.'); redirect('akun/abrakadabra');

		} elseif ($s=='rem') {
			$this->db->query("truncate status_simulasi");
			$this->db->query("insert into status_simulasi values(0)");
			$this->session->set_flashdata('result', 'Entri DITUTUP.'); redirect('akun/abrakadabra');
		}
	}

	public function simsalabim(){
		$this->load->model('model_penempatan');
		$data['datanya']=$this->model_penempatan->get_mahasiswa($this->session->userdata('nim'))->result_array();
		$this->load->view('akunhead');
		if($this->session->userdata('nim')=='15.8636'){
			$data['pilihan']=$this->model_penempatan->get_pilihan('ALL', 'hasilrealtime1');
		}else{
			$data['pilihan']=$this->model_penempatan->get_pilihan($data['datanya'][0]['prodi'], 'hasilrealtime1');
		}
		if ($data['datanya'][0]['pil_1']!=NULL ||$data['datanya'][0]['pil_2']!=NULL ||$data['datanya'][0]['pil_3']!=NULL || $this->session->userdata('nim')=='15.8636' || $this->model_penempatan->cekhasil($this->session->userdata('nim'),'hasil1')) {
			$this->load->view('hasilrealtime1',$data);
		}
		$this->load->view('akunfooter');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
	public function BTM()
	{
		$data['btm']= $this->mahasiswa_model->get_btm($this->session->userdata('nim'));
		$this->load->view('akunhead');
		if ($data['btm']->num_rows()<1){
		    $this->load->view('btmblank');
		} else {
		    $this->load->view('btm',$data);
		}
		$this->load->view('akunfooter');
	}

	public function rank(){
		$kon=substr($this->session->userdata('kelas'), 1,2);
		switch ($kon) {
			case 'KS':
				$ha=$this->mahasiswa_model->getRank('KS');
				break;

			case 'SE':
				$ha=$this->mahasiswa_model->getRank('SE');
				break;

			case 'SK':
				$ha=$this->mahasiswa_model->getRank('SK');
				break;
			

			default:
				redirect('https://google.com');
				break;
		}
		$data['rank']=$ha;
		$this->load->view('akunhead');
		$this->load->view('rank1',$data);
		$this->load->view('akunfooter');


	}

	public function topik($nimtopik)
	{	
	    //$this->load->view('maintenis');
		if($this->session->userdata('nim')!=$nimtopik){ redirect('Akun'); } else {
			$data['topik']=$this->mahasiswa_model->get_mytopik($nimtopik);
			$this->load->view('akunhead');
			$this->load->view('topik',$data);
			$this->load->view('akunfooter');
		}
	}

	public function alltopik()
	{
		$data['topik']=$this->mahasiswa_model->get_alltopik();
		$this->load->view('akunhead');
		$this->load->view('alltopik',$data);
		$this->load->view('akunfooter');
	}

	public function fulltopik()
	{
		$data['topik']=$this->mahasiswa_model->get_alltopik();
		$this->load->view('fulltopik',$data);
	}

	public function IPK()
	{
		$this->load->view('akunhead');
		$this->load->view('ipk');
		$this->load->view('akunfooter');
	}

		public function rekap_btm()
	{
		$nim=$this->session->userdata('nim');
		if($nim=='15.8658' || $nim== '15.8918' || $nim== '15.8605' || $nim== '15.8889' || $nim=='15.8792' || $nim=='15.8507' || $nim== '15.8825' || $nim== '15.8898' || $nim== '15.8888' || $nim== '15.8608' || $nim== '15.8493' || $nim== '15.8756' || $nim== '15.8873' || $nim== '15.8893'  || $nim== '15.8861' || $nim== '15.8636' || $nim== '15.8668'|| $nim== '15.8643'|| $nim== '15.8468'|| $nim== '15.8680'|| $nim== '15.8770'|| $nim== '15.8499' || $nim=='15.8725') {
                  
                  if ($this->session->userdata('jabatan')==1){
                  		$data['btm']=$this->mahasiswa_model->rekap_btm($this->session->userdata('kelas'));
                      	$this->load->view('akunhead');
						$this->load->view('allbtm',$data);
                  } elseif($this->session->userdata('jabatan')==2) { 
                  		$data['btm']=$this->mahasiswa_model->rekap_btm('all');
                  		$this->load->view('akunhead');
						$this->load->view('allbtm',$data);
						$this->load->view('akunfooter');
                  } else {
                      $this->load->view('error-nyasar');
                  }
                  		
                } else {
                	$this->load->model('input_model');
                	$this->input_model->log_access($this->session->userdata('nim'),'Rekap BTM');
                	$this->load->view('zonk');
                }
	}

		public function rekap_btm_full()
	{
		$nim=$this->session->userdata('nim');
		if($nim=='15.8658' ||$nim='15.8725' || $nim== '15.8918' || $nim== '15.8605' || $nim== '15.8889' || $nim=='15.8792' || $nim=='15.8507' || $nim== '15.8825' || $nim== '15.8898' || $nim== '15.8888' || $nim== '15.8608' || $nim== '15.8493' || $nim== '15.8756' || $nim== '15.8873' || $nim== '15.8893'  || $nim== '15.8861' || $nim== '15.8636' || $nim== '15.8668'|| $nim== '15.8643'|| $nim== '15.8468'|| $nim== '15.8680'|| $nim== '15.8770'|| $nim== '15.8499' || $nim=='15.8725') {
                  if ($this->session->userdata('jabatan')==1){
                  		$data['btm']=$this->mahasiswa_model->rekap_btm($this->session->userdata('kelas'));
						$this->load->view('fullbtm',$data);
                  } elseif($this->session->userdata('jabatan')==2 || $nim='15.8725' ) { 
                  		$data['btm']=$this->mahasiswa_model->rekap_btm('all');
						$this->load->view('fullbtm',$data);
						$this->load->view('akunfooter');
                  }
                } else {
                	$this->load->model('input_model');
                	$this->input_model->log_access($this->session->userdata('nim'),'Rekap BTM');
                	$this->load->view('zonk');
                }
	}

}
