<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	function __construct(){
        parent::__construct();
//        if ($this->session->userdata('username') == '') {
//        	redirect('login');
//      	}
    }

	public function index(){
		$this->load->model('Skripsi');
		$data['mhs'] = $this->Skripsi->getSkripsiMhs($this->session->userdata('nim'));
	 if($this->session->userdata('as') == 'Mahasiswa'){
                $this->load->view('Mahasiswa_Home',$data);
            } else {
                $this->load->view('Not_Found');
            }   
		
	}
	
}
