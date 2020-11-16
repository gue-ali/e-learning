<?php

class m_walikelas extends CI_Model
{
    public function TampilWalikelas()
    {
        $this->db->select('*');
        $this->db->from('wali_kelas');
        $this->db->join('guru', 'guru.nip=wali_kelas.nip');
        $this->db->join('kelas', 'kelas.id_kelas=wali_kelas.id_kelas');
        $this->db->join('penjurusan', 'penjurusan.id_jurusan=kelas.id_jurusan');
        $query = $this->db->get();
        return $query;
    }

    public function insert($data)
    {
        return $this->db->insert('wali_kelas', $data);
    }

    public function getAllGuru()
    {
        return $this->db->get('guru')->result();
    }

    public function joinkelasjurusan()
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('penjurusan', 'penjurusan.id_jurusan=kelas.id_jurusan');
        $query = $this->db->get();
        return $query;
    }

    public function delete($id)
    {
        return $this->db->where('id_walikelas', $id)->delete('wali_kelas');
    }
}