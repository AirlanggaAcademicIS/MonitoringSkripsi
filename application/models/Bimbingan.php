<?php

class Bimbingan extends CI_Model{
    
    var $id_bimbingan;
    var $id_skripsi;
    var $NIK;
    var $Subjek;
    var $Persetujuan;
    var $Jenis;
    var $Tanggal;
    
    function __construct() {
          parent::__construct();
			$this->load->database();
      }
      
    function getId_bimbingan() {
        return $this->id_bimbingan;
    }

    function getId_skripsi() {
        return $this->id_skripsi;
    }

    function getNIK() {
        return $this->NIK;
    }

    function getSubjek() {
        return $this->Subjek;
    }

    function getPersetujuan() {
        return $this->Persetujuan;
    }

    function getJenis() {
        return $this->Jenis;
    }

    function getTanggal() {
        return $this->Tanggal;
    }

    function setId_bimbingan($id_bimbingan) {
        $this->id_bimbingan = $id_bimbingan;
    }

    function setId_skripsi($id_skripsi) {
        $this->id_skripsi = $id_skripsi;
    }

    function setNIK($NIK) {
        $this->NIK = $NIK;
    }

    function setSubjek($Subjek) {
        $this->Subjek = $Subjek;
    }

    function setPersetujuan($Persetujuan) {
        $this->Persetujuan = $Persetujuan;
    }

    function setJenis($Jenis) {
        $this->Jenis = $Jenis;
    }

    function setTanggal($Tanggal) {
        $this->Tanggal = $Tanggal;
    }
    
    function getBimbingan($NIM){
          return $this->db->get_where('bimbingan', array('id_bimbingan' => $NIM))->row();
      }
      
      function getAllBimbingan(){
          return $this->db->query("SELECT * FROM `bimbingan`")->result_array();
      }
public function insert_tambahan($id_skripsi, $Subjek, $Tanggal, $Jenis, $NIK ,$Persetujuan){
          $data = array (
		  'id_skripsi'=> $id_skripsi,
		  'Subjek' => $Subjek,
		  'Tanggal' => $Tanggal,
		  'Jenis' => $Jenis,
		  'NIK' => $NIK,
		  'Persetujuan' => $Persetujuan);
		  
		 
		  $this->db->insert('bimbingan',$data);
      }
	  
     function getsemuabimbingan($NIM){
		// $sql ="SELECT q2.Nama, q1.Subjek, q1.Jenis, q1.Persetujuan, q1.Tanggal FROM bimbingan as q1, dosen as q2 where q1.NIK=q2.NIK ";
		$sql ="SELECT q2.Nama, q1.Subjek, q1.Jenis, q1.Persetujuan, q1.Tanggal, q3.id_skripsi FROM bimbingan as q1, dosen as q2, skripsi as q3 where q1.NIK=q2.NIK and q3.id_skripsi=q1.id_skripsi and q3.NIM=".$NIM."";
		  
		  $query = $this->db->query($sql);
        $i = 0;
        foreach ($query->result_array() as $row)
         {
			$user[$i]['tanggal'] = $row['Tanggal'];
            $user[$i]['nama'] = $row['Nama'];
            $user[$i]['subjek'] = $row['Subjek'];
			$user[$i]['jenis'] = $row['Jenis'];
			$user[$i]['persetujuan'] = $row['Persetujuan'];
			$i++;
        }
        return $user;
		  
		  }
		    
		   function getjenisbimbingan($jenis, $NIM){
		 $sql ="SELECT q2.Nama, q1.Subjek, q1.Jenis, q1.Persetujuan, q1.Tanggal, q3.id_skripsi FROM bimbingan as q1, dosen as q2, skripsi as q3 where q1.NIK=q2.NIK and q3.id_skripsi=q1.id_skripsi and q1.Jenis=".$jenis." and q3.NIM=".$NIM."";
		  
		  $query = $this->db->query($sql);
        $i = 0;
        foreach ($query->result_array() as $row)
         {
			$user[$i]['tanggal'] = $row['Tanggal'];
            $user[$i]['nama'] = $row['Nama'];
            $user[$i]['subjek'] = $row['Subjek'];
			$user[$i]['jenis'] = $row['Jenis'];
			$user[$i]['persetujuan'] = $row['Persetujuan'];
			$i++;
        }
            
        return $user;
		  
		  }
                  
                  
}
