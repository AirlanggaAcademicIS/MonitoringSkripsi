<?php
   class Skripsi extends CI_Model{
      /* Member variables */
      var $id_skripsi;
      var $Tanggal;
      var $KBK;
      var $Topik;
      var $NIM;
      var $NIK1;
      var $NIK2;
      var $TahunAjar;
      var $TanggalTopik;
      var $TanggalProposal;
      var $TanggalSkripsi;
      
      function __construct() {
          parent::__construct();
      }
      /* Member functions */
      
     function getId_skripsi($nim) {
	    $sql = "SELECT id_skripsi, NIM FROM `skripsi` WHERE NIM='".$nim."'";
    	$query = $this->db->query($sql);
		foreach ($query->result_array() as $row)
		{
        	
			$users=$row['id_skripsi'];
           
		}
		 return $users;
      }

      function getJudul() {
          return $this->Judul;
      }

      function getKBK() {
          return $this->KBK;
      }

      function getTopik() {
          return $this->Topik;
      }

      function getNIM() {
          return $this->NIM;
      }

      function getNIK1() {
          return $this->NIK1;
      }

      function getNIK2() {
          return $this->NIK2;
      }

      function getTahunAjar() {
          return $this->TahunAjar;
      }

      function getTanggalTopik() {
          return $this->TanggalTopik;
      }

      function getTanggalProposal() {
          return $this->TanggalProposal;
      }

      function getTanggalSkripsi() {
          return $this->TanggalSkripsi;
      }

      function setId_skripsi($id_skripsi) {
          $this->id_skripsi = $id_skripsi;
      }

      function setJudul($Judul) {
          $this->Judul = $Judul;
      }

      function setKBK($KBK) {
          $this->KBK = $KBK;
      }

      function setTopik($Topik) {
          $this->Topik = $Topik;
      }

      function setNIM($NIM) {
          $this->NIM = $NIM;
      }

      function setNIK1($NIK1) {
          $this->NIK1 = $NIK1;
      }

      function setNIK2($NIK2) {
          $this->NIK2 = $NIK2;
      }

      function setTahunAjar($TahunAjar) {
          $this->TahunAjar = $TahunAjar;
      }

      function setTanggalTopik($TanggalTopik) {
          $this->TanggalTopik = $TanggalTopik;
      }

      function setTanggalProposal($TanggalProposal) {
          $this->TanggalProposal = $TanggalProposal;
      }

      function setTanggalSkripsi($TanggalSkripsi) {
          $this->TanggalSkripsi = $TanggalSkripsi;
      }
	  
	  function getkbkalltahun($jenisKBK){
		 $sql ="SELECT q2.Nama, q1.NIM, q1.KBK, q1.TahunAjar, q1.Judul, q1.TanggalTopik, q1.TanggalProp, q1.TanggalSkripsi FROM skripsi as q1, mahasiswa as q2 where q1.NIM=q2.NIM and q1.KBK =".$jenisKBK." ";
		  
		  $query = $this->db->query($sql);
        $i = 0;
        foreach ($query->result_array() as $row)
         {
        	$user[$i]['nama'] = $row['Nama'];
            $user[$i]['nim'] = $row['NIM'];
            $user[$i]['kbk'] = $row['KBK'];
			$user[$i]['tahunajar'] = $row['TahunAjar'];
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
            $i++;
        }
        return $user;
		  
		  }
		  
		  function getallkbktahun($tahun){
		 $sql ="SELECT q2.Nama, q1.NIM, q1.KBK, q1.TahunAjar, q1.Judul, q1.TanggalTopik, q1.TanggalProp, q1.TanggalSkripsi FROM skripsi as q1, mahasiswa as q2 where q1.NIM=q2.NIM and q1.TahunAjar =".$tahun." ";
		  
		  $query = $this->db->query($sql);
        $i = 0;
        foreach ($query->result_array() as $row)
         {
        	$user[$i]['nama'] = $row['Nama'];
            $user[$i]['nim'] = $row['NIM'];
            $user[$i]['kbk'] = $row['KBK'];
			$user[$i]['tahunajar'] = $row['TahunAjar'];
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
            $i++;
        }
        return $user;
		  
		  }
		  
		  
		    function getallkbkalltahun(){
		  $query = $this->db->query(' SELECT q2.Nama, q1.NIM, q1.KBK, q1.TahunAjar, q1.Judul, q1.TanggalTopik, q1.TanggalProp, q1.TanggalSkripsi FROM skripsi as q1, mahasiswa as q2 where q1.NIM=q2.NIM');
        $i = 0;
        foreach ($query->result_array() as $row)
        {
        	$user[$i]['nama'] = $row['Nama'];
            $user[$i]['nim'] = $row['NIM'];
            $user[$i]['kbk'] = $row['KBK'];
			$user[$i]['tahunajar'] = $row['TahunAjar'];
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
            $i++;
        }
        return $user;
		 }
		 
		 function getkbktahun($jenisKBK, $tahun){
		 $sql ="SELECT q2.Nama, q1.NIM, q1.KBK, q1.TahunAjar, q1.Judul, q1.TanggalTopik, q1.TanggalProp, q1.TanggalSkripsi FROM skripsi as q1, mahasiswa as q2 where q1.NIM=q2.NIM and q1.TahunAjar =".$tahun." and q1.KBK=".$jenisKBK." ";
		  
		  $query = $this->db->query($sql);
        $i = 0;
        foreach ($query->result_array() as $row)
         {
        	$user[$i]['nama'] = $row['Nama'];
            $user[$i]['nim'] = $row['NIM'];
            $user[$i]['kbk'] = $row['KBK'];
			$user[$i]['tahunajar'] = $row['TahunAjar'];
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
            $i++;
        }
        return $user;
		  
		  }
		  
function getnik1nik2($nim){
			$sql = "SELECT NIK1, NIK2 FROM `skripsi` WHERE NIM='".$nim."'";
    	$query = $this->db->query($sql);
		
		foreach ($query->result_array() as $row)
		{
        	$users['nik1']=$row['NIK1'];
            $users['nik2']=$row['NIK2'];
		}
        
       return $users;
		}
		
		function getnikk(){
			$sql = "SELECT NIK FROM `bimbingan`";
    	$query = $this->db->query($sql);
		
		foreach ($query->result_array() as $row)
		{
        	$users['nik']=$row['NIK'];
           
		}
        
       return $users;
		}
		  /*
       * Database Method Caller
       */
      
      function getSkripsi($id){
          return $this->db->get_where('skripsi', array('id_skripsi' => $id))->row();
      }
      
      function getAllSkripsi(){
          return $this->db->query("SELECT * FROM `skripsi`")->result_array();
      }

      function getSkripsiMhs($NIM){
          return $this->db->get_where('skripsi', array('NIM' => $NIM))->row();
      }
      
      
      function gettanggaskripsi($nim){
			$sql = "SELECT * FROM `skripsi` WHERE NIM='".$nim."'";
    	$query = $this->db->query($sql);
		
		foreach ($query->result_array() as $row)
		{
        	$users['TanggalTopik']=$row['TanggalTopik'];
            $users['TanggalProp']=$row['TanggalProp'];
		}
        
       return $users;
		}

   }
?>
