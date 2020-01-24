<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pegawai extends CI_Model
{
	public function select_all_mahasiswa()
	{
		$sql = "SELECT * FROM mahasiswa";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function update($data)
	{
		$sql = "UPDATE mahasiswa SET nama='" . $data['nama'] . "', telp='" . $data['telp'] . "', id_kota=" . $data['kota'] . ", id_kelamin=" . $data['jk'] . ", id_posisi=" . $data['posisi'] . " WHERE id='" . $data['id'] . "'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id)
	{
		$sql = "DELETE FROM mahasiswa WHERE nim='" . $id . "'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($data)
	{
		$sql = "INSERT INTO mahasiswa VALUES('" . $data['id'] . "','" . $data['nama'] . "','" . $data['telp'] . "'," . $data['kota'] . "," . $data['jk'] . "," . $data['posisi'] . ",1)";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data)
	{
		$this->db->insert_batch('mahasiswa', $data);

		return $this->db->affected_rows();
	}

	public function check_nama($nama)
	{
		$this->db->where('nama', $nama);
		$data = $this->db->get('mahasiswa');

		return $data->num_rows();
	}

	public function total_rows()
	{
		$data = $this->db->get('mahasiswa');

		return $data->num_rows();
	}
}

/* End of file M_mahasiswa.php */
/* Location: ./application/models/M_mahasiswa.php */
