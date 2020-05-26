<?php

class Ceklogin_model extends CI_Model {

  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  private function session_complete() { //cek apakah session userdata telah di set
    
    if (
      $this->session->has_userdata('username')
      && $this->session->has_userdata('nama')
      && $this->session->has_userdata('kelas')
      && $this->session->has_userdata('session_token')
    ) {
      return TRUE;
    } else {
      return FALSE;
    }
  }



  private function valid() { //cek validitas session userdata dengan database
    $this->db->where('username',$this->session->userdata('username'));
    $this->db->where('nama',$this->session->userdata('nama'));    
    $this->db->where('session_token',$this->session->userdata('session_token'));    
    $query = $this->db->get('orang'); //mengambil dari database
    if (count($query->result_array())==1) return array(TRUE, $query->result_array()); //jika jumlah user yang sama hanya 1, maka valid

    return array(FALSE); //jika jumlah user yang sama tidak hanya 1, maka tidak valid

  }



  public function ceksesi() { //cek session user login setelah login

    
    //cek apakah session lengkap
    if ($this->session_complete()) { //jika session lengkap
      //lakukan validasi data session user dengan database, jika data yang didapat jumlah nya 1 berarti benar
      
      $valid=$this->valid();
      if (!$valid[0]) { //jika validasi tidak benar
        $this->session->set_flashdata('informasi', 'Validation error');
        redirect('login'); //redirect ke controller login
      }

      if($valid[1][0]['step']<6){
        redirect('register');
      } 
    } else { //jika session tidak lengkap
      $this->session->set_flashdata('informasi', 'Broken Session, mohon login kembali');
      redirect('login'); //redirect ke controller login
    }
  }

  public function ceksesiregister() { //cek session user login setelah login

    
    //cek apakah session lengkap
    if ($this->session_complete()) { //jika session lengkap
      //lakukan validasi data session user dengan database, jika data yang didapat jumlah nya 1 berarti benar
      
      $valid=$this->valid();
      if (!$valid[0]) { //jika validasi tidak benar
        $this->session->set_flashdata('informasi', 'Validation error');
        redirect('login'); //redirect ke controller login
      }
    } else { //jika session tidak lengkap
      $this->session->set_flashdata('informasi', 'Broken Session, mohon login kembali');
      redirect('login'); //redirect ke controller login
    }
  }

}

