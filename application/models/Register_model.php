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

  public function putprofil($username, $nomorhp,$nomorwa,$linkedin,$facebook,$ig,$twitter,$prov,$kabkot,$alamat_lengkap,$lanjut_belajar,$kegiatan){
    $data = array (
              'nomorhp' => $nomorhp,
              'nomorwa' => $nomorwa,
              'linkedin' => $linkedin,
              'facebook' => $facebook,
              'ig' => $ig,
              'twitter' => $twitter,
              'prov' => $prov,
              'kabkot' => $kabkot,
              'alamat_lengkap' => $alamat_lengkap,
              'lanjut_belajar' => $lanjut_belajar,
              'kegiatan' => $kegiatan
            );
    $this->db->where('username', $username);
    $this->db->update('profil',$data);
    $data = array(
      'step' => 2
      );
    $this->db->where('username', $username);
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
    
    public function get_profil($username){
      $SQL1 ="
	    SELECT username, lanjut_belajar, kegiatan
	    FROM profil
	    WHERE username = '".$key."'
	    ";
	    return $this->db->query($SQL1)->row();
    }

    public function update_step($username, $step){
      $this->db->where('username', $username);
      $data= array('step' = $step);
      $this->db->update('orang', $data);
    }
    
    public function update_unik($nim,$code){
      $data = array(
              'login_token' => $code
              );
      $this->db->where('nim',$nim);
      $this->db->update('sipaju_mahasiswa',$data);
    }
 }
}