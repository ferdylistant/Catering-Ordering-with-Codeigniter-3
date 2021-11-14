<?php

defined('BASEPATH') OR exit('No direct script access allowed'); 

class contact extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
	}
	public function index()
	{
		$data['tentang_resto'] = $this->pelanggan_model->TentangKami();
		$data['title'] = 'Contact';

		$this->template_pelanggan->load('template_pelanggan','pelanggan/data/contact/index',$data);
	}
}
