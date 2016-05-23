<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//nama class harus diawali dengan kapital, walaupun nama file semua kecil
class Data_jadwal extends CI_Controller {
 
 public function index()
 {
      $this->load->helper('url'); 
          $this->load->database();//memanggil pengaturan database dan mengaktifkannya 
          $this->load->model('m_data_jadwal');//memanggil model m_data_jadwal
          $data['jadwal'] = $this->m_data_jadwal->list_data();//memanggil fungsi di model dan menerima hasil fungsi yang dimasukan ke $data['jadwal']
          $this->load->view('v_data_jadwal',$data);//memanggil view yang nanti kita akan buat dan memasukan $data dari model tadi 

 }
 
 public function Input()
{
      //$this->load->helper('form');//memanggil helper form nanti penggunaannya di v_form_jadwal.php
      $data['type']="INPUT";// definisi type, karena nanti juga ada edit
      $this->load->view('v_form_jadwal',$data);// memanggil view v_form_jadwal.php
}

public function Edit()
{
   //   $this->load->helper('form');//memanggil helper form nanti penggunaannya di v_form_jadwal.php
  
      $this->load->database();//memanggil pengaturan database dan mengaktifkannya
      $this->load->model('m_data_jadwal');//memanggil model m_data_jadwal.php
  
      $NIM= $this->input->get('jadwal');//mengambil param  dari get
      $data['jadwal'] = $this->m_data_jadwal->getEdit($NIM);
      $data['type']="EDIT";// definisi type, karena nanti juga ada edit
      $this->load->view('v_form_jadwal',$data);// memanggil view v_form_jadwal.php
}

public function Post(){
     $this->load->database();//memanggil pengaturan database dan mengaktifkannya
     $this->load->model('m_data_jadwal');//memanggil model m_data_topik.php
 
     //mengambil data dari post memasukan ke array agar lebih mudah 
     $param = array(
	   'id_jadwal' => $this->input->post('null'),
	   'NIM' => $this->input->post('NIM'),
       'Nama' => $this->input->post('Nama'),
	   'Judul' => $this->input->post('Judul'),
       'NIK1' => $this->input->post('NIK1'),
	   'NIK2' => $this->input->post('NIK2'),
	   'Penguji1' => $this->input->post('NIKP1'),
	   'TanggalProp' => $this->input->post('TanggalProp'),
	   'JamProp'=> $this->input->post('JamProp'),
	   'Penguji2' => $this->input->post('NIKP2'),
	   'TanggalSkripsi' => $this->input->post('TanggalSkripsi'),
		'JamSkripsi'=> $this->input->post('JamProp'),
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
   $this->m_data_topik->delete($NIM);
 
   $this->load->helper('url');
   redirect('jadwal','refresh');
}



}


