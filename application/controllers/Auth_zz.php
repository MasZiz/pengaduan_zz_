<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth_zz extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
			// cek setup admin
			$check = $this->db->get('petugas')->num_rows();
			if ($check == 0) {
	
				redirect('auth_zz/setup_admin');
			}
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {

			$this->load->view('login_zz');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('masyarakat', ['username' => $username])->row_array();

		// var_dump($user);
		// jika usernya ada
		if ($user) {
			// jika usernya aktif
			if ($user['is_active'] == 1) {
				// cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'username' => $user['username'],
						'nik' => $user['nik'],
						'level' => $user['level']
					];

					// kondisi
					$this->session->set_userdata($data);
					if ($user['level'] == 1) {
						redirect('admin_zz'); //admin
					} else if ($user['level'] == 2) {
						redirect('admin_zz'); //petugas
					} else if ($user['level'] == 3) {
						redirect('masyarakat_zz'); //masyarakat
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong password! </div>');
					redirect('auth_zz');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> This Email has not been activeted </div>');
				redirect('auth_zz');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email is not register </div>');
			redirect('auth_zz');
		}
	}

	public function registrasi()
	{
		$this->form_validation->set_rules('nik', 'Nik', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password tidak sesuai!',
			'min_length' => 'password terlalu pendek!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {

			$this->load->view('registrasi_zz');
		} else {
			$data = [
				'nik' => htmlspecialchars($this->input->post('nik', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'telepon' => htmlspecialchars($this->input->post('telepon', true)),
				'is_active' => 1,
				'level' => 3,
			];

			$this->db->insert('masyarakat', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat anda sudah daftar, Silahkan login!</div>');
			redirect('login');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('username');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu sudah keluar, Silahkan login!</div>');
		redirect('auth_zz');
	}




	// Auth Petugas


	public function login_petugas()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {

			// Gagal validasi

			$this->load->view('log_p');
		} else {

			// Lolos validasi
			$this->_loginadmin();
		}
	}


	public function _loginadmin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$petugas = $this->db->get_where('petugas', ['username' => $username])->row_array();

		// jika usernya ada


		if ($petugas) {

			// cek password
			if (password_verify($password, $petugas['password'])) {

				$data = [
					'username' => $username,
					'nama_petugas' => $petugas,
					'level'    => $petugas
				];


				$this->session->set_userdata($data);
				if ($petugas['level'] == 'admin') {
					redirect('admin_zz');
				} else if ($petugas['level'] == 'petugas') {
					redirect('petugas');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Password Salah !
		  	</div>');
				redirect('auth_zz/login_petugas');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Username tidak terdaftar !
		  	</div>');
			redirect('auth_zz/login_petugas');
		}
	}


	public function registrasi_admin()
	{

		$this->load->model('table_zz');
		$this->form_validation->set_rules('nama_petugas', 'Nama_petugas', 'required|trim');
		$this->form_validation->set_rules('telp', 'telp', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('level', 'Level', 'required|trim');

		$tambahPetugas = [
			'username' => htmlspecialchars($this->input->post('username', true)),
			'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas', true)),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'telp' => htmlspecialchars($this->input->post('telp', true)),
			'level' => htmlspecialchars($this->input->post('level', true)),
		];

		$this->table_zz->insertPetugas($tambahPetugas);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat anda sudah daftar, Silahkan login!</div>');
		redirect('auth_zz/petugas_admin');
	}

	public function logout_admin()
	{
		$this->session->unset_userdata('level');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda sudah keluar, Silahkan login!</div>');
		redirect('auth_zz/login_petugas');
	}


	// Setup Administrator
	public function setup_admin()
	{
		$this->load->model('table_zz');
		$this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]', [
			'matches' => 'password dont match !'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		$this->form_validation->set_rules('telp', 'telp', 'required|trim');


		if ($this->form_validation->run() == false) {
			$this->load->view('reg_p');
		} else {

			$tambahAdmin = array(
				'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'telp' => htmlspecialchars($this->input->post('telp', true)),
				'level' => 'admin'
			);

			$this->table_zz->insertAdmin($tambahAdmin);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Congratulation your account has been created !
		  	</div>');
			redirect('auth_zz/login_petugas');
		}
	}
}
