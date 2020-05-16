<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_penempatan extends CI_Model {

  /*
  Untuk set pilihan penempatan mahasiswaa
  input:
    $nim = NIM mahasiswaa
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

    if($this->db->update('mahasiswaa')){
      $this->db->trans_complete();
      return true;
    }else{
      return false;
    }
  }

  public function get_pilihan($prod){
    if ($prod=='ALL') {
      $sql="SELECT sipaju_mahasiswaa.nim, sipaju_mahasiswaa.nama, ranking, jenis_daftar, f4.deskripsi as asal_pmb, bersama, f5.deskripsi as daerah_fix, sipaju_mahasiswaa.pil_1, sipaju_mahasiswaa.pil_2, sipaju_mahasiswaa.pil_3, f1.deskripsi AS daerah1,f2.deskripsi AS daerah2, f3.deskripsi AS daerah3 FROM `sipaju_mahasiswaa` LEFT JOIN sipaju_formasi f5 ON f5.id=sipaju_mahasiswaa.pil_fix LEFT JOIN sipaju_formasi f4 ON f4.id=sipaju_mahasiswaa.asal_pmb LEFT JOIN sipaju_formasi f1 ON f1.id = sipaju_mahasiswaa.pil_1 LEFT JOIN sipaju_formasi f2 ON f2.id = sipaju_mahasiswaa.pil_2 LEFT JOIN sipaju_formasi f3 ON f3.id = sipaju_mahasiswaa.pil_3 ";
    return $this->db->query($sql);
    }
    $sql="SELECT sipaju_mahasiswaa.nim, sipaju_mahasiswaa.nama, ranking, jenis_daftar, f4.deskripsi as asal_pmb, bersama, f5.deskripsi as daerah_fix, sipaju_mahasiswaa.pil_1, sipaju_mahasiswaa.pil_2, sipaju_mahasiswaa.pil_3, f1.deskripsi AS daerah1,f2.deskripsi AS daerah2, f3.deskripsi AS daerah3 FROM `sipaju_mahasiswaa` LEFT JOIN sipaju_formasi f5 ON f5.id=sipaju_mahasiswaa.pil_fix LEFT JOIN sipaju_formasi f4 ON f4.id=sipaju_mahasiswaa.asal_pmb LEFT JOIN sipaju_formasi f1 ON f1.id = sipaju_mahasiswaa.pil_1 LEFT JOIN sipaju_formasi f2 ON f2.id = sipaju_mahasiswaa.pil_2 LEFT JOIN sipaju_formasi f3 ON f3.id = sipaju_mahasiswaa.pil_3 WHERE prodi='".$prod."'";
    return $this->db->query($sql);
  }

  public function set_pilihan_fix($nim,$pil_fix){
    $this->db->trans_start();
    $pilihan  = array(
      'pil_fix'=> $pil_fix
    );
    $this->db->set($pilihan)
    ->where('nim',$nim);

    if($this->db->update('mahasiswaa')){
      $this->db->trans_complete();
      return true;
    }else{
      return false;
    }
  }
  public function cekstatus(){
    if ($this->db->query("SELECT * FROM status_simulasi")->row()->is_open==0) {
      return false;
    } else {return true;}
  }

  /*
  Untuk mengecek apakah dapat masuk ke tempat pilihan 
  Output :
    true :berhasil masuk ke tempat pilihan
    false:gagal masuk tempat pilihan
  */
  public function check_masuk_prov($nim,$prodi,$pil){
    if($pil==NULL){
      return false;
    }
    $nim_choose_prov = 
    $this->db->select('*,IF (asal_pmb=pil_fix, 1, 0) AS putra_daerah ')
    ->where('pil_fix',$pil)
    ->where('prodi',$prodi)
    ->order_by('jenis_daftar','ASC')
    ->order_by('putra_daerah','DESC')
    ->order_by('ranking','ASC')
    ->get('mahasiswaa');


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
      print_r('<br> '.$nim.$pil.' kuota:'.$kuota.'|jml yg milih:'.$jml_nim_choose_prov);
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
    return $this->update('mahasiswaa');
  }

  public function check_pil_bersama($nim1,$nim2){
    $orang1 = $this->db->where('nim',$nim1)->get('mahasiswaa')->row();
    $orang2 = $this->db->where('nim',$nim2)->get('mahasiswaa')->row();
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

  public function set_pil_fix_default($nim){
    $mahasiswa = $this->db->where('nim',$nim)->get('sipaju_mahasiswaa')->row();
    
    $this->db->where('nim',$nim)->set('pil_fix',$mahasiswa->pil_1)->update('sipaju_mahasiswaa');
  }
  
  //Untuk ngecek dua duanya berenan(ngga bertepuk sebelah tangan :))
  public function check_bersama($nim1,$nim2){
    $orang1 = $this->db->where('nim',$nim1)->get('mahasiswaa')->row();
    $orang2 = $this->db->where('nim',$nim2)->get('mahasiswaa')->row();
    if ($orang1 && $orang2){
        if($orang1->bersama==$nim2&&$orang2->bersama==$nim1){
          return true;
        }else{
          return false;
        }
    } else {return false;}

  }

  public function get_mahasiswa_terdepak($bersama=false){
    if($bersama){
      return $this->db->where('bersama is NOT NULL', NULL, FALSE)->where('pil_fix is NULL',NULL, FALSE)->get('mahasiswaa');
    }else{
      return $this->db->where('pil_fix is NULL',NULL, FALSE)->get('mahasiswaa');
    }
  }

  public function get_provinsi_kosong(){
    return $this->db->query("
    SELECT id_1 AS id, sk - terisi_sk AS sisa_sk,se - terisi_se AS sisa_se, ks - terisi_KS AS sisa_ks
    FROM(SELECT sipaju_formasi.id  AS id_1 ,sipaju_formasi.se,sipaju_formasi.sk,sipaju_formasi.ks, sipaju_formasi.deskripsi, COUNT(sipaju_mahasiswaa.nim) AS terisi_ks FROM `sipaju_formasi` LEFT JOIN sipaju_mahasiswaa ON sipaju_formasi.id = sipaju_mahasiswaa.pil_fix WHERE sipaju_mahasiswaa.prodi = 'KS'GROUP BY sipaju_formasi.id) AS tabel_1
    JOIN
    (SELECT sipaju_formasi.id AS id_2, COUNT(sipaju_mahasiswaa.nim) AS terisi_se FROM `sipaju_formasi` LEFT JOIN sipaju_mahasiswaa ON sipaju_formasi.id = sipaju_mahasiswaa.pil_fix WHERE sipaju_mahasiswaa.prodi = 'SE'GROUP BY sipaju_formasi.id) AS tabel_2
    ON id_1 = id_2
    JOIN
    (SELECT sipaju_formasi.id AS id_3, COUNT(sipaju_mahasiswaa.nim) AS terisi_sk FROM `sipaju_formasi` LEFT JOIN sipaju_mahasiswaa ON sipaju_formasi.id = sipaju_mahasiswaa.pil_fix WHERE sipaju_mahasiswaa.prodi = 'SK'GROUP BY sipaju_formasi.id) AS tabel_3
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
    ->get('mahasiswaa');
  }



}