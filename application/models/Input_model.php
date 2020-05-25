<?php
class Input_model extends CI_Model {
	public function __construct(){
		$this->load->database();
        $this->load->helper('date');
    }

   public function put_sharing($nama,$username,$judul,$jenis_sharing,$deskripsi_sharing, $kodesharing, $tgl_unggah, $namagambar){
      $data=array(
        'nama'=> $nama,
        'username'=>$username,
        'judul'=>$judul,
        'jenis_sharing'=>$jenis_sharing,
        'deskripsi_sharing'=>$deskripsi_sharing,
        'kodesharing'=>$kodesharing,
        'tgl_unggah'=>$tgl_unggah,
        'gambar'=>$namagambar,
      );
      $this->db->insert('sharing',$data);
    }

    public function delete_sharing($kodesharing){
      $this->db->where('kodesharing', $kodesharing);
      $this->db->delete('sharing');
    }

	public function update_profilbase($email, $username, $tgl_lahir){
    $data = array(
            'email' => $email,
            'tgl_lahir'=>$tgl_lahir,
            );
    $this->db->where('username',$username);
    $this->db->update('orang',$data);
    return TRUE;
 
  }

  public function update_profil($username, $nomorhp,$nomorwa,$linkedin,$facebook,$ig,$twitter,$prov,$kabkot,$alamat_lengkap,$prov_dom,$kabkot_dom,$alamat_lengkap_dom,$lanjut_belajar,$kegiatan){
    $data = array (
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
      $this->db->where('username', $username);
       $this->db->update('profil',$data);
    return true;
  }
  
  public function update_pendidkan($username, $pendidikan, $tahun_masuk, $tahun_keluar, $instansi, $jurusan, $pascasarjana, $instansi_lanjut, $jurusan_lanjut, $beasiswa){
    $data = array (
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


      $this->db->where('username', $username);
      $this->db->update('pendidikan',$data);
    return true;


  }

  public function update_pekerjaan($username, $kegiatan, $status_pekerjaan, $tempat_kerja,$bidang, $jabatan, $deskripsi_pekerjaan, $rencana){
    $data = array (
              'jenis' => $kegiatan,
              'status' => $status_pekerjaan,
              'tempat_kerja' => $tempat_kerja,
              'bidang' => $bidang,
              'jabatan' => $jabatan,
              'deskripsi_kerja' => $deskripsi_pekerjaan,
              'rencana' => $rencana,
            );

      $this->db->where('username', $username);
      $this->db->update('pekerjaan',$data);
    return true;
  }

  public function update_usaha($username, $nama_usaha, $bidang, $alamat_usaha, $deskripsi_usaha ){
    $data = array (
              'nama_usaha' => $nama_usaha,
              'bidang_usaha' => $bidang,
              'alamat_usaha' => $alamat_usaha,
              'deskripsi_usaha' => $deskripsi_usaha
            );


      $this->db->where('username', $username);
       $this->db->update('usaha',$data);
    return true;


  }

  public function get_profil($username){
    $SQL1 ="
    SELECT username, lanjut_belajar, kegiatan
    FROM profil
    WHERE username = '".$username."'
    ";
    return $this->db->query($SQL1)->row();
  }
	
}