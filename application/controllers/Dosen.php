<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends AUTH_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_dosen');
        $this->load->model('Mjurusan');
        $this->load->model('M_prodi');
    }

    public function index()
    {
        $data['userdata']     = $this->userdata;
        $data['dataDosen']     = $this->M_dosen->select_all();
        $data['dataJurusan'] = $this->Mjurusan->select_all();
        $data['dataProdi'] = $this->M_prodi->select_all();
        $data['page']         = "Dosen";
        $data['judul']         = "Data Dosen";
        $data['deskripsi']     = "Manage Data Dosen";

        $data['modal_tambah_dosen'] = show_my_modal('admin/modals/modal_tambah_dosen', 'tambah-dosen', $data);

        $this->template->views('dosen/home', $data);
    }

    public function tampil()
    {
        $data['dataDosen'] = $this->M_dosen->select_all();
        $this->load->view('dosen/list_data', $data);
    }
    // function do_upload()
    // {
    //     $config['upload_path'] = "./assets/images";
    //     $config['allowed_types'] = 'gif|jpg|png';
    //     $config['encrypt_name'] = TRUE;

    //     $this->load->library('upload', $config);
    //     if ($this->upload->do_upload("file")) {
    //         $data = array('upload_data' => $this->upload->data());

    //         $image = $data['upload_data']['file_name'];

    //         $result = $this->m_upload->simpan_upload($image);
    //         echo json_decode($result);
    //     }
    // }
    public function prosesTambah()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required');
        $this->form_validation->set_rules('nidn', 'NIDN', 'trim|required');
        $this->form_validation->set_rules('namadosen', 'Nama', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('notelp', 'Notelp', 'trim|required');
        $this->form_validation->set_rules('golongan', 'Golongan', 'trim|required');
        $this->form_validation->set_rules('pangkat', 'Pangkat', 'trim|required');
        $this->form_validation->set_rules('pendidikanterakhir', 'Pendidikan', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('image', 'image', 'trim|required');
        $this->form_validation->set_rules('isactive', 'isactive', 'trim|required');

        $data     = $this->input->post();
        if ($this->form_validation->run() == TRUE) {
            $result = $this->M_dosen->insert($data);

            if ($result > 0) {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Data Dosen Berhasil ditambahkan', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_err_msg('Data Dosen Gagal ditambahkan', '20px');
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
        $data['dataDosen']     = $this->M_dosen->select_by_id($id);

        echo show_my_modal('admin/modals/modal_update_dosen', 'update-dosen', $data);
    }

    public function prosesUpdate()
    {
        $this->form_validation->set_rules('namadosen', 'namadosen', 'trim|required');


        $data     = $this->input->post();
        if ($this->form_validation->run() == TRUE) {
            $result = $this->M_dosen->update($data);

            if ($result > 0) {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Data Dosen Berhasil diupdate', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Data Dosen Gagal diupdate', '20px');
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
        $result = $this->M_dosen->delete($id);

        if ($result > 0) {
            echo show_succ_msg('Data Dosen Berhasil dihapus', '20px');
        } else {
            echo show_err_msg('Data Dosen Gagal dihapus', '20px');
        }
    }
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */
