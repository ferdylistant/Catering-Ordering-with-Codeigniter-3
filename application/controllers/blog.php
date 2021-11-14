<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blog extends CI_Controller {
	public function __construct() { 
		parent::__construct();
		$this->load->model('pelanggan_model');
		$this->load->model('chatbot_model');
		$this->load->library('session');
		date_default_timezone_set('Asia/Jakarta');
	}
	public function index()
	{
		$data['kategori_blog'] = $this->pelanggan_model->KategoriBlog();
		$data['blog'] = $this->pelanggan_model->Blog();
		foreach ($data['blog'] as $value) {
			$bulan = date('m', strtotime($value['tgl_input']));
			$tahun = date('Y', strtotime($value['tgl_input']));
		}
		$data['arsip'] = $this->pelanggan_model->ArsipBlog($bulan,$tahun);
		$data['title'] = 'Blog';
		$this->template_pelanggan->load('template_pelanggan','pelanggan/data/blog/index',$data);
	}
	public function detail($idB)
	{
		$id = base64_decode($idB);
		$data['kategori_blog'] = $this->pelanggan_model->KategoriBlog();
		$data['blog'] = $this->pelanggan_model->Blog();
		foreach ($data['blog'] as $value) {
			$bulan = date('m', strtotime($value['tgl_input']));
			$tahun = date('Y', strtotime($value['tgl_input']));
		}
		$data['arsip'] = $this->pelanggan_model->ArsipBlog($bulan,$tahun);
		$data['detail'] = $this->pelanggan_model->Baca_Per_Id($id);
		$data['title'] = 'Detail Blog';
		$this->template_pelanggan->load('template_pelanggan','pelanggan/data/blog/blog_detail',$data);
	}

}

/* End of file blog.php */
/* Location: ./application/controllers/blog.php */