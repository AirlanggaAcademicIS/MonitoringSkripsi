<?php
   class Dosen extends CI_Model {
      /* Member variables */
      var $NIK;
      var $Nama;
      var $Alamat;
      var $Telepon;
      var $Email;
      var $Password;
      var $Prodi;
      var $KBK;
      var $TahunAjar;
      
      function __construct() {
          parent::__construct();
      }
      
      /* Member functions */
      
      function getNIK() {
          return $this->NIK;
      }

      function getNama() {
          return $this->Nama;
      }

      function getAlamat() {
          return $this->Alamat;
      }

      function getTelepon() {
          return $this->Telepon;
      }

      function getEmail() {
          return $this->Email;
      }

      function getPassword() {
          return $this->Password;
      }

      function getProdi() {
          return $this->Prodi;
      }

      function getKBK() {
          return $this->KBK;
      }

      function getTahunAjar() {
          return $this->TahunAjar;
      }

      function setNIK($NIK) {
          $this->NIK = $NIK;
      }

      function setNama($Nama) {
          $this->Nama = $Nama;
      }

      function setAlamat($Alamat) {
          $this->Alamat = $Alamat;
      }

      function setTelepon($Telepon) {
          $this->Telepon = $Telepon;
      }

      function setEmail($Email) {
          $this->Email = $Email;
      }

      function setPassword($Password) {
          $this->Password = $Password;
      }

      function setProdi($Prodi) {
          $this->Prodi = $Prodi;
      }

      function setKBK($KBK) {
          $this->KBK = $KBK;
      }

      function setTahunAjar($TahunAjar) {
          $this->TahunAjar = $TahunAjar;
      }

            
      /*
       * Databse Method helper
       */
      
      function getDosen($NIK){
          return $this->db->get_where('dosen', array('NIK' => $NIK))->row();
      }
      
      function getAllDosen(){
          return $this->db->query("SELECT * FROM `dosen`")->result_array();
      }


   }
?>
