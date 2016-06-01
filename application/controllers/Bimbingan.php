<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan extends CI_Controller {

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
//            $this->load->view('header');
            $this->load->view('bimbingan/bimbingan');
//            $this->load->view('footer');
	}
	public function bimbingan_page()
	{
		$this->load->view('bimbingan/mahasiswa_bimbingan');
	}
	public function tambahan_bimbingan_page()
	{
		$this->load->view('bimbingan/mahasiswa_tambahan_bimbingan');
	}
	public function bimbingan_insert()
	{
		$Tanggal=$this->input->post('tanggal');
		$Subjek=$this->input->post('catatan');
		$option=$this->input->post('nik');
		
		$Persetujuan="Belum disetujui";
		
		$this->load->model('Skripsi');
		$nik1nik2 = $this->Skripsi->getnik1nik2("081313222773");
		$tanggalskripsi = $this->Skripsi->gettanggaskripsi("081313222773");
				if($tanggalskripsi['TanggalProp'] != 0000-00-00){
				$Jenis="Skripsi";			
			}
			else {
			$Jenis="Proposal";
							
			}
			
			
				if($option==1){
					$NIK = $nik1nik2['nik1'];
				}
				else if($option==2){
					$NIK = $nik1nik2['nik2'];				
				}
		
		$this->load->model('Bimbingan1');
		$this->Bimbingan1->insert_tambahan($Subjek, $Tanggal, $Jenis, $NIK ,$Persetujuan) ;
		
		$allbimbingan = $this->Bimbingan1->getsemuabimbingan();
		$data = array(
			'jumlah'=>sizeof($allbimbingan),
			'isitabel'=>$allbimbingan
			);
			
		$this->load->view('bimbingan/mahasiswa_bimbingan',$data);
	
	}
	/*public function tabel_bimbingan()
	{
		$this->load->model('Bimbingan1');
		$data = array(
			'annn' => $this->Bimbingan1->getAllBimbingan()
			);
		
		$this->load->view("bimbingan/mahasiswa_bimbingan",$data);
	}
	*/
		public function bimbingantabel()
	{
		
		$this->load->model('Bimbingan1');
		$allbimbingan = $this->Bimbingan1->getsemuabimbingan();
		$data = array(
			'jumlah'=>sizeof($allbimbingan),
			'isitabel'=>$allbimbingan
			);
			
		$this->load->view('bimbingan/mahasiswa_bimbingan',$data);
		
	}
	public function tabel()
	{
		$this->load->view('bimbingan/mahasiswa_bimbingan');
	}
	public function bimbinganpage()
	{
		$this->load->view('bimbingan/mahasiswa_bimbingan_page');
	}
	
	public function jenistabel()
	{
		$jenis = $this->input->post('jenis');
		$this->load->model('Bimbingan1');
		
		if($jenis==0){
		$albimbingan = $this->Bimbingan1->getsemuabimbingan();
		$data = array(
			'jumlah'=>sizeof($albimbingan),
			'isitabel'=> $albimbingan
			);	
					}
			else if($jenis==1){$albimbingan = $this->Bimbingan1->getjenisbimbingan("'Proposal'");}
				else if($jenis==2){$albimbingan = $this->Bimbingan1->getjenisbimbingan("'Skripsi'");}
	
		$data = array(
			'jumlah'=>sizeof($albimbingan),
			'isitabel'=> $albimbingan
			);
		$this->load->view('bimbingan/mahasiswa_bimbingan',$data);
	
	}
	
}
