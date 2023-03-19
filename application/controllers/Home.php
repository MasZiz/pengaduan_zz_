<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	public function index()
	{
		$this->load->view('home');
		
	}
	public function cepu()
	{
		$this->load->view('pisah/atas');
		$this->load->view('pisah/tengah');
		$this->load->view('home/pengaduan');
		$this->load->view('pisah/bawah');

	}
	public function cepu_masyarakat()
	{
		$this->load->view('pisah/atas');
		$this->load->view('pisah/tengah');
		$this->load->view('home/pengaduan_masyarakat');
		$this->load->view('pisah/bawah');

	}
}
