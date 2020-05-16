<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penempatan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent ::__construct();
		$this->load->model('Model_penempatan');
	}
	public function index(){
		redirect('nyasar');
	}

	public function run_simulasi()
	{
		$mahasiswa = $this->Model_penempatan->get_mahasiswa()->result_array();
		foreach ($mahasiswa as $key => $value) {
			if(!is_null($value['pil_fix'])){
				$bersama = $this->Model_penempatan->check_bersama($value['nim'],$value['bersama']);
				if($bersama){
					$bersama = $this->Model_penempatan->get_mahasiswa($value['bersama'])->result_array()[0];
					if(
						$this->Model_penempatan->check_masuk_prov($value['nim'],$value['prodi'],$value['pil_fix'])&&
						$this->Model_penempatan->check_masuk_prov($bersama['nim'],$bersama['prodi'],$bersama['pil_fix'])
					){
						continue;
					}else{
						if(
							$this->Model_penempatan->check_masuk_prov($value['nim'],$value['prodi'],$value['pil_2'])&&
							$this->Model_penempatan->check_masuk_prov($bersama['nim'],$bersama['prodi'],$bersama['pil_2'])
						){
							$this->Model_penempatan->set_pilihan_fix($value['nim'],$value['pil_2']);
							$this->Model_penempatan->set_pilihan_fix($bersama['nim'],$value['pil_2']);
							continue;
						}else{
							if(
								$this->Model_penempatan->check_masuk_prov($value['nim'],$value['prodi'],$value['pil_3'])&&
								$this->Model_penempatan->check_masuk_prov($bersama['nim'],$bersama['prodi'],$bersama['pil_3'])
							){
								$this->Model_penempatan->set_pilihan_fix($value['nim'],$value['pil_3']);
								$this->Model_penempatan->set_pilihan_fix($bersama['nim'],$value['pil_3']);
								continue;
							}else{
								$this->Model_penempatan->set_pilihan_fix($value['nim'],NULL);
								$this->Model_penempatan->set_pilihan_fix($bersama['nim'],NULL);
							}
						}
					}
				}else{
					if($this->Model_penempatan->check_masuk_prov($value['nim'],$value['prodi'],$value['pil_fix'])){
						continue;
					}else{
						if($this->Model_penempatan->check_masuk_prov($value['nim'],$value['prodi'],$value['pil_2'])){
							$this->Model_penempatan->set_pilihan_fix($value['nim'],$value['pil_2']);
							continue;
						}else{
							if($this->Model_penempatan->check_masuk_prov($value['nim'],$value['prodi'],$value['pil_3'])){
								$this->Model_penempatan->set_pilihan_fix($value['nim'],$value['pil_3']);
								continue;
							}else{
								$this->Model_penempatan->set_pilihan_fix($value['nim'],NULL);
							}
						}
					}
				}
			}else{
				continue;
			}
		}
		$provinsi_kosong = $this->Model_penempatan->get_provinsi_kosong()->result_array();
		if($provinsi_kosong->num_rows()>0){
			$this->alokasi_random($provinsi_kosong->result_array());
		}

	}

	public function alokasi_random($provinsi_kosong){

		$mahasiswa_bersama = $this->Model_penempatan->get_mahasiswa_terdepak(true);
		while ($mahasiswa_bersama->sizeof()>0) {
			$bisa_bersama = false;
			$mahasiswa1 = $mahasiswa_bersama->row();
			$mahasiswa2 = $this->Model_penempatan->get_mahasiswa($mahasiswa1->bersama)->row();
			$kebutuhan = array(
				'se'=>0,
				'sk'=>0,
				'ks'=>0
			);	
			$kebutuhan = $this->set_kebutuhan_bersama($mahasiswa1->prodi,$kebutuhan);
			$kebutuhan = $this->set_kebutuhan_bersama($mahasiswa2->prodi,$kebutuhan);

			foreach ($provinsi_kosong as $key => $value) {
				if(
					$kebutuhan['se']<=$value['sisa_se']&&
					$kebutuhan['sk']<=$value['sisa_sk']&&
					$kebutuhan['ks']<=$value['sisa_ks']
				){
					$provinsi_kosong[$key]['sisa_se'] -= $kebutuhan['se'];
					$provinsi_kosong[$key]['sisa_ks'] -= $kebutuhan['ks'];
					$provinsi_kosong[$key]['sisa_sk'] -= $kebutuhan['sk'];
					$bisa_bersama = true;
					$this->Model_penempatan->set_pilihan_fix($mahasiswa1->nim,$value['id']);
					$this->Model_penempatan->set_pilihan_fix($mahasiswa2->nim,$value['id']);
					break;
				}
			}
			if(!$bisa_bersama){
				$this->Model_penempatan->gagal_bersama($mahasiswa1->nim);
				$this->Model_penempatan->gagal_bersama($mahasiswa2->nim);
			}
			$mahasiswa_bersama = $this->Model_penempatan->get_mahasiswa_terdepak(true);
		}


		$mahasiswa = $this->Model_penempatan->get_mahasiswa_terdepak(false);
		if($mahasiswa->sizeof()>0){
			$mahasiswa = $mahasiswa->result_array();
			foreach ($mahasiswa as $key => $value) {
				$kebutuhan = array(
					'se'=>0,
					'sk'=>0,
					'ks'=>0
				);	
				$kebutuhan = $this->set_kebutuhan_bersama($mahasiswa['prodi'],$kebutuhan);
				foreach ($provinsi_kosong as $key => $value) {
					switch ($mahasiswa['prodi']) {
						case 'SE':
							if($value['sisa_se']>0){
								$this->Model_penempatan->set_pilihan_fix($mahasiswa['nim'],$value['id']);
								$provinsi_kosong[$key]['sisa_se'] -= 1;
							}else{
								continue;
							}
							break;
						case 'SK':
							if($value['sisa_sk']>0){
								$this->Model_penempatan->set_pilihan_fix($mahasiswa['nim'],$value['id']);
								$provinsi_kosong[$key]['sisa_sk'] -= 1;
							}else{
								continue;
							}
							break;
						case 'KS':
							if($value['sisa_ks']>0){
								$this->Model_penempatan->set_pilihan_fix($mahasiswa['nim'],$value['id']);
								$provinsi_kosong[$key]['sisa_ks'] -= 1;
							}else{
								continue;
							}
							break;
					}
				}
			}	
		}
		

	}

	public function set_kebutuhan_bersama($prodi,$kebutuhan){
		switch ($prodi) {
			case 'SE':
				$kebutuhan['se'] += 1;
				break;
			case 'SK':
				$kebutuhan['sk'] += 1;
				break;
			case 'KS':
				$kebutuhan['ks'] += 1;
				break;
		}
		return $kebutuhan;
	}


	//Membuat dummy pilihan formasi
	public function create_dummy(){
		$formasi = $this->Model_penempatan->get_prov()->result_array();
		$max = sizeof($formasi);
		$mahasiswa = $this->Model_penempatan->get_mahasiswa()->result_array();

		foreach ($mahasiswa as $key => $value) {
			if($value['jenis_daftar']==0){
				$random1 = $value['asal_pmb'];
				$random2 = $value['asal_pmb'];
				$random3 = $value['asal_pmb'];
			}else{
				$random1 = $formasi[rand(0,$max-1)]['id'];
				$random2 = $formasi[rand(0,$max-1)]['id'];
				while ($random2==$random1) {
					$random2 = $formasi[rand(0,$max-1)]['id'];
				}
				$random3 = $formasi[rand(0,$max-1)]['id'];
				while($random3==$random1||$random3==$random2){
					$random3 = $formasi[rand(0,$max-1)]['id'];
				}
			}
			$this->Model_penempatan->set_pilihan($value['nim'],$random1,$random2,$random3);
		}
	}

}

// class workerThread extends Thread {
// public function __construct($i){
//   $this->i=$i;
// }

// public function run(){
//   while(true){
//    echo $this->i;
//    sleep(1);
//   }
// }
// }

// for($i=0;$i<50;$i++){
// $workers[$i]=new workerThread($i);
// $workers[$i]->start();
// }
