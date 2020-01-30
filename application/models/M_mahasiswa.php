<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_mahasiswa extends CI_Model
{
    public function select_all()
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');

        $data = $this->db->get();

        return $data->result();
    }

    public function select_by_id($id)
    {
        $sql = "SELECT * FROM mahasiswa WHERE nim = '{$id}'";

        $data = $this->db->query($sql);

        return $data->row();
    }

    public function insert($data)
    {
        $sql = "INSERT INTO mahasiswa VALUES('" . $data['nim'] . "','" . $data['namamahasiswa'] . "','" . $data['alamat'] . "','" . $data['notelp'] . "','" . $data['kodeprodi'] . "','" . $data['username'] . "','" . $data['password'] . "','" . $data['image'] . "','" . $data['kodejurusan'] . "','" . $data['isactive'] . "','" . $data['datacreate'] . "','" . $data['dataupdate'] . "')";

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
        $this->db->insert_batch('mahasiswa', $data);

        return $this->db->affected_rows();
    }

    public function update($data)
    {
        $sql = "UPDATE mahasiswa SET namamahasiswa='" . $data['namamahasiswa'] . "' WHERE nim='" . $data['nim'] . "'";

        $this->db->query($sql);

        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM mahasiswa WHERE nim='" . $id . "'";

        $this->db->query($sql);

        return $this->db->affected_rows();
    }

    public function check_nama($nama)
    {
        $this->db->where('nim', $nama);
        $data = $this->db->get('mahasiswa');

        return $data->num_rows();
    }

    public function total_rows()
    {
        $data = $this->db->get('mahasiswa');

        return $data->num_rows();
    }
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */
