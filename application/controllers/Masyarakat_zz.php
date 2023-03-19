<?php
defined('BASEPATH') or exit('No direct script access allowed');

class masyarakat_zz extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation', 'upload');
    }

    public function index()
    {
        $this->load->model('kategori_zz');
        // $data['title'] = 'Admin Dashboard';
        $data['title'] = 'dashboard YTTA';
        $data['pengaduan'] = $this->table_zz->getRiwayatAdmin();
        $data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        $data['pengaduan'] = $this->db->get('pengaduan')->result_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['sub_kategori'] = $this->db->get('sub_kategori')->result_array();
        // $data['prosestanggapan'] = $this->table_zz->MasyarakatprosesTanggapan($id);
        // $data['prosestanggapan'] = $this->kategori_zz->MasyarakatprosesTanggapan($id);
        
        $this->load->view('pisah/header', $data);
        $this->load->view('pisah/topbar', $data);
        $this->load->view('pisah/sidebarm', $data);
        $this->load->view('masyarakat/tabel_zz', $data);
        $this->load->view('pisah/footer', $data);
    }

    public function fungsi_tambah()
    {
        $user = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        $kategori = $this->input->post('kategori');
        $sub_kategori = $this->input->post('subkategori');
        $isi_laporan = $this->input->post('isi_laporan');

        $config['upload_path']          =  './assets/img/';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->upload->initialize($config);

        $this->upload->do_upload('foto');
        $upload_foto = $this->upload->data('file_name');
        $fungsi_tambah = array(

            'nik' => $user['nama'],
            'tgl_pengaduan' => date('y-m-d'),
            'kategori' => $kategori,
            'sub_kategori' => $sub_kategori,
            'isi_laporan' => $isi_laporan,
            'foto' => $upload_foto,
        );

        $this->table_zz->insertPengaduan($fungsi_tambah);
        $this->table_zz->join_pengaduan();
        redirect('masyarakat_zz');
    }

    public function get_sub_kategori()
    {
        $id_kategori = $this->input->post('id');
        $sub_kategori = $this->db->get_where('sub_kategori', ['id_kategori' => $id_kategori])->result();
        echo json_encode($sub_kategori);
    }

    public function addkategori()
    {
        $kategori = $this->input->post('kategori');
        $data = array(
            'kategori' => $kategori,
        );
        $this->db->insert('kategori', $data);
        redirect('masyarakat_zz/');
    }

    public function subkategori()
    {
        $sub_kategori = $this->input->post('sub_kategori');
        $data = array(
            'sub_kategori' => $sub_kategori,
        );
        $this->db->insert('sub_kategori', $data);
        redirect('masyarakat_zz/');
    }

    public function delete_kategori($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kategori');
        redirect('masyarakat_zz/');
    }



    public function pengaduan()
    {

        $this->load->model('table_zz');

        $data['masyarakat'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        $masyarakat = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        $data['pengaduan'] = $this->table_zz->getRiwayat($masyarakat['nik']);

        $data['tipeKamar'] = $this->table_zz->tipeKamar();
        $data['userAccess'] = $this->table_zz->userAccess()->result_array();
        $data['pengaduan'] = $this->db->get('pengaduan')->result_array();

        $this->load->view('masyarakat/tabel_zz', $data);
    }

    public function tambah()
    {
        $data['masyarakat'] = $this->db->get_where('masyarakat', ['nama' => $this->session->userdata('nama')])->row_array();
        $this->load->model('table_zz');
        $data['userAccess'] = $this->table_zz->userAccess()->result_array();
        $data['tipeKamar'] = $this->table_zz->tipeKamar();

        $this->load->view('template/topbar',  $data);
        $this->load->view('template/sidebarm',  $data);
        $this->load->view('tambah',  $data);
    }
    public function hasil($id)
    {
        $this->load->model('kategori_zz');
        $data['masyarakat'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        $data['petugas'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

        $data['prosestanggapan'] = $this->kategori_zz->MasyarakatprosesTanggapan($id);
        $this->load->view('pisah/header', $data);
        $this->load->view('pisah/topbar', $data);
        $this->load->view('pisah/sidebarmm', $data);
        $this->load->view('masyarakat/hasil', $data);
        $this->load->view('pisah/footer', $data);
    }

}
