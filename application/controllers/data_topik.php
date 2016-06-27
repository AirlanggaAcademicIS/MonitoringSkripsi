<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//nama class harus diawali dengan kapital, walaupun nama file semua kecil
class Data_topik extends CI_Controller {
 
 public function index()
 {
     	  $this->load->helper('url'); 
          $this->load->database();//memanggil pengaturan database dan mengaktifkannya 
          $this->load->model('m_data_topik');//memanggil model m_data_topik
		  $this->load->model('Skripsi');
          $data['skripsi'] = $this->m_data_topik->list_data(); //memanggil fungsi di model dan menerima hasil fungsi yang dimasukan ke $data['skripsi']
        if($this->session->userdata('as') == 'KoorSkripsi'){
                $this->load->view('topik/Tabel_Usulan_Topik',$data);
            } else {
                $this->load->view('Not_Found');
            }  
 }
 

public function Input()
{
     $NIM= $this->session->userdata('nim');
	 $cek = false;
	 $this->load->database();
	 $this->load->model("Skripsi");
	 $allSkripsi= $this->Skripsi->getAllSkripsi();
	 
	 foreach($allSkripsi as $value){
		if ($value['NIM'] == $NIM) {
			$cek = true;	
		}
	}
	if ($cek == true){
		if($this->session->userdata('as') == 'Mahasiswa'){
                $this->load->view('topik/Sudah_Mengusulkan');
            } else {
                $this->load->view('Not_Found');
            } 
	
	}
	else{	
      $this->load->model("m_data_topik");
  	  $data['NIM'] = $this->m_data_topik->getMHS();
	  $data['NIK1'] = $this->m_data_topik->getDosen();
	  $data['NIK2'] = $this->m_data_topik->getDosen();
	  $this->load->helper('form');//memanggil helper form nanti penggunaannya di v_form_topik.php
      $data['type']="INPUT";// definisi type, karena nanti juga ada edit
      if($this->session->userdata('as') == 'Mahasiswa'){
                $this->load->view('topik/Form_Input_Usulan_Topik',$data);
            } else {
                $this->load->view('Not_Found');
            } 
}}


public function Edit()
{
      $this->load->helper('form');//memanggil helper form nanti penggunaannya di v_form_topik.php
      $this->load->database();//memanggil pengaturan database dan mengaktifkannya
      $this->load->model('m_data_topik');//memanggil model m_data_topik.php
      $data['NIM'] = $this->m_data_topik->getMHS();
      $NIM= $this->input->get('skripsi');//mengambil param  dari get
	  $data['skripsi'] = $this->m_data_topik->getEdit($NIM);
      $data['type']="EDIT";// definisi type, karena nanti juga ada edit
    if($this->session->userdata('as') == 'KoorSkripsi'){
                $this->load->view('topik/Form_Edit_Usulan_Topik',$data);
            } else {
                $this->load->view('Not_Found');
            }   // memanggil view v_form_topik.php
}

public function Post(){
     $this->load->database();//memanggil pengaturan database dan mengaktifkannya
     $this->load->model('m_data_topik');//memanggil model m_data_topik.php
 	$NIK1 = $this->input->post('NIK1');
 	$NIK2 = $this->input->post('NIK2');
	$TahunAjar = $this->input->post('TahunAjar');
     //mengambil data dari post memasukan ke array agar lebih mudah 
     $param = array(
	   'TanggalTopik' => $this->input->post('TanggalTopik'),
       'TahunAjar' => $TahunAjar,
	   'NIM' => $this->input->post('NIM'),
       'KBK' => $this->input->post('KBK'),
       'Topik'=> $this->input->post('Topik'),
	   'Judul' => $this->input->post('Judul'),
       'NIK1' => $NIK1,
	   'NIK2' => $NIK2,
	   'TanggalProp' => '0000-00-00',
	   'TanggalSkripsi' => '0000-00-00',
	   'id_jadwal' => '0',
       );
     //jika simpan == input 
     if($this->input->post('simpan')=="INPUT"){
	 	if ($this->addSkripsi($NIK1, $NIK2, $TahunAjar)){
         	$this->m_data_topik->input($param); 
			//memanggil helper url untuk fungsi redirect
      		$this->load->helper('url');
		    //mengalihkan ke list data produk setelah input atau edit selesai
      		redirect('mahasiswa','refresh');
		} else {
			echo 'Kuota Penuh, Silahkan Pilih Dosen Pembimbing Lain';
		}

			
     }else
     	 if($this->input->post('simpan')=="EDIT"){
         $NIM= $this->input->post('NIM');
		  $this->m_data_topik->edit($param,$NIM); 
		//memanggil helper url untuk fungsi redirect
      	 $this->load->helper('url');
		
      //mengalihkan ke list data produk setelah input atau edit selesai
     	redirect('data_topik','refresh');
     }
     }
   

public function Delete(){
   $this->load->database();//memanggil pengaturan database dan mengaktifkannya
   $this->load->model('m_data_topik');//memanggil model m_data_produk.php
   $NIM = $this->input->get('skripsi');
   $this->m_data_topik->delete($NIM);
  
   $this->load->helper('url');
   redirect('data_topik','refresh');
  
}

function addSkripsi($NIK1,$NIK2,$TahunAjar){
	$this->load->model('Skripsi');
	$allSkripsi = $this->Skripsi->getAllSkripsi();
	$count1=0;
	$count2=0;

	foreach($allSkripsi as $skripsi){
		if(($skripsi['NIK1'] == $NIK1)||($skripsi['NIK2'] == $NIK1)){ // untuk dosen 1
			$count1++;
		}
		if(($skripsi['NIK1'] == $NIK2)||($skripsi['NIK2'] == $NIK2)){ // untuk dosen 2
			$count2++;
		}
	}
	
	$KuotaTahunAjar = $this->m_data_topik->KuotaTahunAjar($TahunAjar); 
	
	if(($count1<$KuotaTahunAjar)&&($count2<$KuotaTahunAjar)){
	
	echo 'Pembimbing1='.$count1;
	echo 'Pembimbing2='.$count2;
		return true;
	} else {

		return false;
	}
}}