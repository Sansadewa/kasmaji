<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	function __construct(){
		parent ::__construct();
		$this->ceklogin->ceksesi();
        $this->load->model('orang_model');
        $this->load->library('pagination');
	}

	public function index()	{
        //Belum diamankan
        $searchori=$this->input->get('search');
        if($searchori!=NULL){$this->session->set_userdata('searchkey', $searchori);} elseif($this->session->userdata('searchkey')==NULL){
            $this->session->set_flashdata('report', 'Kata Pencarian tidak ada.');
            redirect('akun');
        }
            $searchquery=str_replace(" ","|",$this->session->userdata('searchkey'));
            $res=$this->orang_model->carifull($searchquery);
            print($searchquery);
            $config['base_url'] = site_url('search/index'); //site url
            $config['total_rows'] = $res->num_rows(); //total row
            $config['per_page'] = 5;  //show record per halaman
            $config["uri_segment"] = 3;  // uri parameter
            $config["num_links"] = 1;
            $config['first_link']       = 'First ';
            $config['last_link']        = ' Last';
            $config['next_link']        = ' Next ';
            $config['prev_link']        = ' Prev ';
            $config['num_tag_open'] = ' ';
            $config['num_tag_close'] = ' ';

            $this->pagination->initialize($config);

            //ambil dia page ke berapa
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
            $data['data'] = $this->orang_model->cari($searchquery,$data['page'],$config["per_page"]);       
    
            $data['pagination'] = $this->pagination->create_links();
    
            //load view mahasiswa view
            $this->load->view('akunhead');
            $this->load->view('cari',$data);
            $this->load->view('akunfooter');
        

	}

	
}
