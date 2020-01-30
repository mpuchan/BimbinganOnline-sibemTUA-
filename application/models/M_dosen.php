<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dosen extends CI_Model
{
  public function select_all()
  {
    $this->db->select('*');
    $this->db->from('dosen');

    $data = $this->db->get();

    return $data->result();
  }

  public function select_by_id($id)
  {
    $sql = "SELECT * FROM dosen WHERE nip = '{$id}'";

    $data = $this->db->query($sql);

    return $data->row();
  }

  public function insert($data)
  {
    $sql = "INSERT INTO dosen VALUES('" . $data['nip'] . "','" . $data['nidn'] . "','" . $data['namadosen'] . "','" . $data['alamat'] . "','" . $data['notelp'] . "','" . $data['golongan'] . "','" . $data['pangkat'] . "','" . $data['pendidikanterakhir'] . "','" . $data['username'] . "','" . $data['password'] . "','" . $data['image'] . "','" . $data['isactive'] . "')";

    $this->db->query($sql);

    return $this->db->affected_rows();
  }
  // function simpan_upload($image)
  // {
  //     $data = array(
  //         'image' => $image
  //     );
  //     $result = $this->db->insert('mahasiswa', $data);
  //     return $result;
  // }
  public function insert_batch($data)
  {
    $this->db->insert_batch('dosen', $data);

    return $this->db->affected_rows();
  }

  public function update($data)
  {
    $sql = "UPDATE dosen SET namadosen='" . $data['namamadosen'] . "' WHERE nip='" . $data['nip'] . "'";

    $this->db->query($sql);

    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $sql = "DELETE FROM dosen WHERE nip='" . $id . "'";

    $this->db->query($sql);

    return $this->db->affected_rows();
  }

  public function check_nama($nama)
  {
    $this->db->where('nip', $nama);
    $data = $this->db->get('dosen');

    return $data->num_rows();
  }

  public function total_rows()
  {
    $data = $this->db->get('dosen');

    return $data->num_rows();
  }
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */
