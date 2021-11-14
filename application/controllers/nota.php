<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Nota extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'SB-Mid-server-Q2zVnvjTjb5MYFx4-5AE1c_F', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
		$this->load->model('chatbot_model');
	}

	public function index()

	{
		if ($this->session->userdata('id_pelanggan')=='') {
			echo "<script>alert('Silahkan login terlebih dahulu!');</script>";
			redirect(base_url('login'),'refresh');
		}
		else{
			$this->form_validation->set_rules('nama_order','Nama pemesan','required');
			$this->form_validation->set_rules('telp_order','Telepon pemesan','required');
			$this->form_validation->set_rules('tgl_perlu','Tanggal pengambilan','required');
			$this->form_validation->set_rules('jam_perlu','Jam pengambilan','required');
			$this->form_validation->set_rules('alamat_order','Alamat order','required');

			if ($this->form_validation->run()==FALSE) {
				$validate = $this->session->set_flashdata('error', 'Silahkan Lengkapi!');
				redirect('checkout',$validate);
			}
			else{
				$id_pelanggan = $this->session->userdata('id_pelanggan');
				date_default_timezone_set('Asia/Jakarta');

			//Deadline Pembayaran
				$tgl_order_masuk=date("Y-m-d H:i:s");
				$start_date = date($tgl_order_masuk);
				$expires = strtotime('+1 days', strtotime($tgl_order_masuk));
				$deadline_pembayaran=date('Y-m-d H:i:s', $expires);
			//Pemesanan minimal 6 hari sebelum pengambilan
				$tgl_order=date("Y-m-d");
				$interval = strtotime('+6 days', strtotime($tgl_order));
				$pemesanan_harus=date('Y-m-d', $interval);
				$status_order = '0';
				//jika keperluan diinputkan hari sebelumnya
				if ($this->input->post('tgl_perlu') < $tgl_order) {
					$salah = $this->session->set_flashdata('salah', 'Tanggal Perlu tidak bisa diinput hari sebelumnya!');
					redirect('checkout',$salah);
				}
				elseif($this->input->post('tgl_perlu') < $pemesanan_harus){
					$min_order = $this->session->set_flashdata('min_order', 'Minimal waktu pemesanan adalah 7 hari sebelum tanggal perlu!');
					redirect('checkout',$min_order);
				}
				else{
					$order = array(
						'id_order'		=> 'kj-order'.rand(),
						'pelanggan_id'	=> $id_pelanggan,
						'nama_order' 	=> $this->input->post('nama_order'),
						'telp_order' 	=> $this->input->post('telp_order'),
						'tgl_perlu'	 	=> $this->input->post('tgl_perlu'),
						'jam_perlu'	 	=> $this->input->post('jam_perlu'),
						'alamat_order'	=> $this->input->post('alamat_order'),
						'total_order'	=> $this->input->post('total_order'),
						'status_order'	=> $status_order,
						'tgl_order_masuk' 		=> $tgl_order_masuk,
						'deadline_pembayaran'	=> $deadline_pembayaran,
						'provinsi'			=> $this->input->post('nama_provinsi'),
						'distrik'			=> $this->input->post('nama_kota'),
						'tipe'			=> $this->input->post('tipe'),
						'kodepos_pengiriman'			=> $this->input->post('kode_pos'),
					);
					$this->db->insert('tbl_order',$order);
					$idorder = $order['id_order'];
					$id_order = base64_encode($order['id_order']);
					$menu = $this->cart->contents();
					foreach ($menu as $menu) {
						$id = $menu['id'];
					}
					$model = $this->pelanggan_model->MenuDetail($id);
					foreach ($model->result_array() as $tampil){
						$jenis_produk = $tampil['jenis_menu'];
						$deskripsi 	  =	$tampil['detail_menu'];
					}

					$pemesanan = $this->cart->contents();
					foreach ($pemesanan as $cart) {
						$id_menu = $cart['id'];
						$qty = $cart['qty'];
						$price= $cart['price'];
						$name= $cart['name'];
						$subtotal= $cart['subtotal'];
						$this->db->insert('tbl_order_detail', array(
							'order_id' 		=> $idorder,
							'pelanggan_id'	=> $id_pelanggan,
							'menu_id'		=> $id_menu,
							'jumlah_order'	=> $qty,
							'jenis_produk'	=> $jenis_produk,
							'deskripsi'		=> $deskripsi,
							'harga_produk'	=> $price,
							'sub_harga'		=> $subtotal,
							'nama_produk'	=> $name));
					}
					$this->cart->destroy();

					redirect(base_url('nota/confirm/'.$id_order));
				}
			}
		}
	}
	public function confirm($id_order){
		if ($this->session->userdata('id_pelanggan')=='') {
			redirect('login');
		}
		else{
			$id = base64_decode($id_order);
			$id_pelanggan=$this->session->userdata('id_pelanggan');
			$data['tentang'] = $this->pelanggan_model->TentangKami();
			$data['order'] = $this->pelanggan_model->DetailOrderById($id);
			$data['pemesan'] = $this->pelanggan_model->DetailOrderById($id);
			$data['pesanan'] = $this->pelanggan_model->DetailOrderById($id);
			$data['title'] = 'Nota';
			$this->template_pelanggan->load('template_pelanggan','pelanggan/data/nota/index',$data);
		}
	}

	public function token()
	{
		if ($this->session->userdata('id_pelanggan')=='') {
			redirect('login');
		}
		else{
			$id_order = $this->input->post('id_order');
			$total_order = $this->input->post('total_order');
			$id_menu = $this->input->post('id_menu');
			$harga_produk = $this->input->post('harga_produk');
			$jumlah_order = $this->input->post('jumlah_order');
			$nama_produk = $this->input->post('nama_produk');
			$nama_order = $this->input->post('nama_order');
			$alamat_order = $this->input->post('alamat_order');
			$distrik = $this->input->post('distrik');
			$kodepos_pengiriman = $this->input->post('kodepos_pengiriman');
			$telp_order = $this->input->post('telp_order');
			$provinsi = $this->input->post('provinsi');
			$nama_pelanggan = $this->input->post('nama_pelanggan');
			$email_pelanggan = $this->input->post('email_pelanggan');
			$telp_pelanggan = $this->input->post('telp_pelanggan');
	// Required
			$transaction_details = array(
				'order_id' => $id_order,
		  'gross_amount' => $total_order, // no decimal allowed for creditcard
		);

		// Optional
			$item_details = array (
				'id' => $id_menu,
				'price' => $harga_produk,
				'quantity' => $jumlah_order,
				'name' => $nama_produk
			);

		// Optional
			$billing_address = array(
				'first_name'    => $nama_order,
				'address'       => $alamat_order,
				'city'          => $distrik,
				'postal_code'   => $kodepos_pengiriman,
				'phone'         => $telp_order,
				'country_code'  => 'IDN'
			);
			$shipping_address = array(
				'first_name'    => $nama_order,
				'address'       => $alamat_order,
				'city'          => $distrik,
				'postal_code'   => $kodepos_pengiriman,
				'phone'         => $telp_order,
				'country_code'  => 'IDN'
			);
			$customer_details = array(
				'first_name'    => $nama_pelanggan,
				'email'         => $email_pelanggan,
				'phone'         => $telp_pelanggan,
				'billing_address'  => $billing_address,
				'shipping_address' => $shipping_address
			);
		// Data yang akan dikirim untuk request redirect_url.
			$credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

			$time = time();
			$custom_expiry = array(
				'start_time' => date("Y-m-d H:i:s O",$time),
				'unit' => 'day',
				'duration'  => 1
			);

			$transaction_data = array(
				'transaction_details'=> $transaction_details,
				'item_details'       => $item_details,
				'customer_details'   => $customer_details,
				'credit_card'        => $credit_card,
				'expiry'             => $custom_expiry
			);

			error_log(json_encode($transaction_data));
			$snapToken = $this->midtrans->getSnapToken($transaction_data,true);
			error_log($snapToken);
			echo $snapToken;
		}
	}

	public function finish()
	{
		if ($this->session->userdata('id_pelanggan')=='') {
			redirect('login');
		}
		else{
			$result = json_decode($this->input->post('result_data'),true);
			$notif = json_decode(json_encode($this->midtrans->status($result['transaction_id'])),true);
			$id_pelanggan = $this->session->userdata('id_pelanggan');
			$data = array(
				'pelanggan_id' => $id_pelanggan,
				'currency' => $notif['currency'],
				'signature_key' => $notif['signature_key'],
				'merchant_id' => $notif['merchant_id'],
				'kode_status' => $result['status_code'],
				'pesan_status' => $result['status_message'],
				'id_transaksi' => $result['transaction_id'],
				'order_id' => $result['order_id'],
				'total_transaksi' => $result['gross_amount'],
				'tipe_pembayaran' => $result['payment_type'],
				'waktu_transaksi' => $result['transaction_time'],
				'status_transaksi' => $result['transaction_status'],
				'bank' => $result['va_numbers'][0]['bank'],
				'va_number' => $result['va_numbers'][0]['va_number'],
				'fraud_status' => $result['fraud_status'],
				'pdf_url' => $result['pdf_url'],
				'finish_redirect_url' => $result['finish_redirect_url'], );
			$update_status = $this->db->insert('tbl_transaksi',$data);
			if ($update_status) {
				$sukses = $this->session->set_flashdata("sukses","suksesss!");
				redirect('akun/'.$data['finish_redirect_url'],$sukses);
			}
		}
	}
}
