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
/*	function getBimbingan($NIM){
          return $this->db->get_where('menyetujuibimbingan', array('NIM' => $NIM))->row();
      }
      
      function getAllBimbingan(){
          return $this->db->query("SELECT * FROM `mahasiswa`");
      }
public function insert_tambahan($NIM, $Nama, $Judul, $Persetujuan){
          $data = array (
		  'NIM' => $NIM,
		  'Nama' => $Nama,
		  'Judul' => $Judul,
		  'persetujuan' => $Persetujuan
		  );
		  $this->db->select('menyetujui',$data);
      }
     function getsemuabimbingan(){
		 $sql ="SELECT  NIM, Nama FROM mahasiswa";
		  
		  $query = $this->db->query($sql);
        $i = 0;
        foreach ($query->result_array() as $row)
         {
			$user[$i]['NIM'] = $row['NIM'];
            $user[$i]['Nama'] = $row['Nama'];
            $user[$i]['Judul'] = $row['Judul'];
			$user[$i]['persetujuan'] = $row['Persetujuan'];
			$i++;
        }
        return $user;
		  
		  }	*/
}
