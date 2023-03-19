<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_zz extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Admin Page';
        $this->load->model('table_zz');
        $data['userAccess'] = $this->table_zz->userAccess()->result_array();
        $data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        $data['petugas'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['bar_graph'] = array('pengaduan' => $this->db->get('pengaduan')->num_rows(),
            // 'status' => $this->db->get_where('petugas', ['pengaduan' => 'proses'])->num_rows(),
            // 'status' => $this->db->get_where('petugas', ['pengaduan' => 'selesai'])->num_rows(),

        );
            $pengaduan = array(
                'status' => 'segera',
    
            );
    
            $this->db->where($pengaduan);
            $pengaduan = $this->db->get('pengaduan')->num_rows();
    
            $proses = array(
                'status' => 'proses',
    
            );
    
            $this->db->where($proses);
            $proses = $this->db->get('pengaduan')->num_rows();
    
            $selesai = array(
                'status' => 'selesai',
    
            );
    
    
            $this->db->where($selesai);
            $selesai = $this->db->get('pengaduan')->num_rows();
    
            $data['jumlah'] = array(
                'pengaduan' => $pengaduan,
                'proses' => $proses,
                'selesai' => $selesai,
            );

        $data['title'] = 'dashboard admin';
        $this->load->view('pisah/header', $data);
        $this->load->view('pisah/topbar', $data);
        $this->load->view('pisah/sidebar', $data);
        $this->load->view('admin/dashbord_admin', $data);
        $this->load->view('pisah/footer', $data);
    }

  

    public function kategori()
    {
        $this->load->model('kategori_zz');
        $data['sub_kategori'] = $this->kategori_zz->joinSubKategori();
        $data['petugas'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Kategori';
        $data['kategori'] = $this->kategori_zz->getKategori();
        $this->load->view('pisah/header', $data);
        $this->load->view('pisah/sidebar', $data);
        $this->load->view('admin/kategori_admin', $data);
        $this->load->view('pisah/footer', $data);
    }
    public function masyarakat()
    {
        $data['title'] = 'Home Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['masyarakat'] = $this->db->get('masyarakat')->result_array();

        $data['title'] = 'Pengaduan';
          $this->load->view('pisah/header', $data);
        $this->load->view('pisah/topbar', $data);
        $this->load->view('pisah/sidebar', $data);
        $this->load->view('admin/masyarakat_zz', $data);
         $this->load->view('pisah/footer', $data);
    }

    public function petugas()
    {
        $data['title'] = 'Home Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['petugas'] = $this->db->get('petugas')->result_array();
        $data['title'] = 'petugas';
          $this->load->view('pisah/header', $data);
        $this->load->view('pisah/topbar', $data);
        $this->load->view('pisah/sidebar', $data);
        $this->load->view('admin/petugas_zz', $data);
         $this->load->view('pisah/footer', $data);
    }

    
    public function tambahKategori()
    {
        $this->load->model('kategori_zz');

        $kategori = $this->input->post('kategori');

        $tambahKategori = array(
            'kategori' => $kategori,
        );

        $this->kategori_zz->insertKategori($tambahKategori);
        redirect('admin_zz/kategori');
    }

    public function hapusKategori($id)
    {
        $this->load->model('kategori_zz');
        $this->kategori_zz->hapusKategori($id);
        redirect('admin_zz/kategori');
    }


    public function tambahSubKategori()
    {
        $this->load->model('kategori_zz');

        $kategori = $this->input->post('kategori');
        $sub_kategori = $this->input->post('sub_kategori');

        $tambahSubKategori = array(
            'id_kategori' => $kategori,
            'sub_kategori' => $sub_kategori,
        );

        $this->kategori_zz->joinSubKategori();
        $this->kategori_zz->insertSubKategori($tambahSubKategori);
        redirect('admin_zz/kategori');
    }
    public function editKategori($id)
    {

        $this->load->model('kategori_zz');
        $kategori = $this->input->post('kategori');

        $update = array(
            'kategori' => $kategori
        );

        $this->kategori_zz->editKategori($id, $update);
        redirect('admin_zz/kategori');
    }

    public function editSub_kategori($id)
    {

        $this->load->model('kategori_zz');
        $sub_kategori = $this->input->post('sub_kategori');

        $update = array(
            'sub_kategori' => $sub_kategori
        );

        $this->kategori_zz->editSub_kategori($id, $update);
        redirect('admin_zz/kategori');
    }

    public function hapusSub_Kategori($id)
    {
        $this->load->model('kategori_zz');
        $this->kategori_zz->hapusSub_Kategori($id);
        redirect('admin_zz/kategori');
    }

    // Controller Petugas Admin

    public function tambahPetugas()
    {
        $this->load->model('kategori_zz');

        $username = $this->input->post('username');
        $nama_petugas = $this->input->post('nama_petugas');
        $telpon = $this->input->post('telpon');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $level = $this->input->post('level');

        $tambahPetugas = array(
            'username' => $username,
            'nama_petugas' => $nama_petugas,
            'password' => $password,
            'telpon' => $telpon,
            'level' => $level,
        );

        // $this->kategori_zz->joinSubKategori();
        $this->kategori_zz->insertPetugas($tambahPetugas);
        redirect('admin_zz/petugas');
    }
    public function masterData()
	{
		$data['masyarakat'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->model('table_zz');
        $data['userAccess'] = $this->table_zz->userAccess()->result_array();
		$data['tipeKamar'] = $this->table_zz->tipeKamar()->result_array();


        $data['title'] = 'Masterdata';
        $this->load->view('pisah/header', $data);
        $this->load->view('pisah/topbar', $data);
        $this->load->view('pisah/sidebar', $data);
        $this->load->view('admin/masdat_zz', $data);
         $this->load->view('pisah/footer', $data);
	}
    
	// Usser Acces
	public function fungsi_editUser($id)
	{
		$nama = $this->input->post('nama');
		$level = $this->input->post('level');

		$update = array(
			'nama' => $nama,
			'level' => $level,
		);

		$this->db->where('id', $id);
		$this->db->update('masyarakat', $update);
		redirect('admin_zz/masterData');
	}

	public function fungsi_deleteUser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('masyarakat');
		redirect('admin_zz/masterData');
	}
	// Akhir Usser Acces
	public function profil()
	{
		$data['masyarakat'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('email')])->row_array();

		$this->load->model('table_zz');
		$data['userAccess'] = $this->table_zz->userAccess()->result_array();
		$data['tipeKamar'] = $this->table_zz->tipeKamar()->result_array();

		$data['title'] = 'knrl';
        $this->load->view('pisah/header', $data);
        $this->load->view('pisah/topbar', $data);
        $this->load->view('pisah/sidebar', $data);
		$this->load->view('profile', $data);
        $this->load->view('pisah/footer', $data);
    
}

}

