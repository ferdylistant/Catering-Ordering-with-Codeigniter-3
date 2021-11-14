<?php

defined('BASEPATH') OR exit('No direct script access allowed'); 

class checkout extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('pelanggan_model');
		$this->load->model('chatbot_model');
		$this->load->library('session');
	}
	public function index() {
		if ($this->session->userdata('id_pelanggan')=='') {
			echo "<script>alert('Silahkan login terlebih dahulu!');</script>";
			redirect(base_url('login'),'refresh');
		} 
		else{
			if (empty($this->cart->contents())) {
				echo "<script>alert('Silahkan lakukan pemesanan!');</script>";
				redirect(base_url('menu'),'refresh');
			}
			else{
				$tot = 0;
				$qty = $this->cart->contents();
				foreach ($qty as $key) {
					$tot +=$key['qty'];
				}
				if ($tot < 50) {
					echo "<script>minPembelian();history.go(-1);</script>";
				}
				else{
					$data['pelanggan'] = $this->pelanggan_model->Akun();
					$data['cart'] = $this->cart->contents();
					$data['menu'] = $this->pelanggan_model->MenuAll();
					$data['title'] = 'Checkout';
					$this->template_pelanggan->load('template_pelanggan','pelanggan/data/checkout/index',$data);
				}
			}
		}
	}
	public function cancel($id_order){
		$this->pelanggan_model->tampil_pembayaran_deadline($id);
	}
	public function pembayaran($id_order) {
		if ($this->session->userdata('id_pelanggan')=='') {
			echo "<script>alert('Silahkan login terlebih dahulu!');</script>";
			redirect(base_url('login'),'refresh');
		}
		else{
			$id = $id_order;
			$id_pelanggan=$this->session->userdata('id_pelanggan');
			$data['tentang'] = $this->pelanggan_model->TentangKami();
			$data['cek'] = $this->pelanggan_model->CekPembayaran($id);
			$data['pemesanan'] = $this->pelanggan_model->AmbilPemesanan($id);
			$data['pembayaran'] = $this->pelanggan_model->Pembayaran($id);
			$data['rekening'] = $this->pelanggan_model->RekeningAdmin();
			$data['rek'] = $this->pelanggan_model->RekeningAdmin();
			$data['title'] = 'Pembayaran';
			$this->template_pelanggan->load('template_pelanggan','pelanggan/data/pembayaran/index',$data);
		}
	}
	public function pelunasan($id_order) {
		if ($this->session->userdata('id_pelanggan')=='') {
			echo "<script>alert('Silahkan login terlebih dahulu!');</script>";
			redirect(base_url('login'),'refresh');
		}
		else{
			$id = $id_order;
			$id_pelanggan=$this->session->userdata('id_pelanggan');
			$data['tentang'] = $this->pelanggan_model->TentangKami();
			$data['pemesanan'] = $this->pelanggan_model->AmbilPemesanan($id);
			$data['pembayaran'] = $this->pelanggan_model->Pembayaran($id);
			$data['rekening'] = $this->pelanggan_model->RekeningAdmin();
			$data['rek'] = $this->pelanggan_model->RekeningAdmin();
			$data['title'] = 'Pelunasan';
			$this->template_pelanggan->load('template_pelanggan','pelanggan/data/pembayaran/pelunasan',$data);
		}
	}
}