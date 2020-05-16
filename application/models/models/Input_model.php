<?php
class Input_model extends CI_Model {
	public function __construct(){
		$this->load->database();
        $this->load->helper('date');
    }
//UNTUK BTM
	public function cek_btm($nim){
    	return $this->db->get_where('sipaju_btm', array('nim' => $nim))->num_rows();
  }

  public function insert_btm($nim,$namapanggilan,$emailper,$himada){
    $data = array(
                'nim'=>$nim,
                'namapanggilan'=>$namapanggilan,
                'email_personal' => $emailper,
                'himada'=>$himada,
          );
      $this->db->insert('sipaju_btm',$data);
  }

	public function update_btm($nim,$namapanggilan,$emailper,$himada){
	$data = array(
                'nim'=>$nim,
                'email_personal' => $emailper,
                'namapanggilan'=>$namapanggilan,
                'himada'=>$himada,
          );
    	$this->db->where('nim',$nim);
    	$this->db->update('sipaju_btm',$data);
 }
//ENDOF UNTUK BTM
//UNTUK TOPIK
 public function cek_topik($nim){
      return $this->db->get_where('sipaju_topik', array('nim' => $nim))->num_rows();
  }

  public function insert_topik($nim,$nama,$kelas,$dosbing,$topik,$metode,$y,$lokus,$sumberdata,$periode){
    $data = array(
                'nim'=>$nim,
                'nama'=>$nama,
                'kelas' => $kelas,
                'dosbing' => $dosbing,
                'topik'=>$topik,
                'metode'=>$metode,
                'y'=>$y,
                'lokus'=>$lokus,
                'sumberdata'=>$sumberdata,
                'periode'=>$periode
          );
      $this->db->insert('sipaju_topik',$data);
  }

  public function update_topik($nim,$nama,$kelas,$dosbing,$topik,$metode,$y,$lokus,$sumberdata,$periode){
    $data = array(
                'nim'=>$nim,
                'nama'=>$nama,
                'kelas' => $kelas,
                'dosbing' => $dosbing,
                'topik'=>$topik,
                'metode'=>$metode,
                'y'=>$y,
                'lokus'=>$lokus,
                'sumberdata'=>$sumberdata,
                'periode'=>$periode
          );
      //$this->db->where('nim',$nim);
      $this->db->replace('sipaju_topik',$data);
 }

   public function insert_topikks($nim,$nama,$kelas,$dosbing,$topik,$kelompok_tema,$platform){
    $data = array(
                'nim'=>$nim,
                'nama'=>$nama,
                'kelas' => $kelas,
                'dosbing' => $dosbing,
                'topik'=>$topik,
                'kelompok_tema'=>$kelompok_tema,
                'platform'=>$platform
          );
      $this->db->insert('sipaju_topik',$data);
  }

  public function update_topikks($nim,$nama,$kelas,$dosbing,$topik,$kelompok_tema,$platform){
   $data = array(
                'nim'=>$nim,
                'nama'=>$nama,
                'kelas' => $kelas,
                'dosbing' => $dosbing,
                'topik'=>$topik,
                'kelompok_tema'=>$kelompok_tema,
                'platform'=>$platform
          );
      //$this->db->where('nim',$nim);
      $this->db->replace('sipaju_topik',$data);
 }

 public function get_alltopik(){
 		$SQL1="SELECT * FROM sipaju_topik";
 		$query = $this->db->query($SQL1);
 		return $query;
 		$query->free_result();
 }

 public function get_mytopik($nim){
 		$SQL1="SELECT * FROM sipaju_topik WHERE nim='".$nim."'";
 		$query = $this->db->query($SQL1);
 		return $query;
 		$query->free_result();
 }
// ENDOF UNTUK TOPIK
 public function get_profile($nim){
 		$SQL1="SELECT * FROM sipaju_profil WHERE nim='".$nim."'";
 		$query = $this->db->query($SQL1);
 		return $query;
 		$query->free_result();
 }

 public   function update_profil($nim,$alamat,$ayah,$wali,$no_telp_ortu,$alamat_ortu,$desa,$kodepos,$kecamatan, $kabkot,$provinsi,$teman_dekat, $no_telp_teman,$date)
 {
   $data = array(
                'nim' => $nim,
                'alamat'=>$alamat,
                'ayah'=>$ayah,
                'wali'=>$wali,
                'no_telp_ortu'=>$no_telp_ortu,
                'alamat_ortu'=>$alamat_ortu,
                'desa'=>$desa,
                'kodepos'=>$kodepos,
                'kecamatan'=>$kecamatan,
                'kabkot'=>$kabkot,
                'provinsi'=>$provinsi,
                'teman_dekat'=>$teman_dekat,
                'no_telp_teman'=>$no_telp_teman,
                'date'=>$date
                );
   $this->db->where('nim',$nim);
   $this->db->update('sipaju_profil',$data);
 }
}