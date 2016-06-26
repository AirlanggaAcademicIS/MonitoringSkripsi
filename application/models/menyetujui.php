<?php
class Menyetujui extends CI_Model {
  
 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
    }
     
    public function ubah_status_bimbingan($id, $status)
    {
        if ($status == '0') {
            $this->db->set('Persetujuan', '1');
        } else {
            $this->db->set('Persetujuan', '0');
        }
        $this->db->where('id', $id);
        return $this->db->update($this->_tabel);
    }

}
