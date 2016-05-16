<?php
class M_data_topik extends CI_Model {
  
 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
     
    function list_data(){
        $query = $this->db->get('skripsi');// mengambil semua data dari tabel skripsi
         
        return $query->result();// mengembalikan ke controller hasil dari query ke table skripsi
    }
	
	function input($param){
   $this->db->insert('skripsi',$param);
   return true;
}
 
function getEdit($NIM){
   $this->db->where('NIM',$NIM);
   $query = $this->db->get('skripsi');
 
   return $query->result();
}
 
function edit($param,$NIM){
   $this->db->where('NIM',$NIM);
   $this->db->update('skripsi',$param);
   return true;
}
function delete($NIM){
   $this->db->where('NIM',$NIM);
   $this->db->delete('skripsi');
}

 
}
