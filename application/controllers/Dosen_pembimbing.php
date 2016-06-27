if(($this->session->userdata('as') == 'Dosen')||($this->session->userdata('as') == 'KoorSkripsi')||($this->session->userdata('as') == 'Kaprodi')){
                $this->load->view('Dosen_Pembimbing_Home');
            } else {
                $this->load->view('Not_Found');
            } <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_pembimbing extends CI_Controller {
	function __construct(){
        parent::__construct();
        
    }

	public function index(){
		 
		
	}
	
}
