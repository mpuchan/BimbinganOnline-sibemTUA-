<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends AUTH_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_prodi');
  }

  public function index()
  {
    $data['userdata']     = $this->userdata;
    $data['dataProdi']     = $this->M_prodi->select_all();

    $data['page']         = "Prodi";
    $data['judul']         = "Data Prodi";
    $data['deskripsi']     = "Manage Data Prodi";

    $data['modal_tambah_prodi'] = show_my_modal('admin/modals/modal_tambah_prodi', 'tambah-prodi', $data);

    $this->template->views('admin/prodi/home', $data);
  }

  public function tampil()
  {
    $data['dataProdi'] = $this->M_prodi->select_all();
    $this->load->view('admin/prodi/list_data', $data);
  }

  public function prosesTambah()
  {
    $this->form_validation->set_rules('kodeprodi', 'Kode Prodi', 'trim|required');
    $this->form_validation->set_rules('namaprodi', 'Nama Prodi', 'trim|required');
    $this->form_validation->set_rules('nip', 'Nip', 'trim|required');
    $this->form_validation->set_rules('kaprodi', 'Nama Kaprodi', 'trim|required');
    $this->form_validation->set_rules('notelp', 'No Telp', 'trim|required');

    $data     = $this->input->post();
    if ($this->form_validation->run() == TRUE) {
      $result = $this->M_prodi->insert($data);

      if ($result > 0) {
        $out['status'] = '';
        $out['msg'] = show_succ_msg('Data Prodi Berhasil ditambahkan', '20px');
      } else {
        $out['status'] = '';
        $out['msg'] = show_err_msg('Data Prodi Gagal ditambahkan', '20px');
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
    $data['dataProdi']     = $this->M_prodi->select_by_id($id);

    echo show_my_modal('admin/modals/modal_update_prodi', 'update-prodi', $data);
  }

  public function prosesUpdate()
  {
    $this->form_validation->set_rules('namaprodi', 'Nama Prodi', 'trim|required');
    $this->form_validation->set_rules('nip', 'Nip', 'trim|required');
    $this->form_validation->set_rules('kaprodi', 'Nama Kaprodi', 'trim|required');
    $this->form_validation->set_rules('notelp', 'No Telp', 'trim|required');

    $data     = $this->input->post();
    if ($this->form_validation->run() == TRUE) {
      $result = $this->M_prodi->update($data);

      if ($result > 0) {
        $out['status'] = '';
        $out['msg'] = show_succ_msg('Data Prodi Berhasil diupdate', '20px');
      } else {
        $out['status'] = '';
        $out['msg'] = show_succ_msg('Data Prodi Gagal diupdate', '20px');
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
    $result = $this->M_prodi->delete($id);

    if ($result > 0) {
      echo show_succ_msg('Data Prodi Berhasil dihapus', '20px');
    } else {
      echo show_err_msg('Data Prodi Gagal dihapus', '20px');
    }
  }
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */
