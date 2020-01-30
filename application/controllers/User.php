<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends AUTH_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_user');
    $this->load->model('M_mahasiswa');
    $this->load->model('M_dosen');
  }

  public function index()
  {
    $data['userdata']     = $this->userdata;
    $data['dataUser']     = $this->M_user->select_all();
    $data['dataMahasiswa']     = $this->M_mahasiswa->select_all();
    $data['dataDosen']     = $this->M_dosen->select_all();
    $data['page']         = "User";
    $data['judul']         = "Data User";
    $data['deskripsi']     = "Manage Data User";

    $data['modal_tambah_user'] = show_my_modal('admin/modals/modal_tambah_user', 'tambah-user', $data);

    $this->template->views('admin/user/home', $data);
  }

  public function tampil()
  {
    $data['dataUser'] = $this->M_user->select_all();
    $this->load->view('admin/user/list_data', $data);
  }

  public function prosesTambah()
  {
    $this->form_validation->set_rules('nim', 'Nim');
    $this->form_validation->set_rules('nip', 'Nip');
    $this->form_validation->set_rules('username', 'Username');
    $this->form_validation->set_rules('password', 'password');
    $this->form_validation->set_rules('roleid', 'Tipe User', 'trim|required');
    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
    $this->form_validation->set_rules('profile', 'Foto', 'trim|required');


    $data     = $this->input->post();
    if ($this->form_validation->run() == TRUE) {
      $result = $this->M_user->insert($data);

      if ($result > 0) {
        $out['status'] = '';
        $out['msg'] = show_succ_msg('Data User Berhasil ditambahkan', '20px');
      } else {
        $out['status'] = '';
        $out['msg'] = show_err_msg('Data User Gagal ditambahkan', '20px');
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
    $data['dataUser']     = $this->M_user->select_by_id($id);

    echo show_my_modal('admin/modals/modal_update_user', 'update-user', $data);
  }

  public function prosesUpdate()
  {
    $this->form_validation->set_rules('nim', 'Nim');
    $this->form_validation->set_rules('nip', 'Nip');
    $this->form_validation->set_rules('username', 'Username');
    $this->form_validation->set_rules('password', 'password');
    $this->form_validation->set_rules('roleid', 'Tipe User', 'trim|required');
    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
    $this->form_validation->set_rules('profile', 'Foto', 'trim|required');

    $data     = $this->input->post();
    if ($this->form_validation->run() == TRUE) {
      $result = $this->M_user->update($data);

      if ($result > 0) {
        $out['status'] = '';
        $out['msg'] = show_succ_msg('Data User Berhasil diupdate', '20px');
      } else {
        $out['status'] = '';
        $out['msg'] = show_succ_msg('Data User Gagal diupdate', '20px');
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
    $result = $this->M_user->delete($id);

    if ($result > 0) {
      echo show_succ_msg('Data User Berhasil dihapus', '20px');
    } else {
      echo show_err_msg('Data User Gagal dihapus', '20px');
    }
  }
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */
