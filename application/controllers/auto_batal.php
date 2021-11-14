<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auto_batal extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$params = array('server_key' => 'SB-Mid-server-Q2zVnvjTjb5MYFx4-5AE1c_F', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->model('pelanggan_model');
		$this->load->model('chatbot_model');
		$this->load->library('session');
	}

	public function index()
	{
		if ($this->session->userdata('id_pelanggan')=='') {
			redirect('login');
		}
		else{
			$id_pelanggan = $this->session->userdata('id_pelanggan');
			$semua_pesanan = $this->pelanggan_model->OrderRiwayatTransaksi($id_pelanggan); 
			$hasil = array(
				'id_transaksi' => $semua_pesanan['id_transaksi'],
				'id_order' => $semua_pesanan['id_order'] );
			$st = json_decode(json_encode($this->midtrans->expire($hasil['id_transaksi'])),true);
			// echo "<pre>";
			// var_dump($st);
			// echo "</pre>";die();
			$id = array('id_transaksi' => $st['transaction_id']);
			$id_order = array('id_order' => $st['order_id']);
			$status = array(
				'waktu_transaksi' => $st['transaction_time'],
				'kode_status' => $st['status_code'],
				'status_transaksi' => $st['transaction_status'],
				'pesan_status' => $st['status_message'],
			);
			$this->db->update('tbl_transaksi',$status,$id);
			$status_order = array(
				'status_order' => $status['kode_status'],
			);
			$this->db->update('tbl_order',$status_order,$id_order);
		}
	}

}

/* End of file auto_batal */
/* Location: ./application/controllers/auto_batal */