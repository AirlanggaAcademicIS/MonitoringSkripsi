<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi_fix4 extends CI_Controller {

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
	public function index()
	{
	if($this->session->userdata('as') == 'TU'){
              $this->load->view('Prodi_Home');
		  } else {
                $this->load->view('Not_Found');
            }
//            $this->load->view('header');
          
//            $this->load->view('footer');
	}
	public function mahasiswa_page()
	{
		if($this->session->userdata('as') == 'TU'){
             $this->load->view('prodi/daftar_mahasiswa_fix');
		  } else {
                $this->load->view('Not_Found');
            }	
	}
        public function dosen_page()
	{
		$this->load->view('prodi/daftar_dosen_fix');
	}
	public function tambah_mahasiswa_page()
	{
		if($this->session->userdata('as') == 'TU'){
             $this->load->view('prodi/tambah_mahasiswa_fix');
	}
		  } else {
                $this->load->view('Not_Found');
            }	
    public function tambah_dosen_page()
	{
		if($this->session->userdata('as') == 'TU'){
          $this->load->view('prodi/tambah_dosen_fix');
	}
		  } else {
                $this->load->view('Not_Found');
            }
	}
	public function mahasiswa_insert()
	{
		$NIM=$this->input->post('NIM');
		$Nama=$this->input->post('Nama');
		$Alamat=$this->input->post('Alamat');
	        $Telp=$this->input->post('Telp');
		$Email=$this->input->post('Email');
                $Pass=$this->input->post('Pass');
                $Prodi=$this->input->post('Prodi');
                
$this->load->database();
$this->load->model('Prodimodel');
		$this->Prodimodel->insert_tambah($NIM, $Nama, $Alamat, $Telp, $Email, $Pass, $Prodi) ;
		
		$allmahasiswa = $this->Prodimodel->getsemuamahasiswa();
		$data = array(
			'jumlah'=>sizeof($allmahasiswa),
			'isitabel'=>$allmahasiswa
			);
		if($this->session->userdata('as') == 'TU'){
        $this->load->view('prodi/daftar_mahasiswa_fix',$data);
	}
		  } else {
                $this->load->view('Not_Found');
            }	
		
        }
		
        public function dosen_insert()
	{
		$NIK=$this->input->post('NIK');
		$Nama=$this->input->post('Nama');
		$Alamat=$this->input->post('Alamat');
	        $Telp=$this->input->post('Telp');
		$Email=$this->input->post('Email');
		$Pass=$this->input->post('Pass');
                $Prodi=$this->input->post('Prodi');
                $KBK=$this->input->post('KBK');
                $TahunAjar=$this->input->post('TahunAjar');
                
                
$this->load->database();
$this->load->model('Prodimodel');
		$this->Prodimodel->insert_tambah2($NIK, $Nama, $Alamat, $Email, $Telp, $Pass, $Prodi, $KBK, $TahunAjar) ;
		
		$alldosen = $this->Prodimodel->getsemuadosen();
		$data = array(
			'jumlah'=>sizeof($alldosen),
			'isitabel'=>$alldosen
			);
			if($this->session->userdata('as') == 'TU'){
       $this->load->view('prodi/daftar_dosen_fix',$data);
	}
		  } else {
                $this->load->view('Not_Found');
            }		
		
        }
       
		
		public function mahasiswatabel()
	{
			
		$this->load->model('Prodimodel');
		
		$allbimbingan = $this->Prodimodel->getsemuamahasiswa();
		$data = array(
			'jumlah'=>sizeof($allbimbingan),
			'isitabel'=>$allbimbingan
			);
			
		if($this->session->userdata('as') == 'TU'){
      $this->load->view('prodi/daftar_mahasiswa_fix',$data);
	}
		  } else {
                $this->load->view('Not_Found');
            }
		
		
	} 
	public function dosentabel()
	{
			
		$this->load->model('Prodimodel');
		
		$allbimbingan = $this->Prodimodel->getsemuadosen();
		$data = array(
			'jumlah'=>sizeof($allbimbingan),
			'isitabel'=>$allbimbingan
			);
			
	if($this->session->userdata('as') == 'TU'){
     $this->load->view('prodi/daftar_dosen_fix',$data);
	}
		  } else {
                $this->load->view('Not_Found');
            }	
		
	} 
	}