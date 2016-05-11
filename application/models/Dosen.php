<?php
   class Dosen extends CI_Model {
      /* Member variables */
      var $nik;
      var $nama;
      var $IDKBK;
      var $idtahunajar;
      var $alamat;
      var $telepon;
      var $email;
      var $password;
      
      function __construct() {
          parent::__construct();
      }
      
      /* Member functions */
      
      function getNik() {
          return $this->nik;
      }

      function getNama() {
          return $this->nama;
      }

      function getIDKBK() {
          return $this->IDKBK;
      }

      function getIdtahunajar() {
          return $this->idtahunajar;
      }

      function getAlamat() {
          return $this->alamat;
      }

      function getTelepon() {
          return $this->telepon;
      }

      function getEmail() {
          return $this->email;
      }

      function getPassword() {
          return $this->password;
      }

      function setNik($nik) {
          $this->nik = $nik;
      }

      function setNama($nama) {
          $this->nama = $nama;
      }

      function setIDKBK($IDKBK) {
          $this->IDKBK = $IDKBK;
      }

      function setIdtahunajar($idtahunajar) {
          $this->idtahunajar = $idtahunajar;
      }

      function setAlamat($alamat) {
          $this->alamat = $alamat;
      }

      function setTelepon($telepon) {
          $this->telepon = $telepon;
      }

      function setEmail($email) {
          $this->email = $email;
      }

      function setPassword($password) {
          $this->password = $password;
      }
      
      function getDosen($NIK){
          return $this->db->query("SELECT * FROM `dosen` WHERE NIK = "+$NIK)->result_array();
      }
      
      function getAllDosen(){
          return $this->db->query("SELECT * FROM `dosen`")->result_array();
      }


   }
?>