<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi_fix4 extends CI_Controller {

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
//            $this->load->view('header');
            $this->load->view('Prodi_Home');
//            $this->load->view('footer');
	}
	public function mahasiswa_page()
	{
		$this->load->view('prodi/daftar_mahasiswa_fix');
	}
        public function dosen_page()
	{
		$this->load->view('prodi/daftar_dosen_fix');
	}
	public function tambah_mahasiswa_page()
	{
		$this->load->view('prodi/tambah_mahasiswa_fix');
	}
        public function tambah_dosen_page()
	{
		$this->load->view('prodi/tambah_dosen_fix');
	}
	public function mahasiswa_insert()
	{
		$NIM=$this->input->post('NIM');
		$Nama=$this->input->post('Nama');
		$Alamat=$this->input->post('Alamat');
	        $Telp=$this->input->post('Telp');
		$Email=$this->input->post('Email');
                $Pass=$this->input->post('Pass');
                $Prodi=$this->input->post('Prodi');
                
                $this->load->database();
                $this->load->model('Prodimodel');
		$this->Prodimodel->insert_tambah($NIM, $Nama, $Alamat, $Telp, $Email, $Pass, $Prodi) ;
		
		$allmahasiswa = $this->Prodimodel->getsemuamahasiswa();
		$data = array(
			'jumlah'=>sizeof($allmahasiswa),
			'isitabel'=>$allmahasiswa
			);
			
		$this->load->view('prodi/daftar_mahasiswa_fix',$data);
        }
		
        public function dosen_insert()
	{
		$NIK=$this->input->post('NIK');
		$Nama=$this->input->post('Nama');
		$Alamat=$this->input->post('Alamat');
	        $Telp=$this->input->post('Telp');
		$Email=$this->input->post('Email');
		$Pass=$this->input->post('Pass');
                $Prodi=$this->input->post('Prodi');
                $KBK=$this->input->post('KBK');
                $TahunAjar=$this->input->post('TahunAjar');
                
                
                $this->load->database();
                $this->load->model('Prodimodel');
		$this->Prodimodel->insert_tambah2($NIK, $Nama, $Alamat, $Email, $Telp, $Pass, $Prodi, $KBK, $TahunAjar) ;
		
		$alldosen = $this->Prodimodel->getsemuadosen();
		$data = array(
			'jumlah'=>sizeof($alldosen),
			'isitabel'=>$alldosen
			);
			
		$this->load->view('prodi/daftar_dosen_fix',$data);
        }
       
		
		public function mahasiswatabel()
	{
			
		$this->load->model('Prodimodel');
		
		$allbimbingan = $this->Prodimodel->getsemuamahasiswa();
		$data = array(
			'jumlah'=>sizeof($allbimbingan),
			'isitabel'=>$allbimbingan
			);
			
		$this->load->view('prodi/daftar_mahasiswa_fix',$data);
		
	} 
	public function dosentabel(){
			
		$this->load->model('Prodimodel');
		
		$allbimbingan = $this->Prodimodel->getsemuadosen();
		$data = array(
			'jumlah'=>sizeof($allbimbingan),
			'isitabel'=>$allbimbingan
			);
			
		$this->load->view('prodi/daftar_dosen_fix',$data);
		
	} 
        function do_upload(){
            $this->load->helper(array('form', 'url')); 
            $config['upload_path']   = './uploads/'; 
            $config['allowed_types'] = 'gif|jpg|png'; 
            $config['max_size']      = 100; 
            $config['max_width']     = 1024; 
            $config['max_height']    = 768;  
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile')) {
                echo 'test11';
               $error = array('error' => $this->upload->display_errors()); 
               echo 'test12';
//               $this->load->view('upload_form', $error); 
            }

            else { 
                echo 'test21';
               $data = array('upload_data' => $this->upload->data()); 
               fromExcelDosen($data[4][2]);
               echo 'test22';
//               $this->load->view('upload_success', $data); 
            } 
        }
        
        function fromExcelDosen($x){
            echo $x;
            $file = $x;
            //load the excel library
            $this->load->library('excel');
            //read file from path
            $objPHPExcel = PHPExcel_IOFactory::load($file);
            //get only the Cell Collection
            $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
            //extract to a PHP readable array format
            foreach ($cell_collection as $cell) {
                $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
                //header will/should be in row 1 only. of course this can be modified to suit your need.
                if ($row == 1) {
                    $header[$row][$column] = $data_value;
                } else {
                    $arr_data[$row][$column] = $data_value;
                }
            }
            //send the data in an array format
            $data['header'] = $header;
            $data['values'] = $arr_data;

        }
        
        function toExcelDosen(){
             //load our new PHPExcel library
            $this->load->library('excel');
            //activate worksheet number 1
            $this->excel->setActiveSheetIndex(0);
            //name the worksheet
            $this->excel->getActiveSheet()->setTitle('Users list');

            // load database
            $this->load->database();

            // load model
            $this->load->model('Prodimodel');
            // get all users in array formate
            $users = $this->Prodimodel->getsemuadosen();
            // read data to active sheet
            $this->excel->getActiveSheet()->fromArray($users);

            $filename='Dosen Prodi SI.xls'; //save our workbook as this file name

            header('Content-Type: application/vnd.ms-excel'); //mime type
            header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
            header('Cache-Control: max-age=0'); //no cache

            //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
            //if you want to save it as .XLSX Excel 2007 format

            $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');

            //force user to download the Excel file without writing it to server's HD
            $objWriter->save('php://output');

        }
        
    }