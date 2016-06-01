<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_pembimbing extends CI_Controller {
	function __construct(){
        parent::__construct();
        if ($this->session->userdata('username') == '') {
        	redirect('login');
      	}
    }

	public function index(){
        $this->load->model('Dosen');
		$data['mhs'] = $this->Dosen->getDosen($this->session->userdata('nik'));
		$this->load->view('Dosen_Pembimbing_Home',$data);
	}
	
}
