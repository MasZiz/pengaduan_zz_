<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kategori_zz extends CI_Model
{


    // Model Admin Kategori
    function getKategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    function insertKategori($data)
    {
        $this->db->insert('kategori', $data);
    }


    function hapusKategori($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
    }
    function editKategori($id, $update)
    {
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori', $update);
    }

    // Model Admin SubKategori

    function joinSubKategori()
    {
        $this->db->select('*');
        $this->db->from('sub_kategori');
        $this->db->join('kategori', 'kategori.id_kategori=sub_kategori.id_subkategori');
        return $this->db->get()->result_array();
    }

    function insertSubKategori($data)
    {
        $this->db->insert('sub_kategori', $data);
    }

    function editSub_kategori($id, $update)
    {
        $this->db->where('id_subkategori', $id);
        $this->db->update('sub_kategori', $update);
    }

    function hapusSub_Kategori($id)
    {
        $this->db->where('id_subkategori', $id);
        $this->db->delete('sub_kategori');
    }


    function getPetugas()
    {
        return $this->db->get('petugas')->result_array();
    }

    function insertPetugas($tambahPetugas)
    {
        $this->db->insert('petugas', $tambahPetugas);
    }

    function getMasyarakat()
    {
        return $this->db->get('masyarakat')->result_array();
    }
    public function pengaduan()
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('masyarakat','masyarakat.nik=pengaduan.nik');
        return $this->db->get();
    }
    public function kategori()
    {
        $this->db->select('*');
        $this->db->FROM('sub_kategori');
        $this->db->JOIN('kategori','kategori.id=sub_kategori.id');
        return $this->db->get();
    }
    public function sub_kategori()
    {
        $this->db->select('*');
        $this->db->FROM('kategori');
        $this->db->JOIN('sub_kategori','sub_kategori.id=sub_kategori.id_kategori');
        return $this->db->get();
    }
 function MasyarakatprosesTanggapan($id)
    {
        $this->db->select('*');
        $this->db->from('tanggapan');
        $this->db->join('petugas', 'petugas.id_petugas=tanggapan.id_petugas');
        $this->db->where('id_pengaduan', $id);
        return $this->db->get()->result_array();
    }
}
