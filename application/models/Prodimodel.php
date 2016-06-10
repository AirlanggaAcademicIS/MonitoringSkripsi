<?php

class Prodimodel extends CI_Model{
    
    var $NIM;
    var $NIK;
    var $Nama;
    var $Alamat;
    var $Telp;
    var $Email;
    var $Pass;
    var $Prodi;
    var $KBK;
    var $TahunAjar;
    
    function __construct() {
          parent::__construct();
			$this->load->database();
      }
      
    function getNIM() {
        return $this->NIM;
    }
    
    function getNIK() {
        return $this->NIK;
    }

    function getNama() {
        return $this->Nama;
    }

    function getAlamat() {
        return $this->Alamat;
    }

    function getTelp() {
        return $this->Telp;
    }

    function getEmail() {
        return $this->Email;
    }

    function getPass() {
        return $this->Pass;
    }

    function getProdi() {
        return $this->Prodi;
    }
    
    function getKBK() {
        return $this->KBK;
    }
    
    function getTahunAjar() {
        return $this->TahunAjar;
    }

    function setNIM($NIM) {
        $this->NIM = $NIM;
    }
    
    function setNIK($NIK) {
        $this->NIK = $NIK;
    }

    function setNama($Nama) {
        $this->Nama = $Nama;
    }

    function setAlamat($Alamat) {
        $this->Alamat = $Alamat;
    }

    function setTelp($Telp) {
        $this->Telp = $Telp;
    }

    function setEmail($Email) {
        $this->Email = $Email;
    }

    function setPass($Pass) {
        $this->Pass = $Pass;
    }

    function setProdi($Prodi) {
        $this->Prodi = $Prodi;
    
      }
      
    function setKBK($KBK) {
        $this->KBK = $KBK;
    }
    
    function setTahunAjar($TahunAjar) {
        $this->TahunAjar = $TahunAjar;
    }
    
      function getAllMahasiswa(){
          return $this->db->query("SELECT * FROM `Mahasiswa`");
      }
      
      function getAllDosen(){
          return $this->db->query("SELECT * FROM `Dosen`");
      }
public function insert_tambah($NIM, $Nama, $Alamat, $Telp ,$Email, $Pass, $Prodi){
          $data = array (
		  'NIM' => $NIM,
		  'Nama' => $Nama,
		  'Alamat' => $Alamat,
		  'Telp' => $Telp,
		  'Email' => $Email,
                  'Pass' => $Pass,
                  'Prodi' => $Prodi
		  );
		  $this->db->insert('mahasiswa',$data);
      }
  public function insert_tambah2($NIK, $Nama, $Alamat, $Telp ,$Email, $Pass, $Prodi, $KBK, $TahunAjar){
          $data = array (
		  'NIK' => $NIK,
		  'Nama' => $Nama,
		  'Alamat' => $Alamat,
		  'Telp' => $Telp,
		  'Email' => $Email,
                  'Pass' => $Pass,
                  'Prodi' => $Prodi,
                  'KBK' => $KBK,
                  'TahunAjar' => $TahunAjar
		  );
		  $this->db->insert('dosen',$data);
      }    
    function getsemuamahasiswa(){
		 $sql ="SELECT NIM, Nama, Alamat, Telp, Email, Prodi FROM mahasiswa";
		
		  
		  $query = $this->db->query($sql);
        $i = 0;
        foreach ($query->result_array() as $row)
         {
            $user[$i]['NIM'] = $row['NIM'];
			$user[$i]['nama'] = $row['Nama'];
            $user[$i]['alamat'] = $row['Alamat'];
			$user[$i]['telepon'] = $row['Telp'];
			$user[$i]['email'] = $row['Email'];
			$user[$i]['prodi'] = $row['Prodi'];
			$i++;
        }
        return $user;
		  
		  }
                  
        function getsemuadosen(){
		 $sql ="SELECT  Nama, NIK, Alamat, Email, Telp, Prodi, KBK, TahunAjar FROM Dosen";
		  
		  $query = $this->db->query($sql);
        $i = 0;
        foreach ($query->result_array() as $row)
         {
            $user[$i]['nama'] = $row['Nama'];
            $user[$i]['NIK'] = $row['NIK'];
            $user[$i]['alamat'] = $row['Alamat'];
			$user[$i]['email'] = $row['Email'];
			$user[$i]['prodi'] = $row['Prodi'];
                        $user[$i]['telepon'] = $row['Telp'];
                        $user[$i]['KBK'] = $row['KBK'];
			$i++;
        }
        return $user;
		  
		  }
}
