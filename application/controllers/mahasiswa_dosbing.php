<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//nama class harus diawali dengan kapital, walaupun nama file semua kecil
class Mahasiswa_dosbing extends CI_Controller {
 
 public function index()
 {
     
     
    $this->load->view('Dosen_Pembimbing_Home');//memanggil view yang nanti kita akan buat dan memasukan $data dari model tadi 
     
 }
 
 public function Input()
{
      $this->load->helper('form');//memanggil helper form nanti penggunaannya di v_form_topik.php
      $data['type']="INPUT";// definisi type, karena nanti juga ada edit
      $this->load->view('mahasiswa_dosen_pembimbing',$data);// memanggil view v_form_topik.php
}

public function Edit()
{
      $this->load->helper('form');//memanggil helper form nanti penggunaannya di v_input_produk.php
  
      $this->load->database();//memanggil pengaturan database dan mengaktifkannya
      $this->load->model('m_data_topik');//memanggil model m_data_topik.php
  
      $NIM= $this->input->get('skripsi');//mengambil param topik dari get
      $data['skripsi'] = $this->m_data_topik->getEdit($NIM);
      $data['type']="EDIT";// definisi type, karena nanti juga ada edit
      $this->load->view('v_form_topik',$data);// memanggil view v_form_topik.php
}


public function Post(){
     $this->load->database();//memanggil pengaturan database dan mengaktifkannya
     $this->load->model('m_Kuota');//memanggil model m_data_topik.php
 
     //mengambil data dari post memasukan ke array agar lebih mudah 
     $param = array(
	  'Tanggal' => $this->input->post('Tanggal'),
       'TahunAjar' => $this->input->post('TahunAjar'),
	   'NIM' => $this->input->post('NIM'),
       'Nama' => $this->input->post('Nama'),
       'KBK' => $this->input->post('KBK'),
       'Topik'=> $this->input->post('Topik'),
	   'Judul' => $this->input->post('Judul'),
       'DosenPembimbing1' => $this->input->post('DosenPembimbing1'),
	   'DosenPembimbing2' => $this->input->post('DosenPembimbing2'),
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
   $this->load->model('m_Kuota');//memanggil model m_data_topik.php
   $NIM= $this->input->get('dosen');
   $this->m_data_topik->delete($NIM);
 
   $this->load->helper('url');
   redirect('skripsi','refresh');
 }
    
public function kuotatabel()
	{
		
		$this->load->model('m_Mahasiswadosbing');
		$allkuota = $this->m_Kuota->getsemuakuota();
		$data = array(
			'jumlah'=>sizeof($allkuota),
			'isitabel'=>$allkuota
			);
			
		$this->load->view('mahasiswa_dosen_pembimbing/mahasiswa_dosen_pembimbing',$data);
		
	}
    
    
    public function mahasiswabimbingan(){
       
		$this->load->model('m_Mahasiswadosbing');
		$NIK = $this->session->userdata('nik');
		
		$mhsbim = $this->m_Mahasiswadosbing->getsemuamahadosbing($NIK);
		$data = array(
			'jumlah'=>sizeof($mhsbim),
			'isitabel'=> $mhsbim
			);
			
		$this->load->view('mahasiswa_dosen_pembimbing/mahasiswa_dosen_pembimbing',$data);
	}
        
    }





