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
        $username =$this->input->post('username', TRUE);
        $password =$this->input->post('password', TRUE);
        $level =$this->input->post('level');
        $mahasiswa = [ 'NIM' => $username,
                        'Pass' => $password
                     ];
        $kaprodi = [ 'NIK' => $username,
                    'Pass' => $password
                    ];
        // Load the model
        $this->load->model('login_model');
        // sementara cek data mahasiswa

        if($level == 'mahasiswa'){
            $result = $this->login_model->validate('mahasiswa',$mahasiswa);
        } elseif ($level == 'kaprodi') {
            $result = $this->login_model->validate('dosen',$kaprodi);
        } elseif ($level == 'dosen') {
            $result = $this->login_model->validate('dosen',$kaprodi);            
        } elseif ($level == 'koor') {
            $result = $this->login_model->validate('dosen',$kaprodi);            
        } elseif ($level == 'tu') {
            $result = $this->login_model->validate('dosen',$kaprodi);            
        }


        // Now we verify the result
        if($result->num_rows() == 1){
            foreach ($result->result() as $sess) {
                if($level == 'mahasiswa') {                    
                    $sess_data['username'] = 'mahasiswa';
                    $sess_data['nama'] = $sess->Nama;
                    $sess_data['nim'] = $sess->NIM;
                    $this->session->set_userdata('username','mahasiswa');
                    $this->session->set_userdata($sess_data);
                    session_start();
                    redirect('mahasiswa');
                }elseif($level == 'kaprodi') {                    
                    $sess_data['username'] = 'kaprodi';
                    $sess_data['nama'] = $sess->Nama;
                    $sess_data['nik'] = $sess->NIK;
                    $this->session->set_userdata('username','kaprodi');
                    $this->session->set_userdata($sess_data);
                    session_start();
                    redirect('laporan');
                }elseif($level == 'dosen') {                    
                    $sess_data['username'] = 'dosen';
                    $sess_data['nama'] = $sess->Nama;
                    $sess_data['nik'] = $sess->NIK;
                    $this->session->set_userdata('username','dosen');
                    $this->session->set_userdata($sess_data);
                    session_start();
                    redirect('dosen_pembimbing');
                }elseif($level == 'koor') {                    
                    $sess_data['username'] = 'koor';
                    $sess_data['nik'] = $sess->NIK;
                    $sess_data['nama'] = $sess->Nama;
                    $this->session->set_userdata('username','kaprodi');
                    $this->session->set_userdata($sess_data);
                    session_start();
                    redirect('data_topik');
                }elseif($level == 'tu') {                    
                    $sess_data['username'] = 'tu';
                    $sess_data['nama'] = $sess->Nama;
                    $sess_data['nik'] = $sess->NIK;
                    $this->session->set_userdata('username','tu');
                    $this->session->set_userdata($sess_data);
                    session_start();
                    redirect('prodi');
                }
                else{
                    redirect('login');
                }
            }
        }else{
            echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
        }    
    }

    function logout(){
        $this->session->set_userdata('username','');
        redirect('login');
    }

}
?>