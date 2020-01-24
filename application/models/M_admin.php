<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
	public function update($data, $id)
	{
		$this->db->where("id", $id);
		$this->db->update("tbuser", $data);

		return $this->db->affected_rows();
	}

	public function select($id = '')
	{
		if ($id != '') {
			$this->db->where('id', $id);
		}

		$data = $this->db->get('tbuser');

		return $data->row();
	}
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */
