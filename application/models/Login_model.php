<?php

class Login_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }
    function validate($where){
      $query = $this->db->get_where('mahasiswa', $where);
      return $query;
    }

}
