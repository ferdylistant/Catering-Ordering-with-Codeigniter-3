<?php defined('BASEPATH') OR exit('No direct script access allowed');

class notifikasi extends CI_Controller {
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
			date_default_timezone_set('Asia/Jakarta');
			$id_pelanggan = $this->session->userdata('id_pelanggan');
			$transaksi = $this->pelanggan_model->OrderRiwayatTransaksi($id_pelanggan);
			foreach ($transaksi->result_array() as $i => $idt){
				$st[]= json_decode(json_encode($this->midtrans->status($idt['id_transaksi'])),true);
				$status = [
					'waktu_transaksi' => $st[$i]['transaction_time'],
					'kode_status' => $st[$i]['status_code'],
					'status_transaksi' => $st[$i]['transaction_status'],
					'pesan_status' => $st[$i]['status_message']
				];
				$id_tr = ['id_transaksi' =>$st[$i]['transaction_id']];
				$id_or = ['id_order' => $st[$i]['order_id']];
				if ($idt['status_order']=='201' || $idt['status_order']==0) {
					$this->db->update('tbl_transaksi',$status,$id_tr);
					$update_status = date("Y-m-d H:i:s");
					$this->db->update('tbl_order',array('status_order'=>$status['kode_status'], 'update_status' => $update_status),$id_or);
				}
				elseif((isset($idt['status_order'])=='1') || (isset($idt['status_order'])=='2')){
					
				}
			}
			$this->session->set_userdata('waktu_transaksi', $status['waktu_transaksi']);
			$waktu_transaksi = $this->session->userdata('waktu_transaksi');
			$r_transaksi = $this->pelanggan_model->OrderRiwayatTransaksiUpdate($id_pelanggan);
			$result = $r_transaksi->num_rows();
			$output ="";
			$output .="<style>
			h3 {
				font-size: 2.5em;
				line-height: 1.5em;
				letter-spacing: -0.05em;
				margin-bottom: 20px;
				padding: .1em 0;
				color: #444;
				position: relative;
				overflow: hidden;
				white-space: nowrap;
				text-align: center;
				vertical-align: middle;
			}
			h3 > span {
				display: inline-block;
				vertical-align: middle;
				white-space: normal;
			}
			p {
				display: block;
				font-size: 1em;
				line-height: 1.25em;
				margin-bottom: 22px;
			}
			.notify {
				display: block;
				background: #fff;
				padding: 12px 18px;
				width: 100%;
				max-width: 800px;
				margin: 0 auto;
				-webkit-border-radius: 3px;
				-moz-border-radius: 3px;
				border-radius: 3px;
				margin-bottom: 20px;
				box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 2px 0px;
			}
			.btn_pembayaran {
				background: #56ab2f;  /* fallback for old browsers */
				background: -webkit-linear-gradient(to right, #a8e063, #56ab2f);  /* Chrome 10-25, Safari 5.1-6 */
				background: linear-gradient(to right, #a8e063, #56ab2f); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
				color: #fff;
				border: 3px solid #eee;
			}
			.btn_pembayaran:hover{
				background: #56ab2f;  /* fallback for old browsers */
				background: -webkit-linear-gradient(to left, #a8e063, #56ab2f);  /* Chrome 10-25, Safari 5.1-6 */
				background: linear-gradient(to left, #a8e063, #56ab2f); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
				color: #fff;
				border: 3px solid #eee;
			}
			.notify h3 { margin-bottom: 6px; }

			.successbox h3 { color: #678361; }
			.warningbox h3 { color: #e0a800; }
			.errorbox h3 { color: #6f423b; }
			.kemasbox h3 { color: #308ee0; }
			.selesaibox h3 { color: #e5e5e5; }

			.successbox h3:before, .successbox h3:after { background: #cad8a9; }
			.warningbox h3:before, .warningbox h3:after { background: #ffc107; }
			.errorbox h3:before, .errorbox h3:after { background: #d6b8b7; }
			.kemasbox h3:before, .kemasbox h3:after { background: #d6b8b7; }
			.selesaibox h3:before, .selesaibox h3:after { background: #e5e5e5; }

			.notify .alerticon {
				display: block;
				text-align: center;
				margin-bottom: 10px;
			}</style>";
			$output .="
			<h3 class='text-center'>
			<img src='".base_url('images/icons/png/032-marketing.png')."' style='width: 40px'>
			Notifikasi
			</h3>
			<hr>
			<div class='m-t-20'>";
			if ($result > 0){
				foreach ($r_transaksi->result_array() as $value){
					if ($value['status_order'] == '201') {
						$output .="
						<div class='notify warningbox'>
						<h3><hr width='42%' align='left' style='position:absolute; height:2px; border: 0; background-image:linear-gradient(to right, rgba(0,0,0,0),#e0a800,rgba(0,0,0,0)'>Pending!<hr width='35%'  style='position:absolute;display: inline; float: right; height:2px; border: 0; background-image:linear-gradient(to right, rgba(0,0,0,0),#e0a800,rgba(0,0,0,0)'></h3>
						<p><strong>".waktu_lalu(date($value['update_status']))."</strong> - Tanggal Transaksi : <strong>".format_hari_tanggal_jam($value['tgl_order_masuk'])."</strong>. Pemesanan <strong>". $value['id_order']."</strong>, Untuk menyelesaikan pemesanan Anda, silahkan melakukan pembayaran sebesar <b>".rupiah($value['total_order']).", untuk mempercepat proses verifikasi!</b></p>
						<a href='".$value['pdf_url']."' class='btn btn_pembayaran btn-xs' target='_blank'> Cara Pembayaran</a>
						</div></div>";

					}
					elseif ($value['status_order'] == '200') {
						$idO = base64_encode($value['id_order']);
						$output .="
						<div class='notify successbox'>
						<h3><hr width='42%' align='left' style='position:absolute;height:2px;border: 0;background-image:linear-gradient(to right, rgba(0,0,0,0),#678361,rgba(0,0,0,0)'>Success!<hr width='35%'  style='position:absolute;display: inline;float: right;height:2px;border: 0;background-image:linear-gradient(to right, rgba(0,0,0,0),#678361,rgba(0,0,0,0)'></h3>
						<p><strong>".waktu_lalu(date($value['waktu_transaksi']))."</strong> - Tanggal Transaksi : <strong>".format_hari_tanggal_jam($value['tgl_order_masuk'])."</strong>. Pemesanan <strong>". $value['id_order']."</strong>, Terimakasih Anda telah melakukan pembayaran sebesar <b>".rupiah($value['total_order'])."</b>, kami akan segera memproses pemesanan Anda. Jika ada yang ingin ditanyakan, silahkan hubungi CP kantor kami.</p><a href='".base_url('riwayat_transaksi/d'.$idO)."' class='btn btn_pembayaran btn-xs'> Detail Transaksi</a>
						</div>
						</div>";
					}
					elseif ($value['status_order'] == '407') {
						$output .="
						<div class='notify errorbox'>
						<h3><hr width='42%' align='left' style='position:absolute;height:2px;border: 0;background-image:linear-gradient(to right, rgba(0,0,0,0),#6f423b,rgba(0,0,0,0)'>Expired!<hr width='35%'  style='position:absolute;display: inline;float: right;height:2px;border: 0;background-image:linear-gradient(to right, rgba(0,0,0,0),#6f423b,rgba(0,0,0,0)'></h3>
						<p><strong>".waktu_lalu(date($waktu_transaksi))."</strong> - Tanggal Transaksi : <strong>".format_hari_tanggal_jam($value['tgl_order_masuk'])."</strong>. Pemesanan <strong>". $value['id_order']."</strong>, Maaf! pemesanan Anda telah kadaluarsa dikarenakan belum melakukan pembayaran sampai telah melewati batas pembayaran yang telah dilakukan. Harap untuk memesan kembali. Terimakasih!</p>
						<a href='".base_url('menu/')."' class='btn btn_pembayaran btn-xs'> Lakukan Pemesanan</a>
						</div></div>";
					}
					elseif($value['status_order'] == 0){
						$id_order = base64_encode($value['id_order']);
						$output .="
						<div class='notify warningbox'>
						<h3><hr width='42%' align='left' style='position:absolute;height:2px;border: 0;background-image:linear-gradient(to right, rgba(0,0,0,0),#e0a800,rgba(0,0,0,0)'>belum!<hr width='35%'  style='position:absolute;display: inline;float: right;height:2px;border: 0;background-image:linear-gradient(to right, rgba(0,0,0,0),#e0a800,rgba(0,0,0,0)'></h3>
						<p><strong>".waktu_lalu(date($i['tgl_order_masuk']))."</strong> - Tanggal Transaksi : <strong>".format_hari_tanggal_jam($value['tgl_order_masuk'])."</strong>. Pemesanan <strong>".$value['id_order']."</strong>, Untuk menyelesaikan pemesanan Anda, silahkan segera melakukan konfirmasi pembayaran di halaman nota. Total pembayaran Anda sebesar <b>".rupiah($value['total_order'])."!</b></p>
						<a href='".base_url('nota/confirm/'.$id_order)."' class='btn btn_pembayaran btn-xs'> Konfirmasi Pembayaran</a>
						</div></div>";
					}
					elseif($value['status_order'] == '1'){
						$idO = base64_encode($value['id_order']);
						$output .="
						<div class='notify kemasbox'>
						<h3><hr width='42%' align='left' style='position:absolute;height:2px;border: 0;background-image:linear-gradient(to right, rgba(0,0,0,0),#308ee0,rgba(0,0,0,0)'>Bungkus!<hr width='35%'  style='position:absolute;display: inline;float: right;height:2px;border: 0;background-image:linear-gradient(to right, rgba(0,0,0,0),#308ee0,rgba(0,0,0,0)'></h3>
						<p><strong>".waktu_lalu(date($value['update_status']))."</strong> - Tanggal Transaksi : <strong>".format_hari_tanggal_jam($value['tgl_order_masuk'])."</strong>. Pemesanan <strong>".$value['id_order']."</strong>, Pemesanan Anda telah dikemas. Silahkan menunggu untuk konfirmasi pengiriman dari kurir kami, terimakasih!</p><a href='".base_url('riwayat_transaksi/d'.$idO)."' class='btn btn_pembayaran btn-xs'> Detail Transaksi</a>
						</div></div>";
					}
					elseif($value['status_order'] == '2'){
						$idO = base64_encode($value['id_order']);
						$output .="
						<div class='notify selesaibox'>
						<h3><hr width='42%' align='left' style='position:absolute;height:2px;border: 0;background-image:linear-gradient(to right, rgba(0,0,0,0),#e5e5e5,rgba(0,0,0,0)'>Selesai!<hr width='35%'  style='position:absolute;display: inline;float: right;height:2px;border: 0;background-image:linear-gradient(to right, rgba(0,0,0,0),#e5e5e5,rgba(0,0,0,0)'></h3>
						<p><strong>".waktu_lalu(date($value['update_status']))."</strong> - Tanggal Transaksi : <strong>".format_hari_tanggal_jam($value['tgl_order_masuk'])."</strong>. Pemesanan <strong>".$value['id_order']."</strong>, Pemesanan Anda telah selesai. Terimakasih telah melakukan pemesanan katering di Kampung Jawa Resto, see you!</p><a href='".base_url('riwayat_transaksi/d'.$idO)."' class='btn btn_pembayaran btn-xs'> Detail Transaksi</a>
						</div></div>";
					}
				}
			}
			else {
				$output .="
				<center>
				<img style='width:40%' src='".base_url('images/icons/tidakada.png')."' alt=''><br>
				<p><strong>Tidak ada notifikasi</strong></p>
				</center></div>";
			}
			$count = $result;
			$data['unseen_notification'] = $count;
			$data['notification'] = $output;
			echo json_encode($data);
		}
	}
}

/* End of file notifikasi.php */
/* Location: ./application/controllers/notifikasi.php */