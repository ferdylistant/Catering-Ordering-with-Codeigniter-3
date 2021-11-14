<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_transaksi extends CI_Controller {
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
			$id = array('id_pelanggan' => $id_pelanggan);			
			$data['pelanggan'] = $this->pelanggan_model->Akun();
			// $data['order_detail'] = $this->pelanggan_model->OrderRiwayat($id_pelanggan);  
			$r_transaksi = $this->pelanggan_model->OrderRiwayatTransaksi($id_pelanggan);
			foreach ($r_transaksi->result_array() as $id) { }
				$data['title'] =  'Riwayat Transaksi';
			$output ="";
			$output .="
			<style>
			.btn-edit-profil{
				background: #2193b0;  /* fallback for old browsers */
				background: -webkit-linear-gradient(to right, #6dd5ed, #2193b0);  /* Chrome 10-25, Safari 5.1-6 */
				background: linear-gradient(to right, #6dd5ed, #2193b0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
				color: #fff;
				border: 3px solid #eee;
				border-radius: 7px;
			}
			.btn-edit-profil:hover{
				background: #2193b0;  /* fallback for old browsers */
				background: -webkit-linear-gradient(to left, #6dd5ed, #2193b0);  /* Chrome 10-25, Safari 5.1-6 */
				background: linear-gradient(to left, #6dd5ed, #2193b0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
				color: #fff;
				border: 3px solid #eee;
			}
			
			</style>
			<h3 class='text-center'>
			<img src='".base_url('images/icons/png/013-tap.png')."' style='width: 40px'> 
			Riwayat Transaksi
			</h3>
			<hr>";
			if (empty($id['id_transaksi'])) {
				$output .="
				<center>
				<img style='width:40%' src='".base_url('images/icons/tidakada.png')."' alt=''><br>
				<p><strong>Belum ada riwayat transaksi</strong></p>
				</center></div>";
			} 
			else{
				$output .="
				<div class='m-t-20'>
				<table class='table table-striped table-sm table-condensed' id='table'>
				<thead>
				<tr>
				<th class='text-center'>No</th>
				<th class='text-center'>Tanggal Pemesanan</th>
				<th class='text-center'>Batas Pembayaran</th>
				<th class='text-center'>Tanggal Dibutuhkan</th>
				<th class='text-center'>Jam Dibutuhkan</th>
				<th class='text-center'>Total Pemesanan</th>
				<th class='text-center'>Status</th>
				<th class='text-center'>Detail</th>
				<th class='text-center'>PDF</th>
				</tr>
				</thead>
				<tbody>"; 
				$no=0;
				foreach ($r_transaksi->result_array() as $value) {
					$idO = base64_encode($value['id_order']);
					$no+=1;
					$output .="
					<tr>
					<td class='text-center txt9'>".$no."</td>
					<td class='text-center txt9'>".format_hari_tanggal_jam($value['tgl_order_masuk'])."</td>
					<td class='text-center txt9'>".format_hari_tanggal_jam($value['deadline_pembayaran'])."</td>
					<td class='text-center txt9'>".format_hari_tanggal($value['tgl_perlu'])."</td>
					<td class='text-center txt9'>".$value['jam_perlu']."</td>
					<td class='text-center txt9'>".rupiah($value['total_order'])."</td>
					<td class='text-center txt9'>";
					if ($value['kode_status']=='201') {
						$output .="
						<span  class='badge badge-warning'>".$value['status_transaksi']."</span>";
					}
					else if ($value['status_order']=="200") {
						$output .="
						<span class='badge badge-success'>".$value['status_transaksi']='Lunas'."</span>";
					}
					else if ($value['status_order']=="407") {
						$output .="
						<span class='badge badge-dark'>".$value['status_transaksi']='kadaluarsa'."</span>";
					}
					else if ($value['status_order']=="1") {
						$output .="
						<span class='badge badge-primary'>dikemas</span>";
					}
					else if ($value['status_order']=="2") {
						$output .="
						<span class='badge badge-secondary'>selesai</span>";
					}
					else{
						$output .="
						<span class='badge badge-danger'>Belum melakukan aksi pembayaran</span>";
					}
					$output .="
					</td>
					<td class='text-center txt9'>
					<a class='btn btn-edit-profil' href='".base_url('riwayat_transaksi/d/'.$idO)."'>Lihat <span class='fa fa-eye mata'></span></a>
					</td>
					<td class='text-center txt9'>";
					if ($value['kode_status']=='201') {
						$output .="
						<a href='".$value['pdf_url']."' target='_blank'><i class='fa fa-download'></i></a>";
					}
					else{
						$output .="
						<span>---</span>";
					}
					$output .="
					</td>
					</tr>";
				}
				$output .="
				</tbody>
				</table>
				</div>";
			}
			echo $output; 
		}
	}
	public function d($idO){
		if ($this->session->userdata('id_pelanggan')=='') {
			redirect('login');
		}
		else{
			$id = base64_decode($idO);
			$data['pelanggan'] = $this->pelanggan_model->Akun();
			$data['pembayaran'] = $this->pelanggan_model->Pembayaran($id);
			$data['dtl'] = $this->pelanggan_model->DetailOrderById($id);
			$data['title']  = 'Detail Transaksi';
			$this->template_pelanggan->load('template_pelanggan','pelanggan/data/akun/riwayat_transaksi_detail',$data);
		}
	}
}

/* End of file riwayat_transaksi.php */
/* Location: ./application/controllers/riwayat_transaksi.php */