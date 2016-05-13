<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of oMahasiswa
 *
 * @author IvenM
 */
class Mahasiswa extends CI_Model{
    /* Member variables */
      var $NIM;
      var $Nama;
      var $Alamat;
      var $Telepon;
      var $Email;
      var $Password;
      var $Prodi;
      
      function __construct() {
          parent::__construct();
      }
      /* Member functions */
      
      function getNIM() {
          return $this->NIM;
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

      function setNIM($NIM) {
          $this->NIM = $NIM;
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

            
      /*
       * Database Method 
       */
      
      function getMahasiswa($NIM){
          return $this->db->get_where('mahasiswa', array('NIM' => $NIM))->row();
      }
      
      function getAllMahasiswa(){
          return $this->db->query("SELECT * FROM `mahasiswa`")->result_array();
      }

}
