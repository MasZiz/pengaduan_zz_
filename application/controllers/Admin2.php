<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin2 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('table_zz');
    }

    public function index()
    {
        $this->load->model('table_zz');
        $data['title'] = 'ytta';
        // $data['masyarakat'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        $data['pengaduan'] = $this->table_zz->getRiwayatAdmin();
        // $data['petugas'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('pisah/header', $data);
        $this->load->view('pisah/topbar', $data);
        $this->load->view('pisah/sidebar', $data);
        $this->load->view('admin/tabel_admin1', $data);
        $this->load->view('pisah/footer', $data);
    }



    // update//

    public function proses_admin($id)
    {
        $data['title'] = 'yttaasu';
        $this->load->model('table_zz');
        $data['masyarakat'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        $data['petugas'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['p'] = $this->table_zz->Proses1($id);
        $data['pengaduan'] = $this->table_zz->getRiwayatAdmin();
        $data['prosestanggapan'] = $this->table_zz->prosesTanggapan($id);
        $this->load->view('pisah/header', $data);
        $this->load->view('pisah/topbar', $data);
        $this->load->view('pisah/sidebar', $data);
        $this->load->view('admin/tabel_admin2', $data);
        $this->load->view('pisah/footer', $data);
    }
    public function selesai_admin($id)
    {
        $this->load->model('table_zz');
        $data['masyarakat'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        $data['petugas'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['proses'] = $this->table_zz->Proses($id);
        $data['pengaduan'] = $this->table_zz->getRiwayatAdmin();
        $data['prosestanggapan'] = $this->table_zz->prosesTanggapan($id);
        $this->load->view('pisah/header', $data);
        $this->load->view('pisah/topbar', $data);
        $this->load->view('pisah/sidebar', $data);
        $this->load->view('admin/tabel_admin3', $data);
        $this->load->view('pisah/footer', $data);
    }

    public function upload_tanggapan($id_pengaduan)
    {

        $this->load->model('table_zz');


        $data_petugas = $this->table_zz->petugasData($this->session->userData('username'))->row_array();

        $upload_data = array(
            'id_pengaduan' => $id_pengaduan,
            'tgl_tanggapan' => date('Y-m-d'),
            'tanggapan' => $this->input->post('tanggapan'),
            'id_petugas' => $data_petugas['id_petugas'],
        );

        $this->db->insert('tanggapan', $upload_data);


        $update = array(
            'status' => $this->input->post('status'),
        );

        $this->db->where('id_pengaduan', $id_pengaduan);
        $this->db->update('pengaduan', $update);

        redirect('admin2/');
    }
    
    public function update_selesai($id_pengaduan)
    {
        $this->load->model('table_zz');

        $data_petugas = $this->table_zz->petugasData($this->session->userData('username'))->row_array();

        $upload_data = array(
            'id_pengaduan' => $id_pengaduan,
            'tgl_tanggapan' => date('Y-m-d'),
            'tanggapan' => $this->input->post('tanggapan'),
            'id_petugas' => $data_petugas['id_petugas'],
        );

        $this->db->insert('tanggapan', $upload_data);

        $update = [
            'status' => 'selesai'
        ];

        $this->table_zz->updateSelesai($id_pengaduan, $update);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
    Berhasil Menyelesaikan laporan ! ');
        redirect('admin2/selesai_admin/' . $id_pengaduan);
    }

public function laporan_pdf(){
   


        $data = array(
            "dataku" => array(
                "nama" => "Petani Kode",
                "url" => "http://petanikode.com"
            )
        );

        $this->load->model('kategori_zz');
        // $data['title'] = 'Admin Dashboard';
        $data['title'] = 'dashboard YTTA';
        $data['pengaduan'] = $this->table_zz->getRiwayatAdmin();
        $data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $this->db->get_where('masyarakat', ['nama' => $this->session->userdata('nama')])->row_array();
        // $data['p'] = $this->db->get('pengaduan')->result_array();    
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['sub_kategori'] = $this->db->get('sub_kategori')->result_array();
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('laporan_pdf', $data);
    
    
    }


   
}
