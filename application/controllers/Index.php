<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('beranda/index');
    }
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
