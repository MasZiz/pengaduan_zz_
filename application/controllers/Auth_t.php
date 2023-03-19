<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth_t extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			
			$this->load->view('log_p');
			
		} else {
			$this->_login();
		}	
	}

	private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('petugas', ['username' => $username])->row_array();

        // var_dump($user);
        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
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
                    redirect('auth_t');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> This Email has not been activeted </div>');
                redirect('auth_t');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email is not register </div>');
            redirect('auth_t');
        }
    }
		
		public function registrasi()
		{
			$this->form_validation->set_rules('username', 'Username', 'required|trim');
			$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
				'matches' => 'Password tidak sesuai!',
				'min_length' => 'password terlalu pendek!'
			]);
			$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
	
			if ($this->form_validation->run() == false) {
	
				$this->load->view('reg_p');
			} else {
				$data = [
					'id_petugas' => htmlspecialchars($this->input->post('id_petugas', true)),
					'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas', true)),
					'username' => htmlspecialchars($this->input->post('username', true)),
					'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'telp' => htmlspecialchars($this->input->post('telp', true)),
					'is_active' => 1,
                'level' => 2,
				];
	
				$this->db->insert('petugas', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat anda sudah daftar, Silahkan login!</div>');
				redirect('auth_t');
			} 

}
}

