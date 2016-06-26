<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//nama class harus diawali dengan kapital, walaupun nama file semua kecil
class Data_jadwal extends CI_Controller {
 
 public function index()
 {
      $this->load->helper('url'); 
          $this->load->database();//memanggil pengaturan database dan mengaktifkannya 
          $this->load->model('m_data_jadwal');//memanggil model m_data_jadwal
          $data['jadwal'] = $this->m_data_jadwal->list_data();//memanggil fungsi di model dan menerima hasil fungsi yang dimasukan ke $data['jadwal']
          $this->load->view('prodi/Tabel_Jadwal_Sidang',$data);//memanggil view yang nanti kita akan buat dan memasukan $data dari model tadi 

 }
 
 public function Input()
{

    $this->load->helper('form');//memanggil helper form nanti penggunaannya di v_form_jadwal.php
      $this->load->database();
	  $this->load->model("Skripsi");
	  $allSkripsi= $this->Skripsi->getAllSkripsi();
	  
	  $this->load->model("m_data_jadwal");
	  $data['NIM'] = $this->m_data_jadwal->getSkripsi();
	  $data['NIK1'] = $this->m_data_jadwal->getDosen();
	  $data['NIK2'] = $this->m_data_jadwal->getDosen();
	  $data['type']="INPUT";// definisi type, karena nanti juga ada edit
      $this->load->view('prodi/Form_Input_Jadwal_Sidang',$data);// memanggil view v_form_jadwal.php
}

public function Edit()
{
  $this->load->helper('form');//memanggil helper form nanti penggunaannya di v_form_jadwal.php
  
      $this->load->database();//memanggil pengaturan database dan mengaktifkannya
      $this->load->model('m_data_jadwal');//memanggil model m_data_jadwal.php
      $data['NIM'] = $this->m_data_jadwal->getSkripsi();
      $NIM= $this->input->get('jadwal');//mengambil param  dari get
	  $data['jadwal'] = $this->m_data_jadwal->getEdit($NIM);
      $data['type']="EDIT";// definisi type, karena nanti juga ada edit
      $this->load->view('prodi/Form_Edit_Jadwal_Sidang',$data);// memanggil view v_form_jadwal.php
}

public function Post(){
     $this->load->database();//memanggil pengaturan database dan mengaktifkannya
     $this->load->model('m_data_jadwal');//memanggil model m_data_jadwal.php
 
     //mengambil data dari post memasukan ke array agar lebih mudah 
     $param = array(
	//   'id_jadwal' => $this->input->post('null'),
	   'NIM' => $this->input->post('NIM'),
       'NIK1' => $this->input->post('NIK1'),
	   'NIK2' => $this->input->post('NIK2'),
	   'Tanggal' => $this->input->post('Tanggal'),
	   'Pukul'=> $this->input->post('Pukul'),
	   'Tempat' => $this->input->post('Tempat'),
	   'JenisSidang' => $this->input->post('JenisSidang'),
	          );
	   
     //jika simpan == input 
     if($this->input->post('simpan')=="INPUT"){
          $this->m_data_jadwal->input($param); 
     }else
     if($this->input->post('simpan')=="EDIT"){
          $NIM= $this->input->post('NIM');
          $this->m_data_jadwal->edit($param,$NIM); 
     }
 
      //memanggil helper url untuk fungsi redirect
      $this->load->helper('url');
      //mengalihkan ke list data produk setelah input atau edit selesai
      redirect('data_jadwal','refresh');
     }

 public function Delete(){
   $this->load->database();//memanggil pengaturan database dan mengaktifkannya
   $this->load->model('m_data_jadwal');//memanggil model m_data_jadwal.php
   $NIM= $this->input->get('jadwal');
   $this->m_data_jadwal->delete($NIM);
 
   $this->load->helper('url');
   redirect('jadwal','refresh');
}

}


