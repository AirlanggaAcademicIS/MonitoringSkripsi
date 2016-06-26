<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_pembimbing extends CI_Controller {
	function __construct(){
        parent::__construct();
        
    }

	public function index(){
		$this->load->view('Dosen_Pembimbing_Home');
	}
	
}
