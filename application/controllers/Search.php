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
        $searchori=$this->input->get('search', TRUE);
        if($searchori!=NULL){$this->session->set_userdata('searchkey', $searchori);} elseif($this->session->userdata('searchkey')==NULL){
            $this->session->set_flashdata('report', 'Kata Pencarian tidak ada.');
            redirect('akun');
        }
            $searchquery1=str_replace(" ","|",$this->session->userdata('searchkey'));
            $searchquery=str_replace("'","''",$searchquery1);
            $res=$this->orang_model->carifull($searchquery);
            print($searchquery);
            $config['base_url'] = site_url('search/index'); //site url
            $config['total_rows'] = $res->num_rows(); //total row
            $config['per_page'] = 5;  //show record per halaman
            $config["uri_segment"] = 3;  // uri parameter
            $config["num_links"] = 0;
            $config['first_link']       = 'First ';
            $config['last_link']        = ' Last';
            $config['next_link']        = ' Next ';
            $config['prev_link']        = ' Prev ';

            $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-start">';
            $config['full_tag_close']   = '</ul></nav></div>';
            $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close']    = '</span></li>';
            $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
            $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
            $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close']  = '</span>Next</li>';
            $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close']  = '</span></li>';

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
    
    public function lihatprofil($username){
        $this->load->view('akunhead');
        $data['person']=$this->orang_model->get_full($username);
        $data['username']=$username;
        $this->load->view('lihatprofil',$data);
		$this->load->view('akunfooter');
        }

	
}
