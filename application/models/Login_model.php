<?php

class Login_model extends CI_Model{
    function __construct(){
      parent::__construct();
    }
    
    function validate($table,$where){
      $query = $this->db->get_where($table, $where);
      return $query;
    }
    
    function getRoles($jabatan){
        $sql = "SELECT id_roles FROM `roles` WHERE Jabatan='".$jabatan."'";
    	$query = $this->db->query($sql);
        return $query->result_array();
    }

}
