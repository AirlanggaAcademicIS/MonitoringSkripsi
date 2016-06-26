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
		$this->load->view('Mahasiswa_Home',$data);
	}
	
}
