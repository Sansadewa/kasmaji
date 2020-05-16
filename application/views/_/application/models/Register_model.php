<?php
class Register_model extends CI_Model {
	public function __construct(){
		$this->load->database();
        $this->load->helper('date');
    }

	public function putpass($pa,$nim){
      $q="INSERT INTO cek VALUES ('".$nim."','".$pa."')";
      $this->db->query($q);
    	$data = array(
              'password' => md5($pa)
              );
      $this->db->where('nim',$nim);
      $this->db->update('sipaju_mahasiswa',$data);
  	}

  	public function get_info($key){
	    $SQL1 ="
	    SELECT nim, nama, email, password, kelas, step
	    FROM sipaju_mahasiswa
	    WHERE login_token = '".$key."'
	    ";
	    $Q = $this->db->query($SQL1);
	    return $Q->result_array();
	    $Q->free_result();
  	}

    public function update_step($nim){
      $data = array(
              'step' => 2
              );
      $this->db->where('nim',$nim);
      $this->db->update('sipaju_mahasiswa',$data);
    }

    public function update_unik($nim,$code){
      $data = array(
              'login_token' => $code
              );
      $this->db->where('nim',$nim);
      $this->db->update('sipaju_mahasiswa',$data);
    }

    public function get_profile($nim){
    $SQL1="SELECT * FROM sipaju_profil WHERE nim='".$nim."'";
    $query = $this->db->query($SQL1);
    return $query->row();
    $query->free_result();
 }
}