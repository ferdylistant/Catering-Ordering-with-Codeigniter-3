<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class syarat_dan_ketentuan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('chatbot_model');
	}
	public function index()
	{
		$data['title']			= 'Syarat & Ketentuan';

		$this->template_pelanggan->load('template_pelanggan','pelanggan/data/snk/index',$data);
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */