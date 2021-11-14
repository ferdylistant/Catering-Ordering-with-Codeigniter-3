<?php

defined('BASEPATH') OR exit('No direct script access allowed'); 

class saran extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('pelanggan_model');
		$this->load->model('chatbot_model');
		$this->load->library('session');
	}
	public function index() {
		if ($this->session->userdata('id_pelanggan')=='') {
			redirect(base_url('login'));
		}
		else{
			$data = array(
			'nama_saran' => $this->input->post('nama_saran'),
			'email_saran'=> $this->input->post('email_saran'),
			'telp_saran' => $this->input->post('telp_saran'),
			'isi_saran'	 => $this->input->post('isi_saran'),
		);
		$this->db->insert('tbl_saran', $data);
		$notif = $this->session->set_flashdata('sukses',"Silahkan Lengkapi!");
		redirect(base_url('contact'),'refresh',$notif);
		}
	}
}
		

