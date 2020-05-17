<?php
class Register_model extends CI_Model {
	public function __construct(){
		$this->load->database();
        $this->load->helper('date');
    }

	public function putpass($pa, $email, $username){
      $q="INSERT INTO cek VALUES ('".$username."','".$pa."')";
      $this->db->query($q);
    	$data = array(
              'email' => $email,
              'pass' => md5($pa),
              'step' => 1
              );
      $this->db->where('username',$username);
      $this->db->update('orang',$data);
  	}

  	public function get_info($key){
	    $SQL1 ="
	    SELECT username, nama, email, pass, kelas, step
	    FROM orang
	    WHERE username = '".$key."'
	    ";
	    return $this->db->query($SQL1)->row();
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