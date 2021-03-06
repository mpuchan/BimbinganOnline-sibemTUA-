<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
  public function login($user, $pass, $roleid)
  {
    $this->db->select('*');
    $this->db->from('tbuser');
    $this->db->where('username', $user);
    $this->db->where('password', $pass);
    $this->db->where('roleid', $roleid);

    $data = $this->db->get();

    if ($data->num_rows() == 1) {
      return $data->row();
    } else {
      return false;
    }
  }
}

/* End of file M_auth.php */
/* Location: ./application/models/M_auth.php */
