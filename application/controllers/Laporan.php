<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
        
        private $allDosen;
        private $allMembimbing;
    
        function __construct(){
            parent::__construct();
            $this->load->model('Dosen');
            $this->load->model('Membimbing');
            $this->load->library('table');
        }
        
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
        
        public function index(){
        
            $this->allDosen = $this->Dosen->getAllDosen();
            $this->allMembimbing = $this->Membimbing->getAllMembimbing();
            
            $data      = array(
                            'allDosen' => $this->allDosen,
                            'allMembimbing' => $this->allMembimbing,
                            'laporanTanggungan' => $this->generateLaporan($this->allDosen, $this->allMembimbing)
                           );
//            $data['Dosen'] = $this->Dosen->getAllDosen();
            
            $this->load->view('head');
            $this->load->view('laporan/laporan', $data);
            $this->load->view('foot');
            
	}
        
        function generateLaporan($allDosen, $allMembimbing){
            $allTanggunganDosen = array();
            
            foreach($allDosen as $dosen){
                $tanggunganDosen = array();
                $count = 0;
                $tanggunganDosen[] = $dosen['NIK'];
                $tanggunganDosen[] = $dosen['Nama'];
                $tanggunganDosen[] = $dosen['IDKBK'];
                        
                foreach($allMembimbing as $membimbing){
                    if($dosen['NIK'] == $membimbing['NIK']){
                        $count = $count+1;
                    }
                }

                $tanggunganDosen[] = $count;
                $allTanggunganDosen[] = $tanggunganDosen;
            }
            // return array
            return $allTanggunganDosen;
        }
        
        
}
