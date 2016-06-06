<?php
class M_data_jadwal extends CI_Model {
  
 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
     
function list_data(){
        $query = $this->db->get('jadwal');// mengambil semua data dari tabel jadwal
         
        return $query->result();// mengembalikan ke controller hasil dari query ke table jadwal
    }
	
function input($param){
   $this->db->insert('jadwal',$param);
   return true;
}
 
function getEdit($NIM){
   $this->db->where('NIM',$NIM);
   $query = $this->db->get('jadwal');
 
   return $query->result();
}
 
function edit($param,$NIM){
   $this->db->where('NIM',$NIM);
   $this->db->update('jadwal',$param);
   return true;
}
function delete($NIM){
   $this->db->where('NIM',$NIM);
   $this->db->delete('jadwal');
}

public function getDosen(){
		$query =  $this->db->get('dosen');
		return $query->result();
		}	

public function getSkripsi(){
		$query =  $this->db->get('skripsi');
		return $query->result();
		}	
	
		
 
}
