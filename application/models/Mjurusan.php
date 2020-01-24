<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mjurusan extends CI_Model
{
    public function select_all()
    {
        $this->db->select('*');
        $this->db->from('jurusan');

        $data = $this->db->get();

        return $data->result();
    }

    public function select_by_id($id)
    {
        $sql = "SELECT * FROM jurusan WHERE kode_jurusan = '{$id}'";

        $data = $this->db->query($sql);

        return $data->row();
    }



    public function insert($data)
    {
        $sql = "INSERT INTO jurusan VALUES('" . $data['kode_jurusan'] . "','" . $data['namajurusan'] . "','" . $data['namakajur'] . "','" . $data['notelp'] . "')";

        $this->db->query($sql);

        return $this->db->affected_rows();
    }

    public function insert_batch($data)
    {
        $this->db->insert_batch('jurusan', $data);

        return $this->db->affected_rows();
    }

    public function update($data)
    {
        $sql = "UPDATE jurusan SET namajurusan='" . $data['namajurusan'] . "', 
        namakajur='" . $data['namakajur'] . "', notelp='" . $data['notelp'] . "' WHERE kode_jurusan='" . $data['kode_jurusan'] . "'";

        $this->db->query($sql);

        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM jurusan WHERE kode_jurusan='" . $id . "'";

        $this->db->query($sql);

        return $this->db->affected_rows();
    }


    public function total_rows()
    {
        $data = $this->db->get('jurusan');

        return $data->num_rows();
    }
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */
