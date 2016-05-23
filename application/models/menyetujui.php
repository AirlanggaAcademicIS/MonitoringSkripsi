<?php
class Menyetujui extends CI_Model {
  
 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }
     
    function m_lihat(){
        /*$lihat = $this->db->get('mahasiswa');// mengambil semua data dari tabel mahasiswa
         
        return $lihat->result();// mengembalikan ke controller hasil dari query ke table data_barang
		$sql ="SELECT  NIM, Nama FROM mahasiswa";
		  
		  $query = $this->db->query($sql);
        $i = 0;
        foreach ($query->result_array() as $row)
         {
			$user[$i]['NIM'] = $row['NIM'];
            $user[$i]['Nama'] = $row['Nama'];
			$i++;
        }
		print_r($user);
        return $user;*/
		$query = $this->db->get("mahasiswa");
		return $query->result();
    }
	 /*
 	function select($atribut) {
	$this->db->select('mahasiswa',$atribut);
   return true;
	}
	function getSelect($NIM){
	$this->db->where('NIM',$NIM); 
	$query = $this->db->get('mahasiswa');
	return $query->result();
	}
	function select($atribut,$NIM){
	$this->db->where('NIM',$NIM);
	$this->db->update('mahasiswa',$atribut);
   return true;
   } */
}
