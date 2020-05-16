<?php
class Mahasiswa_model extends CI_Model {
	public function __construct(){
		$this->load->database();
        $this->load->helper('date');
    }

	public function verifikasi($nim){
    	return $this->db->get_where('mahasiswa', array('nim' => $nim))->num_rows();
  	}

  	public function get_info($nim){
	    $SQL1 ="
	    SELECT nama, email, password, kelas, jabatan, kodeLupaPass
	    FROM sipaju_mahasiswa
	    WHERE nim = '".$nim."'
	    ";
	    $Q = $this->db->query($SQL1);
	    return $Q->result_array();
	    $Q->free_result();
  	}

  	public function update_login($nim,$last){
		$data = array('last_login' => $last);
      	$this->db->where('nim',$nim);
      	$this->db->update('mahasiswa',$data);
   }

   public function get_alltopik(){
   		$SQL1="SELECT * FROM sipaju_topik";
   		$query = $this->db->query($SQL1);
   		return $query;
   		$query->free_result();
   }
   
   public function get_history(){
   		$SQL1="SELECT * FROM log_topik UNION SELECT * FROM log_topikbaru";
   		$query = $this->db->query($SQL1);
   		return $query;
   		$query->free_result();
   }

   public function getRank($kode){
      $sql="SELECT * FROM rank_".$kode;
      return $this->db->query($sql);
      $sql->free_result();
   }

   public function get_mytopik($nim){
   		$SQL1="SELECT * FROM sipaju_topik WHERE nim='".$nim."'";
   		$query = $this->db->query($SQL1);
   		return $query;
   		$query->free_result();
   }

   public function get_profile($nim){
   		$SQL1="SELECT * FROM sipaju_profil WHERE nim='".$nim."'";
   		$query = $this->db->query($SQL1);
   		return $query;
   		$query->free_result();
   }

   public function get_btm($nim){
   		$SQL1="SELECT btm.nim, namapanggilan, email_personal, himada, kabkot, provinsi FROM sipaju_btm btm, sipaju_profil prof WHERE btm.nim=prof.nim AND btm.nim='".$nim."'";
   		$query = $this->db->query($SQL1);
   		return $query;
   		$query->free_result();
   }

   public function rekap_btm($ket){
    if($ket=='all'){
      $SQL1="SELECT mhs.nim, mhs.nama, mhs.kelas, kabkot, provinsi, namapanggilan, email_personal, himada FROM sipaju_mahasiswa mhs LEFT JOIN (SELECT prof.nim, kabkot, provinsi, namapanggilan, email_personal, himada FROM sipaju_btm btm, sipaju_profil prof WHERE prof.nim=btm.nim) t ON t.nim=mhs.nim ORDER BY mhs.kelas,mhs.nim ASC";
      $query = $this->db->query($SQL1);
      return $query;
      $query->free_result();
    } else {
     $SQL1="SELECT mhs.nim, mhs.nama, mhs.kelas, kabkot, provinsi, namapanggilan, email_personal, himada FROM sipaju_mahasiswa mhs LEFT JOIN (SELECT prof.nim, kabkot, provinsi, namapanggilan, email_personal, himada FROM sipaju_btm btm, sipaju_profil prof WHERE prof.nim=btm.nim) t ON t.nim=mhs.nim WHERE mhs.kelas='".$ket."'";
      $query = $this->db->query($SQL1);
      return $query;
      $query->free_result();
    }
      
   }
   
   public function reset($nim){
    //   $SQL1="UPDATE sipaju_mahasiswa SET step=0, password='' WHERE nim='".$nim."'";
        $data = array('password' => '', 'step'=>0);
      	$this->db->where('nim',$nim);
      	$this->db->update('mahasiswa',$data);
   }

   public function savekode($nim, $kode){
    $data = array('kodeLupaPass' => $kode);
    $this->db->where('nim',$nim);
    $this->db->update('mahasiswa', $data);
   }

   // DEPRECATED
   // public function get_btm($nim){
   //    $SQL1="SELECT * FROM sipaju_btm WHERE nim='".$nim."'";
   //    $query = $this->db->query($SQL1);
   //    return $query;
   //    $query->free_result();
   // }
}