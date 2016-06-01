<?php

class Prodimodel extends CI_Model{
    
    var $NIM;
    var $Nama;
    var $Alamat;
    var $Telp;
    var $Email;
    var $Pass;
    var $Prodi;
    
    function __construct() {
          parent::__construct();
			$this->load->database();
      }
      
    function getNIM() {
        return $this->NIM;
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

    function setNIM($NIM) {
        $this->NIM = $NIM;
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
      
      function getAllMahasiswa(){
          return $this->db->query("SELECT * FROM `mahasiswa`");
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
     function getsemuamahasiswa(){
		 $sql ="SELECT  NIM, Nama, Alamat, Email, Telp, Pass, Prodi FROM mahasiswa";
		  
		  $query = $this->db->query($sql);
        $i = 0;
        foreach ($query->result_array() as $row)
         {
			$user[$i]['NIM'] = $row['NIM'];
            $user[$i]['Nama'] = $row['Nama'];
            $user[$i]['Alamat'] = $row['Alamat'];
			$user[$i]['Email'] = $row['Email'];
                        $user[$i]['Telp'] = $row['Telp'];
                        $user[$i]['Pass'] = $row['Pass'];
                        $user[$i]['Prodi'] = $row['Prodi'];
			$i++;
        }
        return $user;
		  
		  }
}
