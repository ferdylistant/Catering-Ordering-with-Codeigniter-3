<?php

defined('BASEPATH') OR exit('No direct script access allowed'); 

class tentang_resto extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('chatbot_model');
	}
	public function index()
	{
		$data['tentang_resto'] = $this->pelanggan_model->TentangKami();
		$data['title'] = 'About';

		$this->template_pelanggan->load('template_pelanggan','pelanggan/data/about/index',$data);
	}
} 
