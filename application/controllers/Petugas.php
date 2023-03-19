<?php
defined('BASEPATH') or exit('No direct script access allowed');

class petugas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('table_zz');
    }

    public function index()
    {
        // $this->load->model('table_zz');
        $data['title'] = 'petugas upacara';
        // $data['masyarakat'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        // $data['pengaduan'] = $this->table_zz->getRiwayatAdmin();
        // $data['petugas'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('pisah/header', $data);
        $this->load->view('pisah/topbar', $data);
        $this->load->view('pisah/sidebar', $data);
        $this->load->view('petugas/dashboard', $data);
        $this->load->view('pisah/footer', $data);
    }