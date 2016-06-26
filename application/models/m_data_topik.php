<?php
class M_data_topik extends CI_Model {
 protected $_per_page = 10;
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
  return $this->db->update('skripsi',$param); 
  
}

function delete($NIM){
   $this->db->where('NIM',$NIM);
   $this->db->delete('skripsi');
}

public function getMHS(){
		$query =  $this->db->get('mahasiswa');
		return $query->result();
		}
		
public function getDosen(){
		$query =  $this->db->get('dosen');
		return $query->result();
		}	
			
function getKuota($Nama){
		 $sql ="SELECT Kuota FROM dosen where Nama=".$Nama;
		  
		$query = $this->db->query($sql);
  // 		$this->db->update('dosen',$param);
       
        return $query;
		  
		  }


function setKuota($NIK,$kuota){
    	$sql ="Update dosen set kuota=".$kuota. "where NIK=".$NIK;
		  
		$query = $this->db->query($sql);
//   		$this->db->update('dosen',$param);
       
        return $query;
		  
		  }
		  
function KuotaTahunAjar($TahunAjar){
    	$sql ="SELECT Kuota FROM tahunajar where TahunAjar=".$TahunAjar;
		  
		$query = $this->db->query($sql);
foreach ($query->result_array() as $row){
	$kuota=$row['Kuota'];
}
       
        return $kuota;
		  
		  }

}
