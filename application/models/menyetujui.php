<?php
class Menyetujui extends CI_Model {
  
 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }
     
    function m_lihat(){
        
		$query = $this->db->get("mahasiswa");
		return $query->result();
    }	
	function tampil(){
        
		$query = $this->db->get("skripsi");
		return $query->result();
    }	

}
