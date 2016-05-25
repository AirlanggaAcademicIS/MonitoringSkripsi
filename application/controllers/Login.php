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
        $data = [
                'NIM' => $this->input->post('username', TRUE),
                'Pass' => $this->input->post('password', TRUE)
                ];
        // Load the model
        $this->load->model('login_model');
        // sementara cek data mahasiswa
        $result = $this->login_model->validate($data);
        // Now we verify the result
        if($result->num_rows() == 1){
            foreach ($result->result() as $sess) {
                $sess_data['username'] = 'mahasiswa';
                $sess_data['nama'] = $sess->Nama;
                $sess_data['nim'] = $sess->NIM;
                $this->session->set_userdata('username','mahasiswa');
                $this->session->set_userdata($sess_data);
                session_start();
                if($this->session->userdata['username'] == 'mahasiswa'){
                    redirect('mahasiswa');
                }else{
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