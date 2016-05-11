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
      var $nim;
      var $nama;
      var $password;
      var $alamat;
      var $telepon;
      var $email;
      
      function __construct() {
          parent::__construct();
      }
      /* Member functions */
      
      function getNim() {
          return $this->nim;
      }

      function getNama() {
          return $this->nama;
      }

      function getPassword() {
          return $this->password;
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

      function setNim($nim) {
          $this->nim = $nim;
      }

      function setNama($nama) {
          $this->nama = $nama;
      }

      function setPassword($password) {
          $this->password = $password;
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
      
      function getMahasiswa($NIM){
          return $this->db->query("SELECT * FROM `mahasiswa` WHERE NIM = "+$NIM)->result_array();
      }
      

      function getAllMahasiswa(){
          return $this->db->query("SELECT * FROM `mahasiswa`")->result_array();
      }

}
