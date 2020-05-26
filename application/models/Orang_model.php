<?php
class Orang_model extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
    $this->load->helper('date');
  }

  public function verifikasi($uname)
  {
    return $this->db->get_where('orang', array('username' => $uname))->num_rows();
  }

  public function get_info($username)
  {
    $SQL1 = "
	    SELECT nama, email, pass, kelas, role, foto,tgl_lahir, step, forgot_token
	    FROM orang
	    WHERE username = '" . $username . "'
	    ";
    $Q = $this->db->query($SQL1);
    return $Q->result_array();
    $Q->free_result();
  }

    //QUERY NOT OPTIMIZED
    public function get_profile($username)
  {
    $SQL1 = "SELECT * FROM profil WHERE username='" . $username . "'";
    $query = $this->db->query($SQL1);
    return $query;
    $query->free_result();
  }

    //QUERY NOT OPTIMIZED
    public function get_pendidikan($username)
  {
    $SQL1 = "SELECT * FROM orang LEFT JOIN pendidikan on orang.username=pendidikan.username WHERE orang.username='" . $username . "'";
    $query = $this->db->query($SQL1);
    return $query;
    $query->free_result();
  }

    //QUERY NOT OPTIMIZED
    public function get_pekerjaan($username)
  {
    $SQL1 = "SELECT * FROM orang LEFT JOIN pekerjaan on orang.username=pekerjaan.username WHERE orang.username='" . $username . "'";
    $query = $this->db->query($SQL1);
    return $query;
    $query->free_result();
  }

    //QUERY NOT OPTIMIZED
    public function get_usaha($username)
  {
    $SQL1 = "SELECT * FROM orang LEFT JOIN usaha on orang.username=usaha.username WHERE orang.username='" . $username . "'";
    $query = $this->db->query($SQL1);
    return $query;
    $query->free_result();
  }

  
    //QUERY NOT OPTIMIZED
    public function get_all_pendidikan(){
      $SQL1 = "SELECT * FROM pendidikan a RIGHT JOIN orang b On a.username=b.username";
      $query = $this->db->query($SQL1);
      return $query;
      $query->free_result();
    }
  
    //QUERY NOT OPTIMIZED
    public function get_all_pekerjaan(){
      $SQL1 = "SELECT * FROM pekerjaan a RIGHT JOIN orang b On a.username=b.username";
      $query = $this->db->query($SQL1);
      return $query;
      $query->free_result();
    }
  
    //QUERY NOT OPTIMIZED
    public function get_all_usaha(){
      $SQL1 = "SELECT * FROM usaha a RIGHT JOIN orang b On a.username=b.username";
      $query = $this->db->query($SQL1);
      return $query;
      $query->free_result();
    }


    //QUERY NOT OPTIMIZED
    public function get_all_sharing(){
      $SQL1 = "SELECT * FROM sharing a JOIN orang b On a.username=b.username";
      $query = $this->db->query($SQL1);
      return $query;
      $query->free_result();
    }

        //QUERY NOT OPTIMIZED
        public function get_own_sharing($username){
          $SQL1 = "SELECT * FROM sharing a JOIN orang b On a.username=b.username AND b.username='".$username."'";
          $query = $this->db->query($SQL1);
          return $query;
          $query->free_result();
        }

        public function search_sharing($username, $kodesharing){
          $SQL1 = "SELECT * FROM sharing b where  b.username='".$username."' AND b.kodesharing='".$kodesharing."'";
          $query = $this->db->query($SQL1);
          return $query;
          $query->free_result();
        }
    

  public function update_login($username, $last, $sess)
  {
    $data = array('last_login' => $last, 'session_token' => $sess);
    $this->db->where('username', $username);
    $this->db->update('orang', $data);
  }

  public function savekode($username, $kode)
  {
    $data = array('forgot_token' => $kode);
    $this->db->where('username', $username);
    $this->db->update('orang', $data);
  }

  public function cari($searchquery,$start,$limit){
    $q="SELECT * FROM orang WHERE LOWER(nama) REGEXP '".$searchquery."' LIMIT ".$start.",".$limit;
    $qu=$this->db->query($q);
    return $qu;
    $query->free_result();
  }

  public function carifull($searchquery){
    $q="SELECT * FROM orang WHERE LOWER(nama) REGEXP '".$searchquery."'";
    $qu=$this->db->query($q);
    return $qu;
    $query->free_result();
  }

  public function get_full($username){
    $q="SELECT * FROM orang o LEFT JOIN pekerjaan p ON p.username=o.username LEFT JOIN pendidikan on o.username=pendidikan.username LEFT JOIN profil ON o.username=profil.username LEFT JOIN usaha ON usaha.username=o.username WHERE o.username='".$username."'";
    $qu=$this->db->query($q);
    return $qu;
    $query->free_result();
  }
}
