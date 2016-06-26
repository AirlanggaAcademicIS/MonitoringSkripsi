<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login controller class
 */
class Login extends CI_Controller{
    
    function __construct(){
        parent::__construct();
    }
    
    public function index($msg = NULL){
        // Load our view to be displayed
        // to the user
        $data['msg'] = $msg;
        // $this->load->view('login_view', $data);
        $this->load->view('login/login', $data);

        if ($this->session->userdata('username') == 'mahasiswa') {
            redirect('mahasiswa');
        }
    }
    
    public function process(){
        $this->load->model('login_model');
        $this->load->model('Dosen');
        $this->load->model('Mahasiswa');
        $username =$this->input->post('username', TRUE);
        $password =$this->input->post('password', TRUE);
        /*
         * data = [NIM, PASS]
         * data = [NIK PASS]
         */
        $data = [
                'NIM' => $username,
                'Pass' => $password
        ];
        $result = $this->login_model->validate('mahasiswa',$data);
        if($result->num_rows() == 1){
            $mhs = $this->Mahasiswa->getMahasiswa($username);
            $this->session->set_userdata('as','Mahasiswa');
			$this->session->set_userdata('nim',$username);
            $this->session->set_userdata('Nama',$mhs->Nama);
            session_start();
            redirect('mahasiswa');
        } 
        
        /*
         * STAFF
         */
        
        $data = [
            'NIK' => $username,
            'Pass' => $password
        ];
        $result = $this->login_model->validate('dosen',$data);
        if($result->num_rows() == 1){
            // check if kaprodi
            $resultRoles = $this->login_model->getRoles('Kaprodi');
//            echo "<script>alert('".$resultRoles[0]['id_roles']."');history.go(-1);</script>";
            if($resultRoles[0]['id_roles'] == $username){
                // berarti Kaprodi
                $dosen = $this->Dosen->getDosen($username);
                $this->session->set_userdata('as','Kaprodi');
                $this->session->set_userdata('Nama',$dosen->Nama);
//                echo "<script>alert('Selamat datang Kaprodi');</script>";
                session_start();
                redirect('laporan');
            } else {
                // check if koorSkripsi
                $resultRoles = $this->login_model->getRoles('KoorSkripsi');
//            echo "<script>alert('".$resultRoles[0]['id_roles']."');history.go(-1);</script>";
            if($resultRoles[0]['id_roles'] == $username){
                    // berarti Kaprodi
                    $dosen = $this->Dosen->getDosen($username);
                    $this->session->set_userdata('as','KoorSkripsi');
                    $this->session->set_userdata('Nama',$dosen->Nama);
                    session_start();
                    redirect('data_topik');
                } else {
                    // check if TU
                    $resultRoles = $this->login_model->getRoles('TU');
//            echo "<script>alert('".$resultRoles[0]['id_roles']."');history.go(-1);</script>";
                    if($resultRoles[0]['id_roles'] == $username){    // berarti Kaprodi
                        $dosen = $this->Dosen->getDosen($username);
                        $this->session->set_userdata('as','TU');
                        $this->session->set_userdata('Nama',$dosen->Nama);
                        session_start();
                        redirect('prodi_fix4');
                    }
                }
                // login as usual dosen
                $dosen = $this->Dosen->getDosen($username);
                $this->session->set_userdata('as','Dosen');
                $this->session->set_userdata('Nama',$dosen->Nama);
                session_start();
                redirect('Dosen_pembimbing');
            }
            
             
        } else {
            // username atau password salah
//            redirect('login');
            echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
        }
        
        
//        $level =$this->input->post('level'); // ini ganti cari dulu di tabel
//        /*
//         * if validate mahasiswa
//         *  then level mahasiswa
//         * if validate kaprodi
//         *  then level kaprodi
//         *  untuk kaprodi di menu home laporan tambahkan menu pilihan
//         *  akses dosen biasa atau laporan
//         * 
//         * 
//         * gausah masuk2in level
//         */
//        $mahasiswa = [ 'NIM' => $username,
//                       'Pass' => $password
//                     ];
//        $kaprodi = [ 'NIK' => $username,
//                     'Pass' => $password
//                    ];
//        // Load the model
//        $this->load->model('login_model');
//        // sementara cek data mahasiswa
//
//        if($level == 'mahasiswa'){
//            $result = $this->login_model->validate('mahasiswa',$mahasiswa);
//        } elseif ($level == 'kaprodi') {
//            $result = $this->login_model->validate('dosen',$kaprodi);
//        } elseif ($level == 'dosen') {
//            $result = $this->login_model->validate('dosen',$kaprodi);            
//        } elseif ($level == 'koor') {
//            $result = $this->login_model->validate('dosen',$kaprodi);            
//        } elseif ($level == 'tu') {
//            $result = $this->login_model->validate('dosen',$kaprodi);            
//        }
//
//
//        // Now we verify the result
//        if($result->num_rows() == 1){
//            foreach ($result->result() as $sess) {
//                if($level == 'mahasiswa') {                    
//                    $sess_data['username'] = 'mahasiswa';
//                    $sess_data['nama'] = $sess->Nama;
//                    $sess_data['nim'] = $sess->NIM;
//                    $this->session->set_userdata('username','mahasiswa');
//                    $this->session->set_userdata($sess_data);
//                    session_start();
//                    redirect('mahasiswa');
//                }elseif($level == 'kaprodi') {                    
//                    $sess_data['username'] = 'kaprodi';
//                    $sess_data['nama'] = $sess->Nama;
//                    $sess_data['nik'] = $sess->NIK;
//                    $this->session->set_userdata('username','kaprodi');
//                    $this->session->set_userdata($sess_data);
//                    session_start();
//                    redirect('laporan');
//                }elseif($level == 'dosen') {                    
//                    $sess_data['username'] = 'dosen';
//                    $sess_data['nama'] = $sess->Nama;
//                    $sess_data['nik'] = $sess->NIK;
//                    $this->session->set_userdata('username','dosen');
//                    $this->session->set_userdata($sess_data);
//                    session_start();
//                    redirect('Dosen_pembimbing');
//                }elseif($level == 'koor') {                    
//                    $sess_data['username'] = 'koor';
//                    $sess_data['nik'] = $sess->NIK;
//                    $sess_data['nama'] = $sess->Nama;
//                    $this->session->set_userdata('username','kaprodi');
//                    $this->session->set_userdata($sess_data);
//                    session_start();
//                    redirect('data_topik');
//                }elseif($level == 'tu') {                    
//                    $sess_data['username'] = 'tu';
//                    $sess_data['nama'] = $sess->Nama;
//                    $sess_data['nik'] = $sess->NIK;
//                    $this->session->set_userdata('username','tu');
//                    $this->session->set_userdata($sess_data);
//                    session_start();
//                    redirect('prodi_fix4');
//                }
//                else{
//                    redirect('login');
//                }
//            }
//        }else{
//            echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
//        }    
    }

    function logout(){
        $this->session->set_userdata('username','');
        redirect('login');
    }

}
?>