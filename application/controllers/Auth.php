<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_auth');
  }

  public function index()
  {
    $session = $this->session->userdata('status');

    if ($session == '') {
      $this->load->view('login');
    } else if ($session && $this->session->userdata('level') === '1') {
      redirect('Home');
    } else if ($session && $this->session->userdata('level') === '2') {
      redirect('Berandamahasiswa');
    } else if ($session && $this->session->userdata('level') === '3') {
      redirect('Berandadosen');
    }
  }

  public function loginmahasiswa()
  {
  }
  public function logindosen()
  {
  }


  public function login()
  {
    $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[15]');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == TRUE) {
      $username = trim($_POST['username']);
      $password = trim($_POST['password']);
      $level = trim($_POST['level']);


      $data = $this->M_auth->login($username, $password, $level);

      if ($data == false) {
        $this->session->set_flashdata('error_msg', 'Username / Password Anda Salah.');
        redirect('Auth');
      } else if ($level == 1 && $data == true) {
        $session = [
          'userdata' => $data,
          'status' => "admin"
        ];
        $this->session->set_userdata($session);
        redirect('Home');
      } else if ($level == 2 && $data == true) {
        $session = [
          'userdata' => $data,
          'status' => "mahasiswa"
        ];
        $this->session->set_userdata($session);
        redirect('Berandamahasiswa');
      } else if ($level == 3 && $data == true) {
        $session = [
          'userdata' => $data,
          'status' => "Loged in"
        ];
        $this->session->set_userdata($session);
        redirect('Berandamahasiswa');
      }
    } else {
      $this->session->set_flashdata('error_msg', validation_errors());
      redirect('Auth');
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('Auth');
  }
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
