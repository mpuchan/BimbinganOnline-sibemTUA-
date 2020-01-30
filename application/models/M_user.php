<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
  public function select_all()
  {
    $this->db->select('*');
    $this->db->from('tbuser');

    $data = $this->db->get();

    return $data->result();
  }

  public function select_by_id($id)
  {
    $sql = "SELECT * FROM user WHERE id = '{$id}'";

    $data = $this->db->query($sql);

    return $data->row();
  }

  public function insert($data)
  {
    $sql = "INSERT INTO tbuser VALUES('','" . $data['nim'] . "','" . $data['nip'] . "','" . $data['username'] . "','" . $data['password'] . "','" . $data['roleid'] . "','" . $data['nama'] . "','" . $data['profile'] . "')";

    $this->db->query($sql);

    return $this->db->affected_rows();
  }

  public function insert_batch($data)
  {
    $this->db->insert_batch('tbuser', $data);

    return $this->db->affected_rows();
  }

  public function update($data)
  {
    $sql = "UPDATE tbuser SET nim='" . $data['nim'] . "', 
        nip='" . $data['nip'] . "', username='" . $data['username'] . "', roleid='" . $data['roleid'] . "' WHERE id='" . $data['id'] . "'";

    $this->db->query($sql);

    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $sql = "DELETE FROM tbuser WHERE id='" . $id . "'";

    $this->db->query($sql);

    return $this->db->affected_rows();
  }


  public function total_rows()
  {
    $data = $this->db->get('tbuser');

    return $data->num_rows();
  }
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */
