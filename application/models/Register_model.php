<?php
class Register_model extends CI_Model {
	public function __construct(){
		$this->load->database();
        $this->load->helper('date');
    }

  public function get_kabkot($prov){
    $q="SELECT name FROM regencies WHERE province_id=(SELECT id FROM provinces WHERE name='".$prov."')";
    return $this->db->query($q);
  }
	public function putpass($pa, $email, $username, $tgl_lahir){
      $q="INSERT INTO cek VALUES ('".$username."','".$pa."')";
      $this->db->query($q);
    	$data = array(
              'email' => $email,
              'pass' => md5($pa),
              'tgl_lahir'=>$tgl_lahir,
              'step' => 1
              );
      $this->db->where('username',$username);
      $this->db->update('orang',$data);
  	}

    public function putprofil($username, $nomorhp,$nomorwa,$linkedin,$facebook,$ig,$twitter,$prov,$kabkot,$alamat_lengkap,$prov_dom,$kabkot_dom,$alamat_lengkap_dom,$lanjut_belajar,$kegiatan){
      $this->db->where('username', $username);
      $this->db->delete('profil');
      $data = array (
                'username' => $username,
                'nomor_hp' => $nomorhp,
                'nomor_wa' => $nomorwa,
                'linkedin' => $linkedin,
                'facebook' => $facebook,
                'ig' => $ig,
                'twitter' => $twitter,
                'prov' => $prov,
                'kabkot' => $kabkot,
                'alamat_lengkap' => $alamat_lengkap,
                'prov_dom' => $prov_dom,
                'kabkot_dom' => $kabkot_dom,
                'alamat_lengkap_dom' => $alamat_lengkap_dom,
                'lanjut_belajar' => $lanjut_belajar,
                'kegiatan' => $kegiatan
              );
  
      if($this->db->insert('profil',$data)){
        $data = array(
          'step' => 2
          );
        $this->db->where('username', $username);
        $this->db->update('orang',$data);
        return TRUE;
      } else {
  
      }
  
    }
    
    public function putpendidkan($username, $pendidikan, $tahun_masuk, $tahun_keluar, $instansi, $jurusan, $pascasarjana, $instansi_lanjut, $jurusan_lanjut, $beasiswa){
      $this->db->where('username', $username);
      $this->db->delete('pendidikan');
      $data = array (
                'username' => $username,
                'sedang_or_selesai' => $pendidikan,
                'th_masuk' => $tahun_masuk,
                'th_keluar' => $tahun_keluar,
                'instansi' => $instansi,
                'jurusan' => $jurusan,
                'pascasarjana' => $pascasarjana,
                'instansi_lanjut' => $instansi_lanjut,
                'jurusan_lanjut' => $jurusan_lanjut,
                'beasiswa' => $beasiswa, 
              );
  
      if($this->db->insert('pendidikan',$data)){
        $data = array(
          'step' => 3
          );
        $this->db->where('username', $username);
        $this->db->update('orang',$data);
        return TRUE;
      } else {
  
      }
  
    }

    public function putpekerjaan($username, $kegiatan, $status_pekerjaan, $tempat_kerja,$bidang, $jabatan, $deskripsi_pekerjaan, $rencana){
      $this->db->where('username', $username);
      $this->db->delete('pekerjaan');
      $data = array (
                'username' => $username,
                'jenis' => $kegiatan,
                'status' => $status_pekerjaan,
                'tempat_kerja' => $tempat_kerja,
                'bidang' => $bidang,
                'jabatan' => $jabatan,
                'deskripsi_kerja' => $deskripsi_pekerjaan,
                'rencana' => $rencana,
              );
  
      if($this->db->insert('pekerjaan',$data)){
        $data = array(
          'step' => 4
          );
        $this->db->where('username', $username);
        $this->db->update('orang',$data);
        return TRUE;
      } else {
  
      }
  
    }

    public function putusaha($username, $nama_usaha, $bidang, $alamat_usaha, $deskripsi_usaha ){
      $this->db->where('username', $username);
      $this->db->delete('usaha');

      $data = array (
                'username' => $username,
                'nama_usaha' => $nama_usaha,
                'bidang_usaha' => $bidang,
                'alamat_usaha' => $alamat_usaha,
                'deskripsi_usaha' => $deskripsi_usaha
              );
  
      if($this->db->insert('usaha',$data)){
        $data = array(
          'step' => 5
          );
        $this->db->where('username', $username);
        $this->db->update('orang',$data);
        return TRUE;
      } else {
  
      }
  
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
	    WHERE username = '".$username."'
	    ";
	    return $this->db->query($SQL1)->row();
    }

    public function mundur($username){
      $q="UPDATE orang set step=step-1 WHERE username='".$username."';";
      $this->db->query($q);
    }

    public function update_step($username, $step){
      $this->db->where('username', $username);
      $data= array('step' => $step);
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
//}