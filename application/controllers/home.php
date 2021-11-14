<?php

defined('BASEPATH') OR exit('No direct script access allowed'); 

class home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('chatbot_model');
	}
	public function index()
	{
		$data['tentang_resto'] = $this->pelanggan_model->TentangKami();
		$data['tampil_menu'] = $this->pelanggan_model->MenuSemua();
		$data['galeri'] = $this->pelanggan_model->Galeri();
		$data['blog'] = $this->pelanggan_model->Blog();
		$data['title'] = 'Selamat Datang';

		$this->template_pelanggan->load('template_pelanggan','pelanggan/data/index',$data);
	}
}

