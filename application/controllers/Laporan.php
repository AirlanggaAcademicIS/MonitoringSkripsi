<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
        
        private $allDosen;
        private $allMembimbing;
        private $allMahasiswa;
        private $dosen;
        
        function __construct(){
            parent::__construct();
            $this->load->model('Dosen');
            $this->load->model('Mahasiswa');
            $this->load->model('Bimbingan');
            $this->load->model('Skripsi');
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
            
            $this->load->view('head');
            $this->load->view('laporan/laporan', $data);
            $this->load->view('foot');
            
	}
        
        public function minatkbk()
	{
		$this->load->view('laporan_minatkbk_page');
	}
	public function jenis_kbk()
	{
		$option = $this->input->post('jenis_laporan');
		
		if($option==0)$this->load->view('laporan_minatkbk_page');
		else if($option==1)$this->load->view('laporan_tanggungandosen_page');
		else if($option==2)$this->load->view('laporan_statusmhs_page');
		
	}
        
        function generateLaporan($allDosen, $allMembimbing){
            $allTanggunganDosen = array();
            
            foreach($allDosen as $dosen){
                $tanggunganDosen = array();
                $count = 0;
                $tanggunganDosen[] = $dosen['NIK'];
                $tanggunganDosen[] = '<a href = " '. base_url() .'laporan/detail_dosen/'.$dosen['NIK'].'"'.'<font color="blue">'.$dosen['Nama'].'</font>'.'</a>';
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
        
        // sub page of viewing detail dosen
        function detail_dosen($NIK){
            $this->allMahasiswa = $this->Mahasiswa->getAllMahasiswa();
            $this->allMembimbing = $this->Membimbing->getAllMembimbing();
            $this->allSkripsi = $this->Skripsi->getAllSkripsi();
            $this->dosen = $this->Dosen->getDosen($NIK);
            $data = array(
                'detailDosen' => $this->generateDetail($this->dosen, $this->allMembimbing, $this->allSkripsi),
                'allMahasiswa' => $this->allMahasiswa
            );
            
            $this->load->view('head');
            $this->load->view('laporan/detail_dosen', $data);
            $this->load->view('foot');
            
        }
        
        function generateDetail($dosen, $allMembimbing, $allSkripsi){
            $mhsBimbing = array();
            foreach($allMembimbing as $membimbing){
                if($dosen->NIK == $membimbing['NIK']){
                    $skripsi = $this->Skripsi->getSkripsi($membimbing['id_skripsi']);
//                    $kbk = $this->KBK->getKBK($skripsi->id_kbk);
                    $mahasiswa = $this->Mahasiswa->getMahasiswa($skripsi->nim);
                    echo "<br>NIM",$mahasiswa->NIM;
                    
                    $mhsTemp = array();
                    $mhsTemp[] = $mahasiswa->NIM;
                    $mhsTemp[] = $mahasiswa->Nama;
                    $mhsTemp[] = $skripsi->id_kbk;
                    $mhsTemp[] = $skripsi->judul;
//                    $mhsTemp[] = $kbk['namaKBK'];
                    
                    $mhsBimbing[] = $mhsTemp;
                }
            }
            
            return $mhsBimbing;
        }
        
        
}
