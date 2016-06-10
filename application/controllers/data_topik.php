<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//nama class harus diawali dengan kapital, walaupun nama file semua kecil
class Data_topik extends CI_Controller {
 
 public function index()
 {
     	  $this->load->helper('url'); 
          $this->load->database();//memanggil pengaturan database dan mengaktifkannya 
          $this->load->model('m_data_topik');//memanggil model m_data_topik
          $data['skripsi'] = $this->m_data_topik->list_data(); //memanggil fungsi di model dan menerima hasil fungsi yang dimasukan ke $data['skripsi']
          $this->load->view('topik/v_data_topik1',$data);//memanggil view yang nanti kita akan buat dan memasukan $data dari model tadi 
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
		$this->load->view('formTopik/usulan');
	
	}
	else{
		
      $this->load->model("m_data_topik");
  	  $data['NIM'] = $this->m_data_topik->getMHS();
	  $data['NIK1'] = $this->m_data_topik->getDosen();
	  $data['NIK2'] = $this->m_data_topik->getDosen();
	  $this->load->helper('form');//memanggil helper form nanti penggunaannya di v_form_topik.php
      $data['type']="INPUT";// definisi type, karena nanti juga ada edit
      $this->load->view('formTopik/v_form_topik',$data);// memanggil view v_form_topik.php	
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
      $this->load->view('topik/v_form_topik1',$data);// memanggil view v_form_topik.php
}

public function Post(){
     $this->load->database();//memanggil pengaturan database dan mengaktifkannya
     $this->load->model('m_data_topik');//memanggil model m_data_topik.php
 
     //mengambil data dari post memasukan ke array agar lebih mudah 
     $param = array(
	   'TanggalTopik' => $this->input->post('TanggalTopik'),
       'TahunAjar' => $this->input->post('TahunAjar'),
	   'NIM' => $this->input->post('NIM'),
       'KBK' => $this->input->post('KBK'),
       'Topik'=> $this->input->post('Topik'),
	   'Judul' => $this->input->post('Judul'),
       'NIK1' => $this->input->post('NIK1'),
	   'NIK2' => $this->input->post('NIK2'),
	   'TanggalProp' => '0000-00-00',
	   'TanggalSkripsi' => '0000-00-00',
	   'id_jadwal' => '0',
       );
     //jika simpan == input 
     if($this->input->post('simpan')=="INPUT"){
          $this->m_data_topik->input($param); 
     }else
     if($this->input->post('simpan')=="EDIT"){
          $NIM= $this->input->post('NIM');
          $this->m_data_topik->edit($param,$NIM); 
     }
 
      //memanggil helper url untuk fungsi redirect
      $this->load->helper('url');
      //mengalihkan ke list data produk setelah input atau edit selesai
      redirect('data_topik','refresh');
     }

public function Delete(){
   $this->load->database();//memanggil pengaturan database dan mengaktifkannya
   $this->load->model('m_data_topik');//memanggil model m_data_produk.php
   $NIM = $this->input->get('skripsi');
   $this->m_data_topik->delete($NIM);
 
   $this->load->helper('url');
   redirect('data_topik','refresh');
  
}


}
