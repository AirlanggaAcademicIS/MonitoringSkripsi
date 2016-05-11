<?php
   class Skripsi extends CI_Model{
      /* Member variables */
      var $idSkripsi;
      var $idKBK;
      var $judul;
      var $nim;
      var $tglTopik;
      var $tglProposal;
      var $tglSkripsi;
      
      
      function __construct() {
          parent::__construct();
      }
      /* Member functions */
      
      function getIdSkripsi() {
          return $this->idSkripsi;
      }

      function getIdKBK() {
          return $this->idKBK;
      }

      function getJudul() {
          return $this->judul;
      }

      function getNim() {
          return $this->nim;
      }

      function getTglTopik() {
          return $this->tglTopik;
      }

      function getTglProposal() {
          return $this->tglProposal;
      }

      function getTglSkripsi() {
          return $this->tglSkripsi;
      }

      function setIdSkripsi($idSkripsi) {
          $this->idSkripsi = $idSkripsi;
      }

      function setIdKBK($idKBK) {
          $this->idKBK = $idKBK;
      }

      function setJudul($judul) {
          $this->judul = $judul;
      }

      function setNim($nim) {
          $this->nim = $nim;
      }

      function setTglTopik($tglTopik) {
          $this->tglTopik = $tglTopik;
      }

      function setTglProposal($tglProposal) {
          $this->tglProposal = $tglProposal;
      }

      function setTglSkripsi($tglSkripsi) {
          $this->tglSkripsi = $tglSkripsi;
      }

      function getSkripsi($id){
          return $this->db->query("SELECT * FROM `id_skripsi` WHERE id_skripsi = "+$id)->result_array();
      }
      
      function getAllSkripsi(){
          return $this->db->query("SELECT * FROM `id_skripsi`")->result_array();
      }

   }
?>