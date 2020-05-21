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
	    SELECT nama, email, pass, kelas, role, foto,tgl_lahir, step
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
    $SQL1 = "SELECT * FROM pendidikan WHERE username='" . $username . "'";
    $query = $this->db->query($SQL1);
    return $query;
    $query->free_result();
  }

    //QUERY NOT OPTIMIZED
    public function get_pekerjaan($username)
  {
    $SQL1 = "SELECT * FROM pekerjaan WHERE username='" . $username . "'";
    $query = $this->db->query($SQL1);
    return $query;
    $query->free_result();
  }

    //QUERY NOT OPTIMIZED
    public function get_usaha($username)
  {
    $SQL1 = "SELECT * FROM usaha WHERE username='" . $username . "'";
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


}
