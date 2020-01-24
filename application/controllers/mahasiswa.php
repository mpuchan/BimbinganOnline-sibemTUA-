<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends AUTH_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_mahasiswa');
    }

    public function index()
    {
        $data['userdata']     = $this->userdata;
        $data['dataMahasiswa']     = $this->M_mahasiswa->select_all();

        $data['page']         = "Mahasiswa";
        $data['judul']         = "Data Mahasiswa";
        $data['deskripsi']     = "Manage Data Mahasiswa";

        $data['modal_tambah_mahasiswa'] = show_my_modal('modals/modal_tambah_mahasiswa', 'tambah-mahasiswa', $data);

        $this->template->views('mahasiswa/home', $data);
    }

    public function tampil()
    {
        $data['dataMahasiswa'] = $this->M_mahasiswa->select_all();
        $this->load->view('mahasiswa/list_data', $data);
    }

    public function prosesTambah()
    {
        $this->form_validation->set_rules('nim', 'Nim', 'trim|required');
        $this->form_validation->set_rules('namamahasiswa', 'Nim', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('notelp', 'Notelp', 'trim|required');
        $this->form_validation->set_rules('kodeprodi', 'Kodeprodi', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('image', 'Image', 'trim|required');
        $this->form_validation->set_rules('kodejurusan', 'kodejurusan', 'trim|required');
        $this->form_validation->set_rules('isactive', 'Isactive', 'trim|required');
        $this->form_validation->set_rules('datacreate', 'Data_create', 'trim|required');
        $this->form_validation->set_rules('dataupdate', 'dataupdate', 'trim|required');

        $data     = $this->input->post();
        if ($this->form_validation->run() == TRUE) {
            $result = $this->M_mahasiswa->insert($data);

            if ($result > 0) {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Data Mahasiswa Berhasil ditambahkan', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_err_msg('Data Mahasiswa Gagal ditambahkan', '20px');
            }
        } else {
            $out['status'] = 'form';
            $out['msg'] = show_err_msg(validation_errors());
        }

        echo json_encode($out);
    }

    public function update()
    {

        $id                 = trim($_POST['id']);
        $data['dataMahasiswa']     = $this->M_mahasiswa->select_by_id($id);

        echo show_my_modal('modals/modal_update_mahasiswa', 'update-mahasiswa', $data);
    }

    public function prosesUpdate()
    {
        $this->form_validation->set_rules('namamahasiswa', 'namamahasiswa', 'trim|required');


        $data     = $this->input->post();
        if ($this->form_validation->run() == TRUE) {
            $result = $this->M_mahasiswa->update($data);

            if ($result > 0) {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Data Mahasiswa Berhasil diupdate', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Data Mahasiswa Gagal diupdate', '20px');
            }
        } else {
            $out['status'] = 'form';
            $out['msg'] = show_err_msg(validation_errors());
        }

        echo json_encode($out);
    }

    public function delete()
    {
        $id = $_POST['id'];
        $result = $this->M_mahasiswa->delete($id);

        if ($result > 0) {
            echo show_succ_msg('Data Mahasiswa Berhasil dihapus', '20px');
        } else {
            echo show_err_msg('Data Mahasiswa Gagal dihapus', '20px');
        }
    }
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */
