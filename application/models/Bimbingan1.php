<?php

class Bimbingan1 extends CI_Model{
    
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
          return $this->db->query("SELECT * FROM `bimbingan`");
      }
public function insert_tambahan($Subjek, $Tanggal){
          $data = array (
		  'Subjek' => $Subjek,
		  'Tanggal' => $Tanggal,
		  );
		  $this->db->insert('bimbingan',$data);
      }
    
}
