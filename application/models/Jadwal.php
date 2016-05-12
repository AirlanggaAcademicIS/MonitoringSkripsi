<?php
   class Jadwal extends CI_Model {
      /* Member variables */
      var $id_jadwal;
      var $Tanggal;
      var $Pukul;
      var $Topik;
      var $NIK1; // penguji 1
      var $NIK2; // penguji 2
      var $Jenis;
      
      function __construct() {
          parent::__construct();
      }
      
      /* Member functions */
      
      function getId_jadwal() {
          return $this->id_jadwal;
      }

      function getTanggal() {
          return $this->Tanggal;
      }

      function getPukul() {
          return $this->Pukul;
      }

      function getTopik() {
          return $this->Topik;
      }

      function getNIK1() {
          return $this->NIK1;
      }

      function getNIK2() {
          return $this->NIK2;
      }

      function getJenis() {
          return $this->Jenis;
      }

      function setId_jadwal($id_jadwal) {
          $this->id_jadwal = $id_jadwal;
      }

      function setTanggal($Tanggal) {
          $this->Tanggal = $Tanggal;
      }

      function setPukul($Pukul) {
          $this->Pukul = $Pukul;
      }

      function setTopik($Topik) {
          $this->Topik = $Topik;
      }

      function setNIK1($NIK1) {
          $this->NIK1 = $NIK1;
      }

      function setNIK2($NIK2) {
          $this->NIK2 = $NIK2;
      }

      function setJenis($Jenis) {
          $this->Jenis = $Jenis;
      }

            
      /*
       * Database Method
       */
      
      function getDosen($NIK){
          return $this->db->get_where('dosen', array('NIK' => $NIK))->row();
      }
      
      function getAllDosen(){
          return $this->db->query("SELECT * FROM `dosen`")->result_array();
      }


   }
?>