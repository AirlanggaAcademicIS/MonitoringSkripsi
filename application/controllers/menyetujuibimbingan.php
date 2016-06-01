<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menyetujuibimbingan extends CI_Controller {

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
		$this->load->view('menyetujuibimbingan/menyetujuibimbingan_Home');	

		}
	public function bimbingan()
	{
		$this->load->model('menyetujui');
		$data['mahasiswa']=$this->menyetujui->m_lihat();
		$this->load->view('menyetujuibimbingan/menyetujuibimbingan_Page',$data);
		
	}	
	public function tampil()
	{
	$this->load->model('menyetujui'); //load model
    $data['hasilTampil'] = $this->menyetujui->menampilkan(); //membuat data dari hasil transaksi masuk ke $data
	$this->load->view('menyetujuibimbingan/menyetujuibimbingan_Page',$data);
	}	
/*	public function bimbingan_insert()
	{
		$this->load->model('Skripsi');
		$nik1nik2 = $this->Skripsi->getnik1nik2("081313222773");
		
				if($option==1){
					$NIK = $nik1nik2['nik1'];
				}
				else if($option==2){
					$NIK = $nik1nik2['nik2'];				
				}
		
		$this->load->model('menyetujui');
		$this->menyetujui->insert_tambahan($NIM, $Nama, $Judul, $Persetujuan) ;
		
		$allbimbingan = $this->menyetujui->getsemuabimbingan();
		$data = array(
			'jumlah'=>sizeof($allbimbingan),
			'isitabel'=>$allbimbingan
			);
			
		$this->load->view('menyetujui/menyetujuibimbingan_Page',$data);
	
	}
	public function bimbingantabel()
	{
		
		$this->load->model('menyetujui');
		$allbimbingan = $this->menyetujui->getsemuabimbingan();
		$data = array(
			'jumlah'=>sizeof($allbimbingan),
			'isitabel'=>$allbimbingan
			);
			
		$this->load->view('menyetujui/menyetujuibimbingan_Page',$data);
		
	}	*/
}
