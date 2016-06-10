<?php
class M_mahasiswadosbing extends CI_Model {
  
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
   $this->db->insert('dosen',$param);
   return true;
}
 
function getEdit($NIK){
   $this->db->where('NIK',$NIK);
   $query = $this->db->get('dosen');
 
   return $query->result();
}
 
function edit($param,$NIK){
   $this->db->where('NIK',$NIK);
   $this->db->update('dosen',$param);
   return true;
}
function delete($NIK){
   $this->db->where('NIK',$NIM);
   $this->db->delete('dosen');
}

   function getsemuamahadosbing($NIK){
		 //$sql ="SELECT * from mahasiswa";
       
       $sql ="SELECT q1.NIM, q3.Nama, q1.Judul, q1.TanggalSkripsi, q1.TanggalProp, q1.TanggalTopik FROM skripsi as q1, mahasiswa as q3 WHERE (q1.NIK1='".$NIK."' OR q1.NIK2='".$NIK."') AND q1.NIM=q3.NIM";
		  
		  $query = $this->db->query($sql);
        $i = 0;
        foreach ($query->result_array() as $row)
         {
			$user[$i]['NIM'] = $row['NIM'];
            $user[$i]['nama'] = $row['Nama'];
            $user[$i]['judul'] = $row['Judul'];
			if($row['TanggalSkripsi'] != 0000-00-00){
				$user[$i]['status'] = "Lulus";			
			}
			else if($row['TanggalProp'] != 0000-00-00){
				$user[$i]['status'] = "Skripsi";			
			}
			else if($row['TanggalTopik'] != 0000-00-00){
				$user[$i]['status'] = "Proposal";			
			}
			else {
				$user[$i]['status'] = "Belum usulan topik";
            }
			
        $i++;}
        return $user;
		  
		  
}
}