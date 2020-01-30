<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_prodi extends CI_Model
{
  public function select_all()
  {
    $this->db->select('*');
    $this->db->from('prodi');

    $data = $this->db->get();

    return $data->result();
  }

  public function select_by_id($id)
  {
    $sql = "SELECT * FROM prodi WHERE kodeprodi = '{$id}'";

    $data = $this->db->query($sql);

    return $data->row();
  }



  public function insert($data)
  {
    $sql = "INSERT INTO prodi VALUES('" . $data['kodeprodi'] . "','" . $data['namaprodi'] . "','" . $data['nip'] . "','" . $data['kaprodi'] . "','" . $data['notelp'] . "')";

    $this->db->query($sql);

    return $this->db->affected_rows();
  }

  public function insert_batch($data)
  {
    $this->db->insert_batch('prodi', $data);

    return $this->db->affected_rows();
  }

  public function update($data)
  {
    $sql = "UPDATE prodi SET namaprodi='" . $data['namaprodi'] . "', 
        nip='" . $data['nip'] . "', kaprodi='" . $data['kaprodi'] . "', notelp='" . $data['notelp'] . "' WHERE kodeprodi='" . $data['kodeprodi'] . "'";

    $this->db->query($sql);

    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $sql = "DELETE FROM prodi WHERE kodeprodi='" . $id . "'";

    $this->db->query($sql);

    return $this->db->affected_rows();
  }

  public function check_nama($nama)
  {
    $this->db->where('namaprodi', $nama);
    $data = $this->db->get('prodi');

    return $data->num_rows();
  }
  public function total_rows()
  {
    $data = $this->db->get('prodi');

    return $data->num_rows();
  }
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */
