<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends CI_Controller {
        
        function __construct(){
            parent::__construct();
            $this->load->model('Dosen');
            $this->load->model('Membimbing');
            $this->load->library('table');
        }
        
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	
	public function index()
	{
		$this->load->view('laporan_page');
	}
	public function minatkbk()
	{
		$this->load->view('laporan_minatkbk_page');
	}
	public function jenis_kbk()
	{
		$option = $this->input->post('jenis_laporan');
		
		if($option==0)$this->load->view('laporan_minatkbk_page');
		else if($option==1)$this->load->view('laporan_tanggungandosen_page');
		else if($option==2)$this->load->view('laporan_statusmhs_page');
		
	}
        
//        function getData(){
//            $this->arrayDosen = $this->db->query('SELECT * FROM `dosen`');
//            while($row = mysql_fetch_array($this->arrayDosen, MYSQL_NUM)){    
//                echo "ID KARYAWAN :{$row[0]}  <br> ".
//                    "NAMA KARYAWAN : {$row[1]} <br> ".
//                    "GAJI KARYAWAN : {$row[2]} <br> ".
//                    "--------------------------------<br>";
//            }
//        }
        
        function view($page = 'laporan'){
            
//            // When I navigate to any_laporan
//            if(isset($_POST['laporan'])) {
//            
//                $arrayDosen = array();
//                $ydata = array();
//                
//                // Then I should see laporan_data
//                switch($_POST['laporan']){
//                    case 1 : echo "Tabel dan Grafik : Performa Dosen Pembimbing";
//                        $this->getData();
//                        break;
//                    case 2 : echo "Tabel dan Grafik : KBK";
//                        showLaporan($_POST['laporan'],$dosen,$ydata);
//                        break;
//                    case 3 : echo "Tabel dan Grafik : Skripsi Khusus";
//                        showLaporan($_POST['laporan'],$dosen,$ydata);
//                        break;
//                }
//                
//            }
            
        }        
}