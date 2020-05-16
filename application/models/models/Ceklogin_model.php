<?php
class Ceklogin_model extends CI_Model {
  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  private function session_complete() { //cek apakah session userdata telah di set

    if (
      $this->session->has_userdata('nim')
      && $this->session->has_userdata('nama')
      && $this->session->has_userdata('logged_in')
    ) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  private function valid() { //cek validitas session userdata dengan database
    $this->db->where('nim',$this->session->userdata('nim'));
    $this->db->where('nama',$this->session->userdata('nama'));    
    $query = $this->db->get('mahasiswa'); //mengambil dari database
    if (count($query->result_array())==1) return TRUE; //jika jumlah user yang sama hanya 1, maka valid
    return FALSE; //jika jumlah user yang sama tidak hanya 1, maka tidak valid
  }

  public function ceksesi() { //cek session user login setelah login
    //cek apakah session lengkap
    if ($this->session_complete()) { //jika session lengkap
      //cek apakah status login TRUE
      if ($this->session->userdata('logged_in')) { //jika status login TRUE
        //lakukan validasi data session user dengan database, jika data yang didapat jumlah nya 1 berarti benar
        if (!$this->valid()) { //jika validasi tidak benar
          redirect('login'); //redirect ke controller login
        }
      } else { //jika status login FALSE
        redirect('login'); //redirect ke controller login
      }
    } else { //jika session tidak lengkap
      redirect('login'); //redirect ke controller login
    }
  }

  public function proccesspre() { //cek session user login saat akses halaman login
    //cek apakah session lengkap
    if ($this->session_complete()) { //jika session lengkap
      //cek apakah status login TRUE
      if ($this->session->userdata('logged_in')) { //jika status login TRUE
        //lakukan validasi data session user dengan database, jika data yang didapat jumlah nya 1 berarti benar
        if ($this->valid()) { //jika validasi benar
          redirect(''); //redirect ke controller beranda
        }
      }
    }
  }
}
