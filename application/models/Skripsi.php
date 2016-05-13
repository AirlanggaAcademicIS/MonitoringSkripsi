<?php
   class Skripsi extends CI_Model{
      /* Member variables */
      var $id_skripsi;
      var $Tanggal;
      var $KBK;
      var $Topik;
      var $NIM;
      var $NIK1;
      var $NIK2;
      var $TahunAjar;
      var $TanggalTopik;
      var $TanggalProposal;
      var $TanggalSkripsi;
      
      function __construct() {
          parent::__construct();
      }
      /* Member functions */
      
      function getId_skripsi() {
          return $this->id_skripsi;
      }

      function getJudul() {
          return $this->Judul;
      }

      function getKBK() {
          return $this->KBK;
      }

      function getTopik() {
          return $this->Topik;
      }

      function getNIM() {
          return $this->NIM;
      }

      function getNIK1() {
          return $this->NIK1;
      }

      function getNIK2() {
          return $this->NIK2;
      }

      function getTahunAjar() {
          return $this->TahunAjar;
      }

      function getTanggalTopik() {
          return $this->TanggalTopik;
      }

      function getTanggalProposal() {
          return $this->TanggalProposal;
      }

      function getTanggalSkripsi() {
          return $this->TanggalSkripsi;
      }

      function setId_skripsi($id_skripsi) {
          $this->id_skripsi = $id_skripsi;
      }

      function setJudul($Judul) {
          $this->Judul = $Judul;
      }

      function setKBK($KBK) {
          $this->KBK = $KBK;
      }

      function setTopik($Topik) {
          $this->Topik = $Topik;
      }

      function setNIM($NIM) {
          $this->NIM = $NIM;
      }

      function setNIK1($NIK1) {
          $this->NIK1 = $NIK1;
      }

      function setNIK2($NIK2) {
          $this->NIK2 = $NIK2;
      }

      function setTahunAjar($TahunAjar) {
          $this->TahunAjar = $TahunAjar;
      }

      function setTanggalTopik($TanggalTopik) {
          $this->TanggalTopik = $TanggalTopik;
      }

      function setTanggalProposal($TanggalProposal) {
          $this->TanggalProposal = $TanggalProposal;
      }

      function setTanggalSkripsi($TanggalSkripsi) {
          $this->TanggalSkripsi = $TanggalSkripsi;
      }

      /*
       * Database Method Caller
       */
      
      function getSkripsi($id){
          return $this->db->get_where('skripsi', array('id_skripsi' => $id))->row();
      }
      
      function getAllSkripsi(){
          return $this->db->query("SELECT * FROM `skripsi`")->result_array();
      }

   }
?>
