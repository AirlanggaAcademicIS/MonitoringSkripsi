<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
        
        private $allDosen;
        private $allSkripsi;
        private $allMembimbing;
        private $allMahasiswa;
        private $laporanTanggungan;
        private $laporanStatus;
        private $grafikTanggungan;
        private $grafikStatus;
        private $dosen;
        
        private $tahun;
        private $jeniskbk;
        
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
            $this->load->view('laporan/Laporan_Home');
	}
        
        /**
         * TANGGUNGAN DOSEN
         */
        
        public function tanggungandosen(){
            $this->load->view('laporan/Laporan_Tanggungan_Dosen');
        }
        
        public function tanggungandosentabel(){
            $this->jeniskbk = 0;
            $this->tahun = $this->input->post('tahun');
            
            $this->allDosen = $this->Dosen->getAllDosen();
            $this->allSkripsi = $this->Skripsi->getAllSkripsi();
            $this->allMembimbing = $this->Bimbingan->getAllBimbingan();
            $this->laporanTanggungan = $this->generateLaporan($this->allDosen, $this->allSkripsi, $this->jeniskbk, $this->tahun);
            
            $data      = array(
                            'laporanTanggungan' => $this->laporanTanggungan
                            );
            
            $this->load->view('laporan/Laporan_Tanggungan_Dosen_Tabel', $data);
        }
        
        public function tanggungandosengrafik(){
            $jeniskbk = 0;
            $tahun = $this->tahun;
            
            $this->allDosen = $this->Dosen->getAllDosen();
            $this->allSkripsi = $this->Skripsi->getAllSkripsi();
            $this->allMembimbing = $this->Bimbingan->getAllBimbingan();
            $this->laporanTanggungan = $this->generateLaporanTanggungan($this->allDosen, $this->allSkripsi, $jeniskbk, $tahun);
            $this->grafikTanggungan = $this->generateGrafikTanggungan($this->laporanTanggungan);
            
            $data   = array(
                    'laporanGrafik' => $this->grafikTanggungan
                    );
            
            $this->load->view('laporan/Laporan_Tanggungan_Dosen_grafik', $data);
        }
        
        /**
         * STATUS MAHASISWA
         */
        
        public function statusmahasiswa(){
            $this->load->view('laporan/Laporan_Status_Mahasiswa');
        }
        
        public function statusmahasiswatabel(){
            $mahasiswas = $this->Mahasiswa->getAllMahasiswa();
            $skripsis = $this->Skripsi->getAllSkripsi();
            $this->laporanStatus = $this->generateLaporanStatus($mahasiswas, $skripsis);
            
            $data   = array(
                    'laporanStatus' => $this->laporanStatus
                    );
            
            $this->load->view('laporan/Laporan_Status_Mahasiswa_Tabel', $data);
        }
        
        public function statusmahasiswagrafik(){
            $mahasiswas = $this->Mahasiswa->getAllMahasiswa();
            $skripsis = $this->Skripsi->getAllSkripsi();
            $this->laporanStatus = $this->generateLaporanStatus($mahasiswas, $skripsis);
            $this->grafikStatus = $this->generateGrafikStatus($this->laporanStatus);
            
            $data      = array(
                            'laporanGrafik' => $this->grafikStatus
                            );
            
            $this->load->view('laporan/Laporan_Status_Mahasiswa_grafik', $data);
        }
        
        /**
         * MINAT KBK
         */
        
        public function minatkbk(){
		$this->load->view('laporan/Laporan_Minatkbk');
	}
	
	public function minatkbktabel(){
		$jeniskbk = $this->input->post('jeniskbk');
		$tahun = $this->input->post('tahun');
		$this->load->model('skripsi');
		
		if($jeniskbk==0 && $tahun==0){
		$allkbkalltahun = $this->skripsi->getallkbkalltahun();
		$data = array(
			'jumlah'=>sizeof($allkbkalltahun),
			'isitabel'=> $allkbkalltahun
			);
			}
			else if($jeniskbk!=0 && $tahun==0){
				if($jeniskbk==1){$kbkalltahun = $this->skripsi->getkbkalltahun("'Data Mining'");}
				else if($jeniskbk==2){$kbkalltahun = $this->skripsi->getkbkalltahun("'Sistem Pendukung Keputusan'");}
				else if($jeniskbk==3){$kbkalltahun = $this->skripsi->getkbkalltahun("'Rekayasa Sistem Informasi'");}
		
		$data = array(
			'jumlah'=>sizeof($kbkalltahun),
			'isitabel'=> $kbkalltahun
			);
			}
			else if($jeniskbk==0 && $tahun!=0){
				$allkbktahun = $this->skripsi->getallkbktahun($tahun);
		$data = array(
			'jumlah'=>sizeof($allkbktahun),
			'isitabel'=> $allkbktahun
			);
			}
			else if($jeniskbk!=0 && $tahun!=0){
				if($jeniskbk==1){$kbktahun = $this->skripsi->getkbktahun("'Data Mining'", $tahun );}
				else if($jeniskbk==2){$kbktahun = $this->skripsi->getkbktahun("'Sistem Pendukung Keputusan'", $tahun);}
				else if($jeniskbk==3){$kbktahun = $this->skripsi->getkbktahun("'Rekayasa Sistem Informasi'", $tahun);}
		
		$data = array(
			'jumlah'=>sizeof($kbktahun),
			'isitabel'=> $kbktahun
			);
			}
			
			
		$this->load->view('laporan/Laporan_Minatkbk_Tabel',$data);
	}
        
        public function minatkbkgrafik(){
            $mahasiswas = $this->Mahasiswa->getAllMahasiswa();
            $skripsis = $this->Skripsi->getAllSkripsi();
            $this->laporanStatus = $this->generateLaporanStatus($mahasiswas, $skripsis);
            $this->grafikStatus = $this->generateGrafikStatus($this->laporanStatus);
            
            $data      = array(
                            'laporanGrafik' => $this->grafikStatus
                            );
            
            $this->load->view('laporan/Laporan_Minatkbk_grafik', $data);
        }
	
	public function jenis_kbk(){
		$option = $this->input->post('jenis_laporan');
		
		if($option==0)$this->load->view('laporan_minatkbk_page');
		else if($option==1)$this->load->view('laporan_tanggungandosen_page');
		else if($option==2)$this->load->view('laporan_statusmhs_page');
		
	}
        
        function generateLaporanStatus($allMahasiswa, $allSkripsi){
            $allStatus = array();
            
            foreach($allMahasiswa as $mhs){
                    $statusMhs = array();
                    $count1 = 0;
                    $count2 = 0;

                    $statusMhs['NIM'] = $mhs['NIM']; // 1. NIK
                    // 2. Nama , a href url folder views
                    $statusMhs['Nama'] = '<a href = " '. base_url() .'laporan/detail_dosen/'.$mhs['NIM'].'"'.'<font color="blue">'.$mhs['Nama'].'</font>'.'</a>';
                    
                    foreach($allSkripsi as $skripsi){
                        if($mhs['NIM'] == $skripsi['NIM']){
                            if($skripsi['TanggalTopik'] == '0000-00-00'){
                                $statusMhs['Status'] = '-';
                            } else if($skripsi['TanggalProp'] == '0000-00-00'){
                                $statusMhs['Status'] = 'Topik';
                            } else if($skripsi['TanggalSkripsi'] == '0000-00-00'){
                                $statusMhs['Status'] = 'Proposal';
                            } else {
                                $statusMhs['Status'] = 'Skripsi';
                            }
                        }
                    }
                    $allStatus[] = $statusMhs;
                }
            // return array
            return $allStatus;
        }
        
        function generateGrafikStatus($laporan){
            $count = 0;
            $count1 = 0;
            $count2 = 0;
            $count3 = 0;
            
            foreach($laporan as $row){
                if($row['Status'] == '-'){
                    $count = $count + 1;
                } else if($row['Status'] == 'Topik'){
                    $count1 = $count1 + 1;
                } else if($row['Status'] == 'Proposal'){
                    $count2 = $count2 + 1;
                } else if($row['Status'] == 'Skripsi'){
                    $count3 = $count3 + 1;
                }
            }
            
            $allStatusMhs = array(
                array("Status"=>'-',"count" =>$count),
                array("Status"=>'Topik',"count" =>$count1),
                array("Status"=>'Proposal',"count" =>$count2),
                array("Status"=>'Skripsi',"count" =>$count3),
                );
            
            // return array
            return $allStatusMhs;
        }
        
        function generateLaporanTanggungan($allDosen, $allSkripsi, $jeniskbk, $tahun){
            $allTanggunganDosen = array();
            
            foreach($allDosen as $dosen){
                    $tanggunganDosen = array();
                    $count1 = 0;
                    $count2 = 0;

                    $tanggunganDosen['NIK'] = $dosen['NIK']; // 1. NIK
                    // 2. Nama , a href url folder views
                    $tanggunganDosen['Nama'] = '<a href = " '. base_url() .'laporan/detail_dosen/'.$dosen['NIK'].'"'.'<font color="blue">'.$dosen['Nama'].'</font>'.'</a>';
                    $tanggunganDosen['KBK'] = $dosen['KBK']; // 3. KBK

                    foreach($allSkripsi as $skripsi){
                        if($dosen['NIK'] == $skripsi['NIK1']){
                            $count1 = $count1+1;
                            $tanggunganDosen['tahun'] = $skripsi['TahunAjar'];
                        }
                        if($dosen['NIK'] == $skripsi['NIK2']){
                            $count2 = $count2+1;
                            $tanggunganDosen['tahun'] = $skripsi['TahunAjar'];
                        }
                    }

                    $tanggunganDosen['count1'] = $count1; // 4. Count1
                    $tanggunganDosen['count2'] = $count2; // 5. Count2
                    $tanggunganDosen['allCount'] = $count1+$count2; // 6. Count Total
                    
                    switch($jeniskbk){
                        case 0:
                            if($tahun == 0){
                                $allTanggunganDosen[] = $tanggunganDosen;                            
                            } else {
                                if($tanggunganDosen['tahun'] == $tahun){
                                    $allTanggunganDosen[] = $tanggunganDosen;                            
                                }
                            }
                            break;
                        case 1:
                            if($tahun == 0){
                                if($dosen['KBK']== 'Data Mining'){
                                    $allTanggunganDosen[] = $tanggunganDosen;
                                }
                            } else {
                                if(($dosen['KBK']== 'Data Mining')&& $tanggunganDosen['tahun'] == $tahun){
                                    $allTanggunganDosen[] = $tanggunganDosen;
                                }
                            }
                            break;
                        case 2:
                            if($tahun == 0){
                                if($dosen['KBK']== 'SPK'){
                                    $allTanggunganDosen[] = $tanggunganDosen;
                                }
                            } else {
                                if(($dosen['KBK']== 'SPK')&& $tanggunganDosen['tahun'] == $tahun){
                                    $allTanggunganDosen[] = $tanggunganDosen;
                                }
                            }
                            break;
                        case 3:
                            if($tahun == 0){
                                if($dosen['KBK']== 'RSI'){
                                    $allTanggunganDosen[] = $tanggunganDosen;
                                }
                            } else {
                                if(($dosen['KBK']== 'RSI')&& $tanggunganDosen['tahun'] == $tahun){
                                    $allTanggunganDosen[] = $tanggunganDosen;
                                }
                            }break;
                    }
                }
            // return array
            return $allTanggunganDosen;
        }

        function generateGrafikTanggungan($laporanTD){
            $allTanggunganDosen = array();
            
            foreach($laporanTD as $row){
                $tanggunganDosen = array();
                
                // 2. Nama , a href url folder views
                $tanggunganDosen['Nama'] = $row['Nama'];
                $tanggunganDosen['count1'] = $row['count1']; // 4. Count1
                $tanggunganDosen['count2'] = $row['count2']; // 5. Count2
                $tanggunganDosen['allCount'] = $row['count1'] + $row['count2']; // 6. Count Total
                $allTanggunganDosen[] = $tanggunganDosen;
            }
            // return array
            return $allTanggunganDosen;
        }

        // sub page of viewing detail dosen
        function detail_dosen($NIK){
            $this->allMahasiswa = $this->Mahasiswa->getAllMahasiswa();
            $this->allMembimbing = $this->Bimbingan->getAllBimbingan();
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
                    $mahasiswa = $this->Mahasiswa->getMahasiswa($skripsi->NIM);
                    if(isset($mahasiswa)){
                        echo "<br>NIM".$mahasiswa->NIM;
                    
                        $mhsTemp = array();
                        $mhsTemp[] = $mahasiswa->NIM;
                        $mhsTemp[] = $mahasiswa->Nama;
                        $mhsTemp[] = $skripsi->KBK;
                        $mhsTemp[] = $skripsi->Judul;
    //                    $mhsTemp[] = $kbk['namaKBK'];

                        $mhsBimbing[] = $mhsTemp;
                    } else {
                        echo "Mahasiswa kosong";
                    }
                    
                }
            }
            
            return $mhsBimbing;
        }
        
}
