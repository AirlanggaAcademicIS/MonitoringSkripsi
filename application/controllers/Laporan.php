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
        private $pembimbing;
        
        private $tahun;
        private $jeniskbk;
        
        private $formValues = array();
        
        function __construct(){
            parent::__construct();
            $this->laporanTanggungan = array();
            
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
            $this->pembimbing = $this->input->post('pembimbing');
            $this->tahun = $this->input->post('tahun');
            
            $this->allDosen = $this->Dosen->getAllDosen();
            $this->allSkripsi = $this->Skripsi->getAllSkripsi();
            $this->allMembimbing = $this->Bimbingan->getAllBimbingan();
            $laporanTanggungan = $this->generateLaporanTanggungan($this->allDosen, $this->allSkripsi, $this->pembimbing, $this->tahun);
            $this->setPembimbing($this->pembimbing);
            
            $data      = array(
                            'laporanTanggungan' => $laporanTanggungan
                            );
            
            $this->load->view('laporan/Laporan_Tanggungan_Dosen_Tabel', $data);
        }
        
        function setPembimbing($pembimbing){
            $this->pembimbing = $pembimbing;
//            echo 'Pembimbing = '.$pembimbing;
        }
        public function tanggungandosengrafik(){
//            $this->pembimbing = $this->input->post('pembimbing');
//            $this->tahun = $this->input->post('tahun');
//            
//            $this->allDosen = $this->Dosen->getAllDosen();
//            $this->allSkripsi = $this->Skripsi->getAllSkripsi();
//            $this->allMembimbing = $this->Bimbingan->getAllBimbingan();
//            $this->laporanTanggungan = $this->generateLaporanTanggungan($this->allDosen, $this->allSkripsi, $this->pembimbing, $this->tahun);
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
            $this->tahun = $this->input->post('tahun');
            
            $mahasiswas = $this->Mahasiswa->getAllMahasiswa();
            $skripsis = $this->Skripsi->getAllSkripsi();
            $this->laporanStatus = $this->generateLaporanStatus($mahasiswas, $skripsis, $this->tahun);
            $dashboardStatus = $this->generateDashboardStatus($skripsis, $this->tahun);
            
            $data   = array(
                    'laporanStatus' => $this->laporanStatus,
                    'dashboardStatus' => $dashboardStatus
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
        
        function generateDashboardStatus($allSkripsi, $tahun){
            $allStatus = array();
            $count1=0; // Lulus
            $count1x = 0; // Revisi Skripsi
            $count2=0; // Skripsi
            $count2x = 0; // Revisi Proposal
            $count3=0; // Proposal
            $count4=0; // Belum usulan Topik
            
            foreach($allSkripsi as $skripsi){
                if($skripsi['TanggalSkripsi'] != '0000-00-00'){
                    if($tahun!=0){
                        if($tahun == $skripsi['TahunAjar']){
                            $today = date("Y-m-d");
                            $tanggal = $skripsi['TanggalSkripsi']; // tanggalSubmit
                            $tanggalRevisi = strtotime ( '+21 day' , strtotime ( $tanggal ) ) ; // $tanggalRevisi
                            $tanggalRevisi = date ( 'Y-m-d' , $tanggalRevisi );
//                            echo $tanggalRevisi.'<br>';
                            if(( $today >= $tanggal ) && ( $today <= $tanggalRevisi)){
                                $count1x++;
                            } else {
                                $count1++;
                            }
                        }
                    } else {
                        $today = date("Y-m-d");
                        $tanggal = $skripsi['TanggalSkripsi']; // tanggalSubmit
                        $tanggalRevisi = strtotime ( '+21 day' , strtotime ( $tanggal ) ) ; // $tanggalRevisi
                        $tanggalRevisi = date ( 'Y-m-d' , $tanggalRevisi );
//                        echo $tanggalRevisi.'<br>';
                        if(( $today >= $tanggal ) && ( $today <= $tanggalRevisi)){
                            $count1x++;
                        } else {
                        $count1++;                            
                        }
                    }
                } else if($skripsi['TanggalProp'] != '0000-00-00'){
                    if($tahun!=0){
                        if($tahun == $skripsi['TahunAjar']){
                            $today = date("Y-m-d");
                            $tanggal = $skripsi['TanggalProp']; // tanggalSubmit
                            $tanggalRevisi = strtotime ( '+21 day' , strtotime ( $tanggal ) ) ; // $tanggalRevisi
                            $tanggalRevisi = date ( 'Y-m-d' , $tanggalRevisi );
//                            echo $tanggalRevisi.'<br>';
                            if(( $today >= $tanggal ) && ( $today <= $tanggalRevisi)){
                                $count2x++;
                            } else {
                                $count2++;
                            }
                        }
                    } else {
                        $today = date("Y-m-d");
                        $tanggal = $skripsi['TanggalProp']; // tanggalSubmit
                        $tanggalRevisi = strtotime ( '+21 day' , strtotime ( $tanggal ) ) ; // $tanggalRevisi
                        $tanggalRevisi = date ( 'Y-m-d' , $tanggalRevisi );
//                        echo $tanggalRevisi.'<br>';
                        if(( $today >= $tanggal ) && ( $today <= $tanggalRevisi)){
                            $count2x++;
                        } else {
                        $count2++;                            
                        }
                    }
                } else if($skripsi['TanggalTopik'] != '0000-00-00'){
                    if($tahun!=0){
                        if($tahun == $skripsi['TahunAjar']){
                            $count3++;
                        }
                    } else {
                        $count3++;
                    }
                } else {
                    if($tahun!=0){
                        if($tahun == $skripsi['TahunAjar']){
                            $count4++;
                        }
                    } else {
                        $count4++;
                    }
                }
            }
            
            $statusMhs['Status']='Lulus';
            $statusMhs['Count']=$count1;
            $allStatus[] = $statusMhs;            
            
            // Masa berakhir Skripsi (Revisi)
            $statusMhs['Status']='Revisi Skripsi';
            $statusMhs['Count']= $count1x;
            // if getDateNow?
            $allStatus[] = $statusMhs;
            
            //Skripsi
            $statusMhs['Status']='Skripsi';
            $statusMhs['Count']=$count2;
            $allStatus[] = $statusMhs;
            
            // Masa berakhir Proposal (Revisi)
            $statusMhs['Status']='Revisi Proposal';
            $statusMhs['Count']=$count2x;
            // if getDateNow?
            $allStatus[] = $statusMhs;
            
            // Proposal
            $statusMhs['Status']='Proposal';
            $statusMhs['Count']=$count3;
            $allStatus[] = $statusMhs;
            
            $statusMhs['Status']='Belum usulan Topik';
            $statusMhs['Count']=$count4;
            $allStatus[] = $statusMhs;
                
            return $allStatus;
        }
        
        function generateLaporanStatus($allMahasiswa, $allSkripsi, $tahun){
            $allStatus = array();
            
            foreach($allSkripsi as $skripsi){
                $statusMhs['NIM'] = $skripsi['NIM']; // 1. NIK
                $statusMhs['Tahun']=$skripsi['TahunAjar'];
                foreach($allMahasiswa as $mhs){
                    if($skripsi['NIM'] == $mhs['NIM']){
                        $statusMhs['Nama'] = $mhs['Nama'];
                    }
                }
                
                if($skripsi['TanggalSkripsi'] != '0000-00-00'){
                    $today = date("Y-m-d");
                    $tanggal = $skripsi['TanggalSkripsi']; // tanggalSubmit
                    $tanggalRevisi = strtotime ( '+21 day' , strtotime ( $tanggal ) ) ; // $tanggalRevisi
                    $tanggalRevisi = date ( 'Y-m-d' , $tanggalRevisi );
//                        echo $tanggalRevisi.'<br>';
                        if(( $today >= $tanggal ) && ( $today <= $tanggalRevisi)){
                            $statusMhs['Status'] = 'Revisi Skripsi';
                            $statusMhs['Masa']=$tanggalRevisi;
                        }  else {
                            $statusMhs['Status'] = 'Lulus';
                            $statusMhs['Masa']=$tanggal;
                        }
                } else if($skripsi['TanggalProp'] != '0000-00-00'){
                    $today = date("Y-m-d");
                    $tanggal = $skripsi['TanggalProp']; // tanggalSubmit
                    $tanggalRevisi = strtotime ( '+21 day' , strtotime ( $tanggal ) ) ; // $tanggalRevisi
                    $tanggalRevisi = date ( 'Y-m-d' , $tanggalRevisi );
//                        echo $tanggalRevisi.'<br>';
                        if(( $today >= $tanggal ) && ( $today <= $tanggalRevisi)){
                            $statusMhs['Status'] = 'Revisi Proposal';
                            $statusMhs['Masa']=$tanggalRevisi;
                        }  else {
                            $statusMhs['Masa']=  date('Y-m-d',  strtotime('+365 day', strtotime($tanggal)));
                            $statusMhs['Status'] = 'Skripsi';
                        }
                        
                    
                } else if($skripsi['TanggalTopik'] != '0000-00-00'){
                    $statusMhs['Status'] = 'Proposal';
                    $statusMhs['Masa']='-';
                } else {
                    $statusMhs['Status'] = 'Belum usulan topik';
                }
                // append to array
                if($tahun != 0){
                    if($skripsi['TahunAjar'] == $tahun){
                        $allStatus[] = $statusMhs;
                    }
                } else {
                    $allStatus[] = $statusMhs;
                }
                
            }
                    
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
        
        function generateLaporanTanggungan($allDosen, $allSkripsi, $pembimbing, $tahun){
            $allTanggunganDosen = array();
            foreach($allDosen as $dosen){
                    $tanggunganDosen = array();
                    $count1 = 0;
                    $count2 = 0;

                    $tanggunganDosen['NIK'] = $dosen['NIK']; // 1. NIK
                    // 2. Nama , a href url folder views
//                    $tanggunganDosen['Nama'] = '<a href = " '. base_url() .'laporan/detail_dosen/'.$dosen['NIK'].'"'.'<font color="red">'.$dosen['Nama'].'</font>'.'</a>';
                    $tanggunganDosen['Nama'] = $dosen['Nama'];
                    $tanggunganDosen['KBK'] = $dosen['KBK']; // 3. KBK
                    $prop = 0; $skrip = 0; $lulus = 0;
                    
                    switch($pembimbing){
                        case 0:
                            foreach($allSkripsi as $skripsi){
                                if($dosen['NIK'] == $skripsi['NIK1']){
                                    $count1 = $count1+1;
                                    $tanggunganDosen['tahun'] = $skripsi['TahunAjar'];
                                    if($skripsi['TanggalSkripsi'] != '0000-00-00'){
                                        $lulus = $lulus+1;
                                    } else if($skripsi['TanggalProp'] != '0000-00-00'){
                                        $skrip = $skrip+1;
                                    } else if($skripsi['TanggalTopik'] != '0000-00-00'){
                                        $prop = $prop+1;
                                    } 
                                }
                                
                                if($dosen['NIK'] == $skripsi['NIK2']){
                                    $count2 = $count2+1;
                                    $tanggunganDosen['tahun'] = $skripsi['TahunAjar'];
                                    if($skripsi['TanggalSkripsi'] != '0000-00-00'){
                                        $lulus = $lulus+1;
                                    } else if($skripsi['TanggalProp'] != '0000-00-00'){
                                        $skrip = $skrip+1;
                                    } else if($skripsi['TanggalTopik'] != '0000-00-00'){
                                        $prop = $prop+1;
                                    } 
                                }
                            }

                            $tanggunganDosen['count1'] = $count1; // 4. Count1
                            $tanggunganDosen['count2'] = $count2; // 5. Count2
                            $tanggunganDosen['allCount'] = $count1+$count2; // 6. Count Total
                            $tanggunganDosen['prop'] = $prop;
                            $tanggunganDosen['skrip'] = $skrip;
                            $tanggunganDosen['lulus'] = $lulus;
                            if(isset($tanggunganDosen['tahun'])){
                                if($tahun != 0){
                                    if($tanggunganDosen['tahun'] == $tahun){
                                        $allTanggunganDosen[] = $tanggunganDosen;                            
                                    }
                                } else {
                                    $allTanggunganDosen[] = $tanggunganDosen;                            
                                }
                            }
                            break;
                        case 1:
                            foreach($allSkripsi as $skripsi){
                                if($dosen['NIK'] == $skripsi['NIK1']){
                                    $count1 = $count1+1;
                                    $tanggunganDosen['tahun'] = $skripsi['TahunAjar'];
                                    if($skripsi['TanggalSkripsi'] != '0000-00-00'){
                                        $lulus = $lulus+1;
                                    } else if($skripsi['TanggalProp'] != '0000-00-00'){
                                        $skrip = $skrip+1;
                                    } else if($skripsi['TanggalTopik'] != '0000-00-00'){
                                        $prop = $prop+1;
                                    } 
                                }
                            }

                            $tanggunganDosen['count1'] = $count1; // 4. Count1
                            $tanggunganDosen['prop'] = $prop;
                            $tanggunganDosen['skrip'] = $skrip;
                            $tanggunganDosen['lulus'] = $lulus;
                            
                            if(isset($tanggunganDosen['tahun'])){
                                if($tanggunganDosen['tahun'] == $tahun){
                                    $allTanggunganDosen[] = $tanggunganDosen;                            
                                }
                            }
                            break;
                        case 2:
                            foreach($allSkripsi as $skripsi){
                                if($dosen['NIK'] == $skripsi['NIK2']){
                                    $count2 = $count2+1;
                                    $tanggunganDosen['tahun'] = $skripsi['TahunAjar'];
                                    if($skripsi['TanggalSkripsi'] != '0000-00-00'){
                                        $lulus = $lulus+1;
                                    } else if($skripsi['TanggalProp'] != '0000-00-00'){
                                        $skrip = $skrip+1;
                                    } else if($skripsi['TanggalTopik'] != '0000-00-00'){
                                        $prop = $prop+1;
                                    } 
                                }
                            }

                            $tanggunganDosen['count2'] = $count2; // 4. Count1
                            $tanggunganDosen['prop'] = $prop;
                            $tanggunganDosen['skrip'] = $skrip;
                            $tanggunganDosen['lulus'] = $lulus;
                            
                            if(isset($tanggunganDosen['tahun'])){
                                if($tahun != 0){
                                    if($tanggunganDosen['tahun'] == $tahun){
                                        $allTanggunganDosen[] = $tanggunganDosen;                            
                                    }
                                } else {
                                    $allTanggunganDosen[] = $tanggunganDosen;                            
                                }
                            }
                            break;
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
        
        /**
         * Detail Dosen
         */
        
        function detail_dosen(){
            $seStr = $this->input->get('array');
            $arr = explode('x', $seStr);
            $NIK = $arr[0];
            $pembimbing = $arr[1];
            
            $allSkripsi = $this->Skripsi->getAllSkripsi();
            $dosen = $this->Dosen->getDosen($NIK);
            $data = array(
                'detailDosen' => $this->generateDetail($dosen, $allSkripsi, $pembimbing),
                'allMahasiswa' => $this->allMahasiswa
            );
            
            $this->load->view('laporan/detail_dosen', $data);
        }
        
        function generateDetail($dosen, $allSkripsi, $pembimbing){
            $mhsBimbing = array();
            switch($pembimbing){
                case 0:
                    foreach($allSkripsi as $skripsi){
                        if(($dosen->NIK == $skripsi['NIK1']) || ($dosen->NIK == $skripsi['NIK2'])){
                            $mahasiswa = $this->Mahasiswa->getMahasiswa($skripsi['NIM']);
                            if(isset($mahasiswa)){
                           
                                $mhsTemp = array();
                                $mhsTemp[] = $mahasiswa->NIM;
                                $mhsTemp[] = $mahasiswa->Nama;
                                $mhsTemp[] = $skripsi['KBK'];
                                $mhsTemp[] = $skripsi['Judul'];
                
                                if($skripsi['TanggalSkripsi'] != '0000-00-00'){
                                    $mhsTemp[] = 'Lulus';
                                } else if($skripsi['TanggalProp'] != '0000-00-00'){
                                    $mhsTemp[] = 'Skripsi';
                                } else if($skripsi['TanggalTopik'] != '0000-00-00'){
                                    $mhsTemp[] = 'Proposal';
                                } else {
                                    $mhsTemp[] = 'Belum usulan topik';
                                }
                                $mhsBimbing[] = $mhsTemp;
                            } else {
                                echo "Mahasiswa kosong";
                            }

                        }
                    }
                    break;
                case 1:
                    foreach($allSkripsi as $skripsi){
                        if(($dosen->NIK == $skripsi['NIK1'])){
                            $mahasiswa = $this->Mahasiswa->getMahasiswa($skripsi['NIM']);
                            if(isset($mahasiswa)){
                           
                                $mhsTemp = array();
                                $mhsTemp[] = $mahasiswa->NIM;
                                $mhsTemp[] = $mahasiswa->Nama;
                                $mhsTemp[] = $skripsi['KBK'];
                                $mhsTemp[] = $skripsi['Judul'];
                                $mhsBimbing[] = $mhsTemp;
                            } else {
                                echo "Mahasiswa kosong";
                            }

                        }
                    }
                    break;
                case 2:
                    foreach($allSkripsi as $skripsi){
                        if(($dosen->NIK == $skripsi['NIK2'])){
                            $mahasiswa = $this->Mahasiswa->getMahasiswa($skripsi['NIM']);
                            if(isset($mahasiswa)){
                           
                                $mhsTemp = array();
                                $mhsTemp[] = $mahasiswa->NIM;
                                $mhsTemp[] = $mahasiswa->Nama;
                                $mhsTemp[] = $skripsi['KBK'];
                                $mhsTemp[] = $skripsi['Judul'];
                                $mhsBimbing[] = $mhsTemp;
                            } else {
                                echo "Mahasiswa kosong";
                            }

                        }
                    }
                    break;
            }
            return $mhsBimbing;
        }
        
//        function generateDetail($dosen, $allMembimbing, $allSkripsi){
//            $mhsBimbing = array();
//            foreach($allMembimbing as $skripsi){
//                if($dosen->NIK == $membimbing['NIK']){
//                    $skripsi = $this->Skripsi->getSkripsi($membimbing['id_skripsi']);
////                    $kbk = $this->KBK->getKBK($skripsi->id_kbk);
//                    $mahasiswa = $this->Mahasiswa->getMahasiswa($skripsi->NIM);
//                    if(isset($mahasiswa)){
//                        echo "<br>NIM".$mahasiswa->NIM;
//                    
//                        $mhsTemp = array();
//                        $mhsTemp[] = $mahasiswa->NIM;
//                        $mhsTemp[] = $mahasiswa->Nama;
//                        $mhsTemp[] = $skripsi->KBK;
//                        $mhsTemp[] = $skripsi->Judul;
//    //                    $mhsTemp[] = $kbk['namaKBK'];
//
//                        $mhsBimbing[] = $mhsTemp;
//                    } else {
//                        echo "Mahasiswa kosong";
//                    }
//                    
//                }
//            }
//            
//            return $mhsBimbing;
//        }
        
}
