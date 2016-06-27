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
            if(($this->session->userdata('as') == 'Dosen')||($this->session->userdata('as') == 'KoorSkripsi')||($this->session->userdata('as') == 'Kaprodi')){
                $this->load->view('Dosen_Pembimbing_Home');
            } else {
                $this->load->view('Not_Found');
            } 
	}
        
	public function mahasiswabimbingan(){
       
		$this->load->model('m_Mahasiswadosbing');
		$NIK = $this->session->userdata('NIK');
		echo $NIK;
		$mhsbim = $this->m_Mahasiswadosbing->getsemuamahadosbing($NIK);
		$data = array(
			'jumlah'=>sizeof($mhsbim),
			'isitabel'=> $mhsbim
			);
			
	if(($this->session->userdata('as') == 'Dosen')||($this->session->userdata('as') == 'KoorSkripsi')||($this->session->userdata('as') == 'Kaprodi')){
               $this->load->view('menyetujui_bimbingan/mahasiswa_dosen_pembimbing',$data);
            } else {
                $this->load->view('Not_Found');
            } 
	 
			
	}
	
	public function bimbingan()
	{
		$this->load->model('menyetujui');
		$this->load->model('Skripsi');
		$this->load->model('Bimbingan');
		$this->load->library('table');
		$this->input->post('NIM');
		
	   $NIM = $this->input->get('NIM'); 
		
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
		
				
	if(($this->session->userdata('as') == 'Dosen')||($this->session->userdata('as') == 'KoorSkripsi')||($this->session->userdata('as') == 'Kaprodi')){
               $this->load->view('menyetujui_bimbingan/menyetujuibimbingan_Page',$data);
            } else {
                $this->load->view('Not_Found');
            } 
		
	}	
	
	public function Edit()
	{
	
      $this->load->helper('form');//memanggil helper form nanti penggunaannya di v_form_topik.php
      $this->load->database();//memanggil pengaturan database dan mengaktifkannya
      $this->load->model('Bimbingan');//memanggil model m_data_jadwal.php
     // $data['id_skripsi'] = $this->Bimbingan->getAllBimbingan();
	  //$id_bimbingan= $this->input->get('bimbingan');//mengambil param  dari get
	  	//	$data['bimbingan'] = $this->Bimbingan->getEdit($id_bimbingan);
			
	  	
      $data['type']="EDIT";// definisi type, karena nanti juga ada edit
    
		if($this->session->userdata('as') == 'Dosen'){
             $this->load->view('menyetujui_bimbingan/edit_bimbingan',$data);
		  } else {
                $this->load->view('Not_Found');
            } 
	  // memanggil view edit_bimbingan.php
}
	
	function detail_bimbingan(){
			$NIM = $this->input->get('NIM');
			$this->load->model('Skripsi');
			$this->load->model('Bimbingan');

            $allBimbingan = $this->Bimbingan->getAllBimbingan();
			$allSkripsi = $this->Skripsi->getAllSkripsi();
       
            $data = array(
                'detailBimbingan' => $this->generateDetail($allBimbingan, $allSkripsi, $NIM)
                );
            
    if($this->session->userdata('as') == 'Dosen'){
  $this->load->view('menyetujui_bimbingan/detail_bimbingan', $data);
  		  } else {
                $this->load->view('Not_Found');
            }
		  
        }
		
	function generateDetail($allBimbingan, $allSkripsi, $NIM) {
	
	/**
	
	1. Ambil semua skripsi yang skripsi['nim'] = $NIM
	*/
	
	$skripsiX = 0;
	foreach ($allSkripsi as $skripsi){
		if($skripsi['NIM'] == $NIM){
			$skripsiX = $skripsi['id_skripsi'];
			echo 'test';
		}
	}
	
	/**
	2. Ambil bimbingan untuk setiap bimbingan['idskripsi'] = skripsi[id_skripsi]
	*/
	echo $skripsiX;
	$allbimbX = array();
	foreach($allBimbingan as $bimb){
	echo 'bip';
		if($bimb['id_skripsi'] == $skripsiX){
			$bimbX = array();
			$bimbX['id'] = $bimb['id_bimbingan'];
			$bimbX['Tanggal'] = $bimb['Tanggal'];
			$bimbX['Subjek'] = $bimb['Subjek'];
			$bimbX['Jenis']= $bimb['Jenis'];
			$bimbX['Persetuuan'] = $bimb['Persetujuan'];
			$allbimbX[] = $bimbX;
			echo 'test';
		}
	}
	return $allbimbX;
//	$data = array( 'generateDetail' => $bimbX);

}
	public function ubah_status_bimbingan()
	{
		$seStr = $this->input->get('array');
       	$arr = explode('x', $seStr);
       	$id_bimbingan = $arr[0];
       	$persetujuan = $arr[1];
			
		$this->load->model('Bimbingan');
		$persetujuan=$this->Bimbingan->menyetujui($id_bimbingan, $persetujuan);
		redirect('Dosen_Pembimbing');
	
	}

}