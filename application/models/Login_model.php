<?php

class Login_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }
    function validate($table,$where){
      $query = $this->db->get_where($table, $where);
      return $query;
    }

}
