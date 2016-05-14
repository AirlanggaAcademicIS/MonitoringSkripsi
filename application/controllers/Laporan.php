<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
        
        private $allDosen;
        private $allBimbingan;
        private $allMahasiswa;
        private $dosen;
        
        function __construct(){
            parent::__construct();
            $this->load->model('Dosen');
            $this->load->model('Mahasiswa');
            $this->load->model('Membimbing');
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
            $this->allBimbingan = $this->Bimbingan->getAllbimbingan();
            
            $data      = array(
                            'allDosen' => $this->allDosen,
                            'allBimbingan' => $this->allBimbingan,
                            'laporanTanggungan' => $this->generateLaporan($this->allDosen, $this->allBimbingan)
                           );
            
            
            $this->load->view('laporan/Laporan_Home', $data);
           
            
	}
        
        public function minatkbk()
	{
		$this->load->view('laporan/Laporan_Minatkbk');
	}
	
	public function minatkbktabel()
	{
		$this->load->view('laporan/Laporan_Minatkbk_Tabel');
	}
	
	public function jenis_kbk()
	{
		$option = $this->input->post('jenis_laporan');
		
		if($option==0)$this->load->view('laporan_minatkbk_page');
		else if($option==1)$this->load->view('laporan_tanggungandosen_page');
		else if($option==2)$this->load->view('laporan_statusmhs_page');
		
	}
        
        function generateLaporan($allDosen, $allBimbingan){
            $allTanggunganDosen = array();
            
            foreach($allDosen as $dosen){
                $tanggunganDosen = array();
                $count = 0;
                $tanggunganDosen[] = $dosen['NIK'];
                $tanggunganDosen[] = '<a href = " '. base_url() .'laporan/detail_dosen/'.$dosen['NIK'].'"'.'<font color="blue">'.$dosen['Nama'].'</font>'.'</a>';
                $tanggunganDosen[] = $dosen['IDKBK'];
                        
                foreach($allBimbingan as $bimbingan){
                    if($dosen['NIK'] == $bimbingan['NIK']){
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
            $this->allBimbingan = $this->Bimbingan->getAllBimbingan();
            $this->allSkripsi = $this->Skripsi->getAllSkripsi();
            $this->dosen = $this->Dosen->getDosen($NIK);
            $data = array(
                'detailDosen' => $this->generateDetail($this->dosen, $this->allBimbingan, $this->allSkripsi),
                'allMahasiswa' => $this->allMahasiswa
            );
            
            $this->load->view('head');
            $this->load->view('laporan/detail_dosen', $data);
            $this->load->view('foot');
            
        }
        
        function generateDetail($dosen, $allBimbingan, $allSkripsi){
            $mhsBimbing = array();
            foreach($allBimbingan as $bimbingan){
                if($dosen->NIK == $bimbingan['NIK']){
                    $skripsi = $this->Skripsi->getSkripsi($bimbingan['id_skripsi']);
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
