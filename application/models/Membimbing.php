<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of oMembimbing
 *
 * @author IvenM
 */
class Membimbing extends CI_Model{
    /* Member variables */
      var $idSkripsi;
      var $nik;
      var $subjek;
      var $jenis;
      var $persetujuan;
      
      function __construct() {
          parent::__construct();
      }
      
      /* Member functions */
      function getIdSkripsi() {
          return $this->idSkripsi;
      }

      function getNik() {
          return $this->nik;
      }

      function getSubjek() {
          return $this->subjek;
      }

      function getJenis() {
          return $this->jenis;
      }

      function getPersetujuan() {
          return $this->persetujuan;
      }

      function setIdSkripsi($idSkripsi) {
          $this->idSkripsi = $idSkripsi;
      }

      function setNik($nik) {
          $this->nik = $nik;
      }

      function setSubjek($subjek) {
          $this->subjek = $subjek;
      }

      function setJenis($jenis) {
          $this->jenis = $jenis;
      }

      function setPersetujuan($persetujuan) {
          $this->persetujuan = $persetujuan;
      }

      function getAllMembimbing(){
          return $this->db->query("SELECT * FROM `membimbing`")->result_array();
      }
      
}
