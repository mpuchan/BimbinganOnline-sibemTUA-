<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends AUTH_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_mahasiswa');
  }

  public function index()
  {
    $data['jml_mahasiswa']   = $this->M_mahasiswa->total_rows();
    $data['userdata']     = $this->userdata;

    $data['page']       = "home";
    $data['judul']       = "Beranda";
    $data['deskripsi']     = "Manage Data CRUD";
    $this->template->views('home', $data);
  }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
