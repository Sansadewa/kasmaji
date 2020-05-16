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
  public function set_pilihan($nim,$pil_1=NULL,$pil_2=NULL,$pil_3=NULL,$kab1=NULL,$kab2=NULL,$kab3=NULL,$bersama=NULL){
    $this->db->trans_start();
    $pilihan  = array(
      'pil_1' => $pil_1,
      'pil_2' => $pil_2,
      'pil_3' => $pil_3,
      'kab_1' => $kab1,
      'kab_2' => $kab2,
      'kab_3' => $kab3,
      'pil_fix'=> $pil_1,
      'bersama' => $bersama
    );

    $this->db->set($pilihan)
    ->where('nim',$nim);

    if($this->db->update('sipaju_mahasiswaa')){
      $this->db->trans_complete();
      return true;
    }else{
      return false;
    }
  }
  public function getjam(){
   return $this->db->query('SELECT * FROM sipaju_update_penempatan');
  }
  public  function  getbelom(){
      return $this->db->where('pil_1 is NULL',NULL, FALSE)->get('mahasiswaa');
  }

  public function set_pilihan_fix($nim,$pil_fix){
    $this->db->trans_start();
    $pilihan  = array(
      'pil_fix'=> $pil_fix
    );
    $this->db->set($pilihan)
    ->where('nim',$nim);

    if($this->db->update('sipaju_mahasiswaa')){
      $this->db->trans_complete();
      return true;
    }else{
      return false;
    }
  }

  public function set_pil_fix_default($nim){
    $mahasiswa = $this->db->where('nim',$nim)->get('sipaju_mahasiswaa')->row();
    
    $this->db->where('nim',$nim)->set('pil_fix',$mahasiswa->pil_1)->update('sipaju_mahasiswaa');
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
	   	->get('sipaju_mahasiswaa');

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

    //kalo kuotanya gede, dan peminatnya cuma dikit, ya otomatis masuk dong.
      // if($kuota>$jml_nim_choose_prov){
      //   $this->set_status($nim, 'masuk', $pil);
      //    echo "MASUK free".$nim.$pil."<br>";
      //   return true;

      // }else{

      $match = 0;
      $nim_choose_prov=$nim_choose_prov->result_array();
      for ($i=0; $i < $kuota; $i++) { 
        if($nim_choose_prov[$i]['nim']==$nim){
          echo "MASUK ".$nim_choose_prov[$i]['nama'].$pil."<br>";
          $this->set_status($nim, 'masuk', $pil);

          //NGECEK ADA YANG KEDEPAK ATAU KAGA
          $this->cek_depak($pil,$prodi,$kuota);
          return true;
        }
      }

      return false;
    // }
  }

  public  function  cek_depak($pil,$prodi,$kuota){
    $depakmhs=$this->db->select('*,IF (asal_pmb=pil_fix, 1, 0) AS putra_daerah ')
    ->where('pil_fix',$pil)
    ->where('prodi',$prodi)
    ->order_by('jenis_daftar','ASC')
    ->order_by('putra_daerah','DESC')
    ->order_by('ranking','ASC')
    ->get('sipaju_mahasiswaa');

    $totalpeminat=$depakmhs->num_rows();
    $depakmhs=$depakmhs->result_array();

    for($sisa=$kuota; $sisa < $totalpeminat; $sisa++){
      if(substr( $depakmhs[$sisa]['status'] , 0,-1)  =='masuk'){
          $kasian=$depakmhs[$sisa]['nim'];
          $dari=substr($depakmhs[$sisa]['status'] , -1);
          $this->set_status($kasian, 'depak', $dari,1);
          echo "DEPAK ".$depakmhs[$sisa]['nama'].$pil."Sisakuota".$sisa.$kuota."<br><pre>";
          print_r($depakmhs); echo "<br></pre>";


              $this->set_pilihan_fix($depakmhs[$sisa]['nim'], $depakmhs[$sisa]['pil_1']);
              $bersama = $this->check_bersama($depakmhs[$sisa]['nim'],$depakmhs[$sisa]['bersama']);
              if($bersama){
                $bersama = $this->get_mahasiswa($depakmhs[$sisa]['bersama'])->result_array()[0];
                $this->set_pilihan_fix($bersama['nim'], $bersama['pil_1']);
                if(
                  $this->check_masuk_prov($depakmhs[$sisa]['nim'],$depakmhs[$sisa]['prodi'],$depakmhs[$sisa]['pil_fix'])&&
                  $this->check_masuk_prov($bersama['nim'],$bersama['prodi'],$bersama['pil_fix'])
                ){
                  continue;
                }else{
                  if(
                    $this->set_pilihan_fix($depakmhs[$sisa]['nim'],$depakmhs[$sisa]['pil_2']) &&
                    $this->set_pilihan_fix($bersama['nim'],$depakmhs[$sisa]['pil_2']) &&
                    $this->check_masuk_prov($depakmhs[$sisa]['nim'],$depakmhs[$sisa]['prodi'],$depakmhs[$sisa]['pil_2'])&&
                    $this->check_masuk_prov($bersama['nim'],$bersama['prodi'],$bersama['pil_2'])
                  ){
                    $this->set_pilihan_fix($depakmhs[$sisa]['nim'],$depakmhs[$sisa]['pil_2']);
                    $this->set_pilihan_fix($bersama['nim'],$depakmhs[$sisa]['pil_2']);
                    continue;
                  }else{
                    if(
                      $this->set_pilihan_fix($depakmhs[$sisa]['nim'],$depakmhs[$sisa]['pil_3']) &&
                    $this->set_pilihan_fix($bersama['nim'],$depakmhs[$sisa]['pil_3']) &&
                      $this->check_masuk_prov($depakmhs[$sisa]['nim'],$depakmhs[$sisa]['prodi'],$depakmhs[$sisa]['pil_3'])&&
                      $this->check_masuk_prov($bersama['nim'],$bersama['prodi'],$bersama['pil_3'])
                    ){
                      $this->set_pilihan_fix($depakmhs[$sisa]['nim'],$depakmhs[$sisa]['pil_3']);
                      $this->set_pilihan_fix($bersama['nim'],$depakmhs[$sisa]['pil_3']);
                      continue;
                    }else{
                      $this->set_pilihan_fix($depakmhs[$sisa]['nim'],NULL);
                      $this->set_pilihan_fix($bersama['nim'],NULL);
                    }
                  }
                }
              }else{
                if($this->check_masuk_prov($depakmhs[$sisa]['nim'],$depakmhs[$sisa]['prodi'],$depakmhs[$sisa]['pil_fix'])){
                  continue;
                }else{
                  if($this->set_pilihan_fix($depakmhs[$sisa]['nim'],$depakmhs[$sisa]['pil_2']) && $this->check_masuk_prov($depakmhs[$sisa]['nim'],$depakmhs[$sisa]['prodi'],$depakmhs[$sisa]['pil_2'])){
                    // $this->set_pilihan_fix($depakmhs[$sisa]['nim'],$depakmhs[$sisa]['pil_2']);
                    continue;
                  }else{
                    if($this->set_pilihan_fix($depakmhs[$sisa]['nim'],$depakmhs[$sisa]['pil_3']) && $this->check_masuk_prov($depakmhs[$sisa]['nim'],$depakmhs[$sisa]['prodi'],$depakmhs[$sisa]['pil_3'])){
                      // $this->set_pilihan_fix($depakmhs[$sisa]['nim'],$depakmhs[$sisa]['pil_3']);
                      continue;
                    }else{
                      $this->set_pilihan_fix($depakmhs[$sisa]['nim'],99);
                    }
                  }
                }
              }

      }
    }




  }

  public function set_status($nim,$status,$pil, $tipe='jokowi'){
    //tanpa cek ke db
    if($tipe==1){
        $this->db->where('nim', $nim)->set('status', $status.$pil)->update('sipaju_mahasiswaa');
    } else {
      $mhs=$this->db->where('nim',$nim)->get('sipaju_mahasiswaa')->row();
      if($status=='masuk'){
          if($mhs->pil_1==$pil){$uhuy='masuk1';} elseif ($mhs->pil_2==$pil) {$uhuy='masuk2';} else {$uhuy='masuk3';}
      } elseif($status=='depak') {
          if($mhs->pil_1==$pil){$uhuy='depak1';} elseif ($mhs->pil_2==$pil) {$uhuy='depak2';} else {$uhuy='depak3';}
      }
      $this->db->where('nim', $nim)->set('status', $uhuy)->update('sipaju_mahasiswaa');
    }
  }

  //Untuk menghapus pasangan penempatan bersama
  public function gagal_bersama($nim){
    $this->set('bersama',NULL);
    $this->where('nim',$nim);
    return $this->update('sipaju_mahasiswaa');
  }

  public function check_pil_bersama($nim1,$nim2){
    $orang1 = $this->db->where('nim',$nim1)->get('sipaju_mahasiswaa')->row();
    $orang2 = $this->db->where('nim',$nim2)->get('sipaju_mahasiswaa')->row();
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
    if($nim2==NULL){
      return false;
    }
    $orang1 = $this->db->where('nim',$nim1)->get('sipaju_mahasiswaa')->row();
    $orang2 = $this->db->where('nim',$nim2)->get('sipaju_mahasiswaa')->row();

    if($orang1->bersama==$nim2&&$orang2->bersama==$nim1){
      return true;
    }else{
      return false;
    }

  }

  public function get_mahasiswa_terdepak($bersama=false){
    if($bersama){
      return $this->db->where('bersama is NOT NULL', NULL, FALSE)->where('pil_fix is NULL',NULL, FALSE)->get('sipaju_mahasiswaa');
    }else{
      return $this->db->where('pil_fix is NULL',NULL, FALSE)->get('sipaju_mahasiswaa');
    }
  }

  public function get_provinsi_kosong(){
    return $this->db->query("
SELECT tabel_1.id AS id, deskripsi, sisa_sk, sisa_se, sisa_ks
    FROM(
      SELECT sipaju_formasi.id, sipaju_formasi.deskripsi, sipaju_formasi.ks - COALESCE(terisi_ks,0) AS sisa_ks FROM sipaju_formasi LEFT JOIN 
      (SELECT sipaju_tmp.pil_fix, COUNT(sipaju_tmp.nim) AS terisi_ks FROM sipaju_tmp WHERE sipaju_tmp.prodi = 'KS' GROUP BY sipaju_tmp.pil_fix) AS mahasiswa_ks
      ON mahasiswa_ks.pil_fix = sipaju_formasi.id 
    ) AS tabel_1
    JOIN
    (
      SELECT sipaju_formasi.id, sipaju_formasi.se - COALESCE(terisi_se,0) AS sisa_se FROM sipaju_formasi LEFT JOIN 
      (SELECT sipaju_tmp.pil_fix, COUNT(sipaju_tmp.nim) AS terisi_se FROM sipaju_tmp WHERE sipaju_tmp.prodi = 'SE' GROUP BY sipaju_tmp.pil_fix) AS mahasiswa_se
      ON mahasiswa_se.pil_fix = sipaju_formasi.id 
    ) AS tabel_2
    ON tabel_1.id = tabel_2.id
    JOIN
    (
      SELECT sipaju_formasi.id, sipaju_formasi.sk - COALESCE(terisi_sk,0) AS sisa_sk FROM sipaju_formasi LEFT JOIN 
      (SELECT sipaju_tmp.pil_fix, COUNT(sipaju_tmp.nim) AS terisi_sk FROM sipaju_tmp WHERE sipaju_tmp.prodi = 'SK' GROUP BY sipaju_tmp.pil_fix) AS mahasiswa_sk
      ON mahasiswa_sk.pil_fix = sipaju_formasi.id 
    ) AS tabel_3
    ON tabel_1.id = tabel_3.id
    WHERE sisa_sk != 0 ||sisa_ks != 0||sisa_se != 0

    ");
  }

  public function get_prov(){
    return $this->db->get('sipaju_formasi');
  }

  public function get_mahasiswa($nim=null){
    if(!is_null($nim)){
      $this->db->where('nim',$nim);
    }
    return $this->db
    ->order_by('ranking','ASC')
    ->get('sipaju_mahasiswaa');
  }


  public function get_pilihan($prod,$table=NULL){
    if($table==NULL){$table='sipaju_mahasiswaa';}
    if ($prod=='ALL') {
      $sql="SELECT ".$table.".nim,  ".$table.".kab_1, ".$table.".kab_2, ".$table.".kab_3, ".$table.".nama, ".$table.".prodi, ranking, jenis_daftar, f4.deskripsi as asal_pmb, bersama, f5.deskripsi as daerah_fix, ".$table.".pil_1, ".$table.".pil_2, ".$table.".pil_3, f1.deskripsi AS daerah1,f2.deskripsi AS daerah2, f3.deskripsi AS daerah3 FROM `".$table."` LEFT JOIN sipaju_formasi f5 ON f5.id=".$table.".pil_fix LEFT JOIN sipaju_formasi f4 ON f4.id=".$table.".asal_pmb LEFT JOIN sipaju_formasi f1 ON f1.id = ".$table.".pil_1 LEFT JOIN sipaju_formasi f2 ON f2.id = ".$table.".pil_2 LEFT JOIN sipaju_formasi f3 ON f3.id = ".$table.".pil_3 ";
    return $this->db->query($sql);
    } else{
    $sql="SELECT ".$table.".nim, ".$table.".kab_1, ".$table.".kab_2, ".$table.".kab_3, ".$table.".nama, ".$table.".prodi, ranking, jenis_daftar, f4.deskripsi as asal_pmb, bersama, f5.deskripsi as daerah_fix, ".$table.".pil_1, ".$table.".pil_2, ".$table.".pil_3, f1.deskripsi AS daerah1,f2.deskripsi AS daerah2, f3.deskripsi AS daerah3 FROM `".$table."` LEFT JOIN sipaju_formasi f5 ON f5.id=".$table.".pil_fix LEFT JOIN sipaju_formasi f4 ON f4.id=".$table.".asal_pmb LEFT JOIN sipaju_formasi f1 ON f1.id = ".$table.".pil_1 LEFT JOIN sipaju_formasi f2 ON f2.id = ".$table.".pil_2 LEFT JOIN sipaju_formasi f3 ON f3.id = ".$table.".pil_3 WHERE prodi='".$prod."'";
    return $this->db->query($sql);
    }
  }

  public function cekhasil($nim,$table){
    $sql="SELECT * FROM ".$table." WHERE nim='".$nim."' AND (pil_1 IS NOT NULL OR pil_2 IS NOT NULL OR pil_3 IS NOT NULL)";
    if ($this->db->query($sql)->num_rows()>0) {
      return true;
    } else {return false;}
  }

    public function cekstatus(){
    if ($this->db->query("SELECT * FROM status_simulasi")->row()->is_open==0) {
      return false;
    } else {return true;}
  }

  public function set_batas($rank, $jenis)
  {
    if($jenis=='SE' || $jenis=='SK' || $jenis=='KS'){
      $this->db->query("UPDATE threshold SET ".$jenis."=".$rank);
    } else {echo "Huruf gede mas jurusannya.";}
  }

  public function get_batas(){
    return $this->db->query("SELECT * FROM threshold");
  }
}