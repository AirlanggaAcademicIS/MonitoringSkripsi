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
		$this->load->model('Skripsi');
		$this->load->model('Bimbingan');
		$this->load->library('table');
		$this->input->post('NIM');
		//$this->load->model('m_Mahasiswadosbing');
		$NIM = '081311633005'; 
		
		$skripsi_id = 0;
		$allSkripsi=$this->Skripsi->getAllSkripsi();
			foreach ($allSkripsi as $skripsi){
				if($skripsi['NIM']== $NIM){
					$skripsi_id = $skripsi['id_skripsi'];
					

				}
			}
		//	$data['bimbingan'] = $skripsi_id;
		
		$bimX = array();
		$allbim=$this->Bimbingan->getAllBimbingan();
			foreach ($allbim as $bim){
				if($bim['id_skripsi'] == $skripsi_id ){
						$bimX[] = $bim;
					}
			}
			$data = array( 'bimbingan' => $bimX);
		
		$this->load->view('menyetujuibimbingan/menyetujuibimbingan_Page',$data);
		
	}	
	
	public function Edit()
	{
      $this->load->helper('form');//memanggil helper form nanti penggunaannya di v_form_topik.php
      $this->load->database();//memanggil pengaturan database dan mengaktifkannya
      $this->load->model('Bimbingan');//memanggil model m_data_jadwal.php
      $data['id_bimbingan'] = $this->Bimbingan->getAllBimbingan();
      $data['type']="EDIT";// definisi type, karena nanti juga ada edit
	  
	  
	  
      $this->load->view('menyetujuibimbingan/edit_bimbingan',$data);// memanggil view edit_bimbingan.php
}
	public function Delete(){
	   $this->load->database();//memanggil pengaturan database dan mengaktifkannya
	   $this->load->model('m_data_topik');//memanggil model m_data_topik.php
	   $NIM= $this->input->get('skripsi');
	   $this->m_data_topik->delete($NIM);
	   $this->load->helper('url');
	   redirect('skripsi','refresh');
}	
	
/*	public function menyetujuitabel()
	{
			
		$this->load->model('menyetujui');
		
		$allbimbingan = $this->menyetujui->getsemuabim("081311633058");
		$data = array(
			'jumlah'=>sizeof($allbimbingan),
			'isitabel'=>$allbimbingan
			);
			
		$this->load->view('menyetujui_bimbingan/menyetujuibimbingan_Page',$data);
		
	}	*/
}
