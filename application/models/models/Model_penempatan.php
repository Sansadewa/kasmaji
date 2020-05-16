<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_penempatan extends CI_Model {

  /*
  Untuk set pilihan penempatan mahasiswa
  input:
    $nim = NIM mahasiswa
    $pil_1 = pilihan penempatan prioritas 1, bisa kosong
    $pil_2 = pilihan penempatan prioritas 2, bisa kosong
    $pil_3 = pilihan penempatan prioritas 3, bisa kosong
  output :
    true : update berhasil
    false: update gagal
  */
  public function set_pilihan($nim,$pil_1=NULL,$pil_2=NULL,$pil_3=NULL,$bersama=NULL){
    $this->db->trans_start();
    $pilihan  = array(
      'pil_1' => $pil_1,
      'pil_2' => $pil_2,
      'pil_3' => $pil_3,
      'pil_fix'=> $pil_1,
      'bersama' => $bersama
    );

    $this->db->set($pilihan)
    ->where('nim',$nim);

    if($this->db->update('mahasiswa')){
      $this->db->trans_complete();
      return true;
    }else{
      return false;
    }
  }

  public function set_pilihan_fix($nim,$pil_fix){
    $this->db->trans_start();
    $pilihan  = array(
      'pil_fix'=> $pil_fix
    );
    $this->db->set($pilihan)
    ->where('nim',$nim);

    if($this->db->update('mahasiswa')){
      $this->db->trans_complete();
      return true;
    }else{
      return false;
    }
  }


  /*
  Untuk mengecek apakah dapat masuk ke tempat pilihan 
  Output :
    true :berhasil masuk ke tempat pilihan
    false:gagal masuk tempat pilihan
  */
  public function check_masuk_prov($nim,$prodi,$pil){
    
    $nim_choose_prov = 
    $this->db->select('*,IF (asal_pmb=pil_fix, 1, 0) AS putra_daerah ')
    ->where('pil_fix',$pil)
    ->where('prodi',$prodi)
    ->order_by('jenis_daftar','ASC')
    ->order_by('putra_daerah','DESC')
    ->order_by('ranking','ASC')
    ->get('mahasiswa');


    $jml_nim_choose_prov = $nim_choose_prov->num_rows();
    $kuota = $this->db->where('id',$pil)->get('formasi');
    switch ($prodi) {
      case 'SE':
        $kuota = $kuota->row()->se;
        break;
      case 'SK':
        $kuota = $kuota->row()->sk;
        break;
      case 'KS':
        $kuota = $kuota->row()->ks;
        break;
      default:
        $kuota = 0;
        break;
    }


    if($kuota>$jml_nim_choose_prov){
      print_r('<br>kuota:'.$kuota.'|jml yg milih:'.$jml_nim_choose_prov);
      return true;
    }else{
      $match = 0;
      $nim_choose_prov=$nim_choose_prov->result_array();
      for ($i=0; $i < $kuota; $i++) { 
        if($nim_choose_prov[$i]['nim']==$nim){
          print_r('<br>kuota:'.$kuota.'|peringkat:'.$i);
          return true;
        }
      }
      return false;
    }
  }


  //Untuk menghapus pasangan penempatan bersama
  public function gagal_bersama($nim){
    $this->set('bersama',NULL);
    $this->where('nim',$nim);
    return $this->update('mahasiswa');
  }

  public function check_pil_bersama($nim1,$nim2){
    $orang1 = $this->db->where('nim',$nim1)->get('mahasiswa')->row();
    $orang2 = $this->db->where('nim',$nim2)->get('mahasiswa')->row();
    if(
      $orang2->pil_1==$orang1->pil_1&&
      $orang2->pil_2==$orang1->pil_2&&
      $orang2->pil_3==$orang1->pil_3
    ){
      return true;
    }else{
      return false;
    }
  }

  //Untuk ngecek dua duanya berenan(ngga bertepuk sebelah tangan :))
  public function check_bersama($nim1,$nim2){
    $orang1 = $this->db->where('nim',$nim1)->get('mahasiswa')->row();
    $orang2 = $this->db->where('nim',$nim2)->get('mahasiswa')->row();

    if($orang1->bersama==$nim2&&$orang2->bersama==$nim1){
      return true;
    }else{
      return false;
    }

  }

  public function get_mahasiswa_terdepak($bersama=false){
    if($bersama){
      return $this->db->where('bersama is NOT NULL', NULL, FALSE)->where('pil_fix is NULL',NULL, FALSE)->get('mahasiswa');
    }else{
      return $this->db->where('pil_fix is NULL',NULL, FALSE)->get('mahasiswa');
    }
  }

  public function get_provinsi_kosong(){
    return $this->db->query("
    SELECT id_1 AS id, sk - terisi_sk AS sisa_sk,se - terisi_se AS sisa_se, ks - terisi_KS AS sisa_ks
    FROM(SELECT formasi.id  AS id_1 ,formasi.se,formasi.sk,formasi.ks, formasi.deskripsi, COUNT(mahasiswa.nim) AS terisi_ks FROM `formasi` LEFT JOIN mahasiswa ON formasi.id = mahasiswa.pil_fix WHERE mahasiswa.prodi = 'KS'GROUP BY formasi.id) AS tabel_1
    JOIN
    (SELECT formasi.id AS id_2, COUNT(mahasiswa.nim) AS terisi_se FROM `formasi` LEFT JOIN mahasiswa ON formasi.id = mahasiswa.pil_fix WHERE mahasiswa.prodi = 'SE'GROUP BY formasi.id) AS tabel_2
    ON id_1 = id_2
    JOIN
    (SELECT formasi.id AS id_3, COUNT(mahasiswa.nim) AS terisi_sk FROM `formasi` LEFT JOIN mahasiswa ON formasi.id = mahasiswa.pil_fix WHERE mahasiswa.prodi = 'SK'GROUP BY formasi.id) AS tabel_3
    ON id_1 = id_3
    WHERE sk - terisi_sk != 0 ||ks - terisi_ks != 0||se - terisi_se != 0");
  }

  public function get_prov(){
    return $this->db->get('formasi');
  }

  public function get_mahasiswa($nim=null){
    if(!is_null($nim)){
      $this->db->where('nim',$nim);
    }
    return $this->db
    ->order_by('ranking','ASC')
    ->get('mahasiswa');
  }



}