<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends AUTH_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mjurusan');
    }

    public function index()
    {
        $data['userdata']     = $this->userdata;
        $data['dataJurusan']     = $this->Mjurusan->select_all();

        $data['page']         = "Jurusan";
        $data['judul']         = "Data Jurusan";
        $data['deskripsi']     = "Manage Data Jurusan";

        $data['modal_tambah_jurusan'] = show_my_modal('modals/modal_tambah_jurusan', 'tambah-jurusan', $data);

        $this->template->views('jurusan/home', $data);
    }

    public function tampil()
    {
        $data['dataJurusan'] = $this->Mjurusan->select_all();
        $this->load->view('jurusan/list_data', $data);
    }

    public function prosesTambah()
    {
        $this->form_validation->set_rules('kode_jurusan', 'Kode Jurusan', 'trim|required');
        $this->form_validation->set_rules('namajurusan', 'Nama Jurusan', 'trim|required');
        $this->form_validation->set_rules('namakajur', 'Kajur Jurusan', 'trim|required');
        $this->form_validation->set_rules('notelp', 'No Telp', 'trim|required');

        $data     = $this->input->post();
        if ($this->form_validation->run() == TRUE) {
            $result = $this->Mjurusan->insert($data);

            if ($result > 0) {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Data Jurusan Berhasil ditambahkan', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_err_msg('Data Jurusan Gagal ditambahkan', '20px');
            }
        } else {
            $out['status'] = 'form';
            $out['msg'] = show_err_msg(validation_errors());
        }

        echo json_encode($out);
    }

    public function update()
    {
        $data['userdata']     = $this->userdata;

        $id                 = trim($_POST['id']);
        $data['dataJurusan']     = $this->Mjurusan->select_by_id($id);

        echo show_my_modal('modals/modal_update_jurusan', 'update-jurusan', $data);
    }

    public function prosesUpdate()
    {
        $this->form_validation->set_rules('namajurusan', 'Nama Jurusan', 'trim|required');
        $this->form_validation->set_rules('namakajur', 'Kajur Jurusan', 'trim|required');
        $this->form_validation->set_rules('notelp', 'No Telp', 'trim|required');

        $data     = $this->input->post();
        if ($this->form_validation->run() == TRUE) {
            $result = $this->Mjurusan->update($data);

            if ($result > 0) {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Data Jurusan Berhasil diupdate', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Data Jurusan Gagal diupdate', '20px');
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
        $result = $this->Mjurusan->delete($id);

        if ($result > 0) {
            echo show_succ_msg('Data Jurusan Berhasil dihapus', '20px');
        } else {
            echo show_err_msg('Data Jurusan Gagal dihapus', '20px');
        }
    }
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */
