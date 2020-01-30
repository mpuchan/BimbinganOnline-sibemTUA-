<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berandadosen extends AUTH_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_dosen');
    }

    public function index()
    {
        $data['jml_dosen']     = $this->M_dosen->total_rows();
        $data['userdata']         = $this->userdata;

        $data['page']             = "home";
        $data['judul']             = "Beranda";
        $data['deskripsi']         = "Manage Data CRUD";
        $this->template->views('dosen/beranda/berandadosen', $data);
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
