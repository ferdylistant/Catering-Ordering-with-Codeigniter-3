<?php

class pelanggan_model extends CI_Model {
	protected $kampungjawa = 'kampungjawa';

    function __construct(){
        parent::__construct();
    }
	function cek_login(){if ($this->session->userdata('id_pelanggan')=="") {$this->session->set_flashdata('warning','Anda belum login!');
			redirect(base_url('login'),'refresh');}
	}
	function cek_sudah_login(){if ($this->session->userdata('id_pelanggan')) {$this->session->set_flashdata('warning','Anda Sudah login!');
			redirect(base_url('akun'),'refresh');}
	}
	function update_reset_key($email,$reset){
		$this->db->where('email_pelanggan',$email);
		$data = array('token' => $reset);
		$this->db->update('tbl_pelanggan', $data);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	function Akun(){return $this->db->get_where('tbl_pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();}
	function AkunEdit($id){return $this->db->query("select * from tbl_pelanggan where id_pelanggan='$id'");}
	function AmbilPelanggan($id_pelanggan){return $this->db->query("select * from tbl_pelanggan where id_pelanggan='$id_pelanggan'");}
	 //Awal Login
	function login($email_pelanggan, $password_pelanggan) {$this->db->select('*');
		$this->db->from('tbl_pelanggan');
		$this->db->where(array('email_pelanggan'=> $email_pelanggan,
			'password_pelanggan' => md5($password_pelanggan)));
		$this->db->order_by('id_pelanggan','desc');
		$query = $this->db->get();
		return $query->row_array();}
	function logout() {
		$this->session->unset_userdata('id_pelanggan');
		$this->session->unset_userdata('nama_pelanggan');
		$this->session->unset_userdata('email_pelanggan');
		$this->session->unset_userdata('telp_pelanggan');
		$this->session->unset_userdata('alamat_pelanggan');
		$this->session->unset_userdata('poto_profil');
		$this->session->unset_userdata('last_login');
		$this->session->set_flashdata('sukses','Anda berhasil logout');
		redirect(base_url('login'),'refresh');}
	function Registrasi($regis){
		$this->db->select('*'); 
		$this->db->from('tbl_pelanggan');
		$this->db->where('email_pelanggan',$regis['email_pelanggan']);		
		$query =$this->db->get();

		if ($query->num_rows() == 0){$this->db->insert('tbl_pelanggan',$regis);
			if ($this->db->affected_rows()> 0) {$this->session->set_flashdata('berhasil','Registrasi Berhasil!');
				redirect('login');
			}
			else{$this->session->set_flashdata('gagal','Email sudah tersedia!');
				redirect('signup');
			}
		}
	}
	function AmbilGaleriDariKategori()
	{
		$this->db->order_by('kategori_galeri_id', 'asc');
        $result = $this->db->get('tbl_galeri')->result_array();
		$db_error = $this->db->initialize();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
	}
	function Blog(){
		return $this->db->query("SELECT a.*,b.* FROM tbl_blog a
			JOIN tbl_kategori_blog b ON a.kategoriblog_id=b.id_kategoriblog
			ORDER BY a.id_blog DESC")->result_array();
	}
	function KategoriBlog(){
		return $this->db->query("select * from tbl_kategori_blog order by id_kategoriblog desc")->result_array();
	}
	function ArsipBlog($bulan,$tahun){
		return $this->db->query("SELECT a.*,b.* FROM tbl_blog a
			JOIN tbl_kategori_blog b ON a.kategoriblog_id=b.id_kategoriblog WHERE MONTH(a.tgl_input)='$bulan' AND YEAR(a.tgl_input)='$tahun'
			ORDER BY DAY(a.tgl_input) DESC");
	}
	function Baca_Per_Id($id){
		return $this->db->query("SELECT a.*,b.* FROM tbl_blog a
			JOIN tbl_kategori_blog b ON a.kategoriblog_id=b.id_kategoriblog WHERE a.id_blog='$id'")->row_array();
	}
	function Latest_Blog(){
		return $this->db->query("SELECT a.*,b.* FROM tbl_blog a
			JOIN tbl_kategori_blog b ON a.kategoriblog_id=b.id_kategoriblog
			ORDER BY a.id_blog desc limit 2")->result_array();
	}
	function search($keyword){return $this->db->query("SELECT * FROM tbl_menu
			JOIN tbl_jenis_menu ON tbl_menu.jenis_menu_id=tbl_jenis_menu.id_jenis_menu
			WHERE nama_menu LIKE '%$keyword' OR harga_menu LIKE '$keyword%' OR detail_menu LIKE
			'%$keyword%' OR gambar_menu LIKE '%$keyword' OR jenis_menu LIKE '%$keyword'");
	}
	//Akhir Login
	function NotifNewOrderAll() {return $this->db->query("SELECT * from tbl_order
			join tbl_pelanggan on tbl_order.pelanggan_id=tbl_pelanggan.id_pelanggan
			where tbl_order.status_order='0' or tbl_order.status_order='200' or tbl_order.status_order='201'
			order by tbl_order.id_order  desc");}
	function TentangKami() {return $this->db->query("SELECT * FROM tbl_tentang_resto");
	}

	//Awal Menu
	function JenisMenu(){return $this->db->query("select * from tbl_jenis_menu order by id_jenis_menu desc");
	}
	function TampilPaketMenu(){return $this->db->query("select * from tbl_paket_menu order by id_paket_menu desc");
	}
	function TampilMenu(){return $this->db->query("SELECT * from tbl_menu");
	}
	function Menu() {return $this->db->query("SELECT a.*,b.*,c.*
			from tbl_menu a join tbl_jenis_menu b on a.jenis_menu_id=b.id_jenis_menu
			join tbl_menu_gambar c on a.id_menu=c.menu_id
			group by c.menu_id
			order by a.id_menu desc
			limit 0,15");}

	function MenuAll () {return $this->db->query("SELECT a.*,b.*
			from tbl_menu a join tbl_jenis_menu b on a.jenis_menu_id=b.id_jenis_menu
			order by a.id_menu");}
	function MenuSemua () {return $this->db->query("SELECT a.*,b.*
			from tbl_menu a join tbl_jenis_menu b on a.jenis_menu_id=b.id_jenis_menu
			order by a.id_menu asc limit 4");}
	function sJenisMenu($id) {return $this->db->query("SELECT a.*,b.*
			from tbl_menu a join tbl_jenis_menu b on a.jenis_menu_id=b.id_jenis_menu
			where b.id_jenis_menu='$id'
			order by a.id_menu desc");}
	function MenuPaketMenu($id) {return $this->db->query("SELECT * from tbl_paket_menu where id_paket_menu='$id'");}

	function MenuDetail($id) {return $this->db->query("SELECT a.*,b.* FROM tbl_menu a
			JOIN tbl_jenis_menu b on a.jenis_menu_id=b.id_jenis_menu
			WHERE a.id_menu='$id' ");}

	function MenuGambarId($id) {return $this->db->query("SELECT * FROM tbl_menu_gambar WHERE menu_id='$id'");}
	//Akhir menu

	//Awal paket menu
	function PaketMenu () {return $this->db->query("SELECT a.*,b.*
			FROM tbl_paket_menu a JOIN tbl_order b ON a.id_paket_menu=b.paket_menu_id
			GROUP BY a.id_paket_menu
			ORDER BY a.id_paket_menu asc
			");}
	function OrderMenu () {return $this->db->query("SELECT a.*,b.*
			FROM tbl_menu a JOIN tbl_order b ON a.id_menu=b.menu_id
			GROUP BY a.id_menu
			ORDER BY a.id_menu asc
			");} 
	//Akhir paket menu	
	function Order($id){return $this->db->query("SELECT * FROM tbl_order WHERE id_order='$id'");}
	function Pesan(){return $this->db->query("SELECT * FROM tbl_order WHERE status_order='0'or status_order='1'or status_order='2'");}
	function OrderDetail($id_pelanggan){return $this->db->query("SELECT a.*,b.*,c.*,d.* FROM tbl_order_detail a
			JOIN tbl_pelanggan b ON a.pelanggan_id=b.id_pelanggan
			JOIN tbl_order c ON a.order_id=c.id_order
			JOIN tbl_menu d ON a.menu_id=d.id_menu
			WHERE a.pelanggan_id='$id_pelanggan' ");}
	function OrderRiwayatTransaksi($id_pelanggan){
		return $this->db->query("SELECT a.*,b.*,c.* FROM tbl_order a
			JOIN tbl_pelanggan b ON a.pelanggan_id=b.id_pelanggan
			JOIN tbl_transaksi c ON a.id_order=c.order_id
			WHERE a.pelanggan_id='$id_pelanggan'
			ORDER BY a.tgl_order_masuk desc");
	}
	function OrderRiwayatTransaksiUpdate($id_pelanggan){
		return $this->db->query("SELECT a.*,b.*,c.* FROM tbl_order a
			JOIN tbl_pelanggan b ON a.pelanggan_id=b.id_pelanggan
			JOIN tbl_transaksi c ON a.id_order=c.order_id
			WHERE a.pelanggan_id='$id_pelanggan'
			ORDER BY a.update_status desc");
	}
	function OrderRiwayatTrans($id_pelanggan){return $this->db->query("SELECT a.*,b.*,c.* FROM tbl_transaksi a
			JOIN tbl_pelanggan b ON a.pelanggan_id=b.id_pelanggan
			JOIN tbl_order c ON a.order_id=c.id_order
			WHERE a.pelanggan_id='$id_pelanggan'
			ORDER BY a.id_transaksi desc");}
	function OrderRiwayat($id_pelanggan){return $this->db->query("SELECT a.*,b.* FROM tbl_order a
			JOIN tbl_pelanggan b ON a.pelanggan_id=b.id_pelanggan
			WHERE a.pelanggan_id='$id_pelanggan'");
	}
	function OrderRiwayatNotifikasi($id_pelanggan){return $this->db->query("SELECT a.*,b.*,c.* FROM tbl_order a
			JOIN tbl_pelanggan b ON a.pelanggan_id=b.id_pelanggan
			JOIN tbl_transaksi c ON a.id_order=c.order_id
			WHERE a.pelanggan_id='$id_pelanggan'
			ORDER BY a.status_order");}
	function CekPembayaran($id){$pecah=array();
		$ambil=$this->db->query("SELECT*FROM tbl_pembayaran WHERE order_id='$id'");
		// coba cek menggunakan numrows
		$yangcocok=$ambil->num_rows();
		if ($yangcocok>0)
		{$pecah=$ambil->row();
			return $pecah;
		}
		else
		{return"belumkirim";}
	}
	function AmbilPemesanan($id){return $this->db->query("SELECT * FROM tbl_order JOIN tbl_pelanggan ON pelanggan_id=id_pelanggan WHERE id_order='$id'");}	
	function RekeningAdmin(){return $this->db->query("SELECT * FROM tbl_rekening ORDER BY id_rekening ASC");
	}
	function Pembayaran($id){return $this->db->query("SELECT a.*,b.*,c.* FROM tbl_transaksi a
			JOIN tbl_pelanggan b ON a.pelanggan_id=b.id_pelanggan
			JOIN tbl_order c ON a.order_id=c.id_order
			WHERE c.id_order='$id'")->result_array();
	}function TransaksiPembayaran($id){return $this->db->query("SELECT a.*,b.*,c.* FROM tbl_transaksi a
			JOIN tbl_pelanggan b ON a.pelanggan_id=b.id_pelanggan
			JOIN tbl_order c ON a.order_id=c.id_order
			WHERE c.id_order='$id'");
	}
	function tampil_pembayaran_deadline($id){return $this->db->query("UPDATE tbl_order SET status_order='666'WHERE id_order <='$id'AND status_pembelian='0'OR status_pembelian='201'");}
	function DetailOrderById($id){return $this->db->query("SELECT a.*,b.*,c.*,d.* FROM tbl_order_detail a
			JOIN tbl_pelanggan b ON a.pelanggan_id=b.id_pelanggan
			JOIN tbl_order c ON a.order_id=c.id_order
			JOIN tbl_menu d ON a.menu_id=d.id_menu
			WHERE c.id_order='$id' ")->result_array();}
	function RecentOrder(){return $this->db->query("SELECT a.*,b.*,c.* FROM tbl_order_detail a
			JOIN tbl_order b ON a.order_id=b.id_order
			JOIN tbl_menu c ON a.menu_id=c.id_menu ORDER BY b.id_order  desc Limit 6");}
	function Terlaris(){
		return $this->db->query("SELECT a.*,b.*,c.* FROM tbl_order_detail a
			JOIN tbl_order b ON a.order_id=b.id_order
			JOIN tbl_menu c ON a.menu_id=c.id_menu group by a.menu_id=c.id_menu order by a.id_detail_order desc limit 6")->result_array();
	}
	//Awal Galeri
	function Galeri() {return $this->db->query("SELECT * FROM tbl_galeri order by id_galeri desc");
	}
	function GaleriKategori() {return $this->db->query("SELECT a.*,b.*
			FROM tbl_kategori_galeri a JOIN tbl_galeri b ON a.id_kategori_galeri=b.kategori_galeri_id
			GROUP BY a.id_kategori_galeri
			ORDER BY a.id_kategori_galeri asc
			");}
	function GaleriKategoriId($galeri) {return $this->db->query("SELECT a.*,b.* FROM tbl_kategori_galeri a JOIN tbl_galeri b ON a.id_kategori_galeri=b.kategori_galeri_id
			where a.id_kategori_galeri='$galeri' ORDER BY b.kategori_galeri_id DESC
			");}

	function GaleriDetail($id) {return $this->db->query("SELECT a.*,b.* FROM tbl_galeri a
			JOIN tbl_kategori_galeri b ON a.kategori_galeri_id=b.id_kategori_galeri
			WHERE a.kategori_galeri_id='$id' ");}
	function _checkout(){if ($this->session->userdata('id_pelanggan')=='') {echo"<script>alert('Silahkan login terlebih dahulu!');</script>";
			redirect(base_url('login'),'refresh');}
		else{$this->form_validation->set_rules('nama_order','Nama pemesan','required');
			$this->form_validation->set_rules('telp_order','Telepon pemesan','required');
			$this->form_validation->set_rules('tgl_perlu','Tanggal pengambilan','required');
			$this->form_validation->set_rules('jam_perlu','Jam pengambilan','required');
			$this->form_validation->set_rules('alamat_order','Telepon pemesan','required');
			$this->form_validation->set_rules('nama_provinsi','Nama Provinsi','required');
			$this->form_validation->set_rules('nama_kota','Nama Kota','required');

			if ($this->form_validation->run()==FALSE) {$validate = $this->session->set_flashdata('error', 'Silahkan Lengkapi!');
				redirect('checkout',$validate);
			}
			else{$id_pelanggan = $this->session->userdata('id_pelanggan');
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
			// mendapatkan status pembelian
				$status_order="0";
				$kode = rand();
				//jika keperluan diinputkan hari sebelumnya
				if ($this->input->post('tgl_perlu') <$tgl_order) {$salah = $this->session->set_flashdata('salah', 'Tanggal Perlu tidak bisa diinput hari sebelumnya!');
					redirect('checkout',$salah);
				}
				elseif($this->input->post('tgl_perlu') <$pemesanan_harus){$min_order = $this->session->set_flashdata('min_order', 'Minimal waktu pemesanan adalah 7 hari sebelum tanggal perlu!');
					redirect('checkout',$min_order);
				}
				else{$order = array('pelanggan_id'=> $id_pelanggan,
						'nama_order' 	=> $this->input->post('nama_order'),
						'telp_order' 	=> $this->input->post('telp_order'),
						'tgl_perlu'	 	=> $this->input->post('tgl_perlu'),
						'jam_perlu'	 	=> $this->input->post('jam_perlu'),
						'alamat_order'	=> $this->input->post('alamat_order'),
						'total_order'	=> $this->input->post('total_order'),
						'tgl_order_masuk' 		=> $tgl_order_masuk,
						'deadline_pembayaran'	=> $deadline_pembayaran,
						'status_order'			=> $status_order,
						'provinsi'			=> $this->input->post('nama_provinsi'),
						'distrik'			=> $this->input->post('nama_kota'),
						'tipe'			=> $this->input->post('tipe'),
						'kodepos_pengiriman'			=> $this->input->post('kode_pos'),
						'lama_pengiriman'			=> $this->input->post('lama_paket'),
					);
					$this->db->insert('tbl_order',$order);
					$id_order = $this->db->insert_id();

					$menu = $this->cart->contents();
					foreach ($menu as $menu) {$id = $menu['id'];}
					$model=$this->pelanggan_model->MenuDetail($id);
					foreach ($model->result_array() as $tampil){$jenis_produk = $tampil['jenis_menu'];
						$deskripsi 	  =	$tampil['detail_menu'];
					}

					$pemesanan = $this->cart->contents();
					foreach ($pemesanan as $cart) {$id_menu = $cart['id'];
						$qty = $cart['qty'];
						$price= $cart['price'];
						$name= $cart['name'];
						$subtotal= $cart['subtotal'];
						$this->db->insert('tbl_order_detail', array('order_id' 		=> $id_order,
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
					return $id_order;
				}
			}
		}
	}
	function KirimPembayaran($id_order){if ($this->session->userdata('id_pelanggan')=='') {echo"<script>alert('Silahkan login terlebih dahulu!');</script>";
			redirect(base_url('login'),'refresh');}
		else{$this->form_validation->set_rules('tgl_pembayaran','Tanggal Pembayaran','required');
			$this->form_validation->set_rules('bank','Bank','required');
			$this->form_validation->set_rules('nominal_pembayaran','Nominal Pembayaran','required');
			$this->form_validation->set_rules('no_rek','Nomor Rekening','required');
			$this->form_validation->set_rules('atas_nama','Nama','required');
			$this->form_validation->set_rules('id_rekening','Rekening','required');

			if ($this->form_validation->run()==FALSE) {$error = $this->session->set_flashdata("error","Silahkan Lengkapi!");
				redirect('checkout/pembayaran/'.$id_order,$error);
			}
			else{if(empty($_FILES['bukti']['name'])){$error = $this->session->set_flashdata("error","Silahkan Lengkapi!");
					redirect('checkout/pembayaran/'.$id_order,$error);
				}
				else{$config['upload_path'] ='./images/bukti_tf/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '10000';
					$config['max_width']  	= '*';
					$config['max_height']  	= '*';
					$this->load->library('upload', $config);

					$hari_ini=date("Y-m-d");
					$id = $id_order;
					$totpesan = $this->pelanggan_model->Order($id);
					foreach ($totpesan->result_array() as $total) {}
						//pembayaran DP minimal 70%
						$minimal = $total['total_order'] * 0.7;
						//Jika bayar lebih dari total pemesanan
					if ($this->input->post('nominal_pembayaran') > $total['total_order']) {$salah = $this->session->set_flashdata("salah","Pembayaran salah, cek kembali total pemesanan Anda!");
						redirect('checkout/pembayaran/'.$id_order,$salah);
					}
					elseif ($this->input->post('id_rekening')=="") {$error = $this->session->set_flashdata("error","Silahkan Lengkapi!");
						redirect('checkout/pembayaran/'.$id_order,$error);
					}
					elseif ($this->input->post('nominal_pembayaran') <$minimal){$kurang = $this->session->set_flashdata("kurang","Jika ingin pembayaran DP, minimal 70% dari total harga pemesanan!");
						redirect('checkout/pembayaran/'.$id_order,$kurang);
					}
					elseif ($this->input->post('tgl_pembayaran') > $total['deadline_pembayaran'] || $this->input->post('tgl_pembayaran') <$hari_ini){$deadline = $this->session->set_flashdata("deadline","Lakukan pembayaran sesuai batas tanggal yang ditentukan!");
						redirect('checkout/pembayaran/'.$id_order,$deadline);
					}
					else{if ($this->upload->do_upload("bukti")) {if ($this->input->post('nominal_pembayaran') >= $minimal && $this->input->post('nominal_pembayaran') <$total['total_order']) {$data	 	= $this->upload->data();
								$source     = "./images/bukti_tf/".$data['file_name'] ;
								chmod($source, 0777) ;

								$in_data['pelanggan_id'] 		= $this->session->userdata('id_pelanggan');
								$in_data['order_id']			= $id_order; 
								$in_data['rekening_id']			= $this->input->post('id_rekening');
								$in_data['tgl_konfirmasi']		= date("Y-m-d h-i-s");
								$in_data['tgl_pembayaran'] 		= $this->input->post('tgl_pembayaran');
								$in_data['bank'] 				= $this->input->post('bank');
								$in_data['nominal_pembayaran']	= $this->input->post('nominal_pembayaran');
								$in_data['no_rek']				= $this->input->post('no_rek');
								$in_data['atas_nama']			= $this->input->post('atas_nama');
								$in_data['bukti'] 				= $data['file_name'];

								$this->db->insert("tbl_pembayaran",$in_data);

								$tgl_order_masuk=date("Y-m-d H:i:s");
								$start_date = date($tgl_order_masuk);
								$expires = strtotime('+2 days', strtotime($tgl_order_masuk));
								$up['deadline_pembayaran']=date('Y-m-d H:i:s', $expires);
								$up['status_order'] = '1';
								$id_in['id_order'] = $id_order;
								$this->db->update('tbl_order',$up,$id_in);

								$sukses = $this->session->set_flashdata("sukses","suksesss!");
								redirect(base_url('akun/riwayat_transaksi'),$sukses);
							}
							else{if ($this->input->post('nominal_pembayaran') == $total['total_order']) {$in_data['pelanggan_id'] 		= $this->session->userdata('id_pelanggan');
									$in_data['order_id']			= $id_order; 
									$in_data['rekening_id']			= $this->input->post('id_rekening');
									$in_data['tgl_konfirmasi']		= date("Y-m-d h-i-s");
									$in_data['tgl_pembayaran'] 		= $this->input->post('tgl_pembayaran');
									$in_data['bank'] 				= $this->input->post('bank');
									$in_data['nominal_pembayaran']	= $this->input->post('nominal_pembayaran');
									$in_data['no_rek']				= $this->input->post('no_rek');
									$in_data['atas_nama']			= $this->input->post('atas_nama');
									$in_data['bukti'] 				= $data['file_name'];

									$this->db->insert("tbl_pembayaran",$in_data);
									$id_in['id_order'] = $id_order;
									$up['status_order'] = '1';

									$this->db->update('tbl_order',$up,$id_in);
									$sukses = $this->session->set_flashdata("sukses","suksesss!");
									redirect(base_url('akun/riwayat_transaksi'),$sukses);
								}								
							}							
						}
					}						
				}
			}
		}
	}
	function KirimPelunasan($id_order){if ($this->session->userdata('id_pelanggan')=='') {echo"<script>alert('Silahkan login terlebih dahulu!');</script>";
			redirect(base_url('login'),'refresh');}
		else{$this->form_validation->set_rules('tgl_pembayaran','Tanggal Pembayaran','required');
			$this->form_validation->set_rules('bank','Bank','required');
			$this->form_validation->set_rules('nominal_pembayaran','Nominal Pembayaran','required');
			$this->form_validation->set_rules('no_rek','Nomor Rekening','required');
			$this->form_validation->set_rules('atas_nama','Nama','required');

			if ($this->form_validation->run()==FALSE) {$error = $this->session->set_flashdata("error","Silahkan Lengkapi!");
				redirect('checkout/pelunasan/'.$id_order,$error);
			}
			else{if(empty($_FILES['bukti']['name'])){$error = $this->session->set_flashdata("error","Silahkan Lengkapi!");
					redirect('checkout/pelunasan/'.$id_order,$error);
				}
				else{$config['upload_path'] ='./images/bukti_tf/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '10000';
					$config['max_width']  	= '*';
					$config['max_height']  	= '*';
					$this->load->library('upload', $config);

					$hari_ini=date("Y-m-d");
					$id = $id_order;
					$pelunasan = $this->pelanggan_model->Pembayaran($id);							
					$totpesan = $this->pelanggan_model->Order($id);
					foreach ($pelunasan->result_array() as $pelunasan) {}
						foreach ($totpesan->result_array() as $total) {}
						//pembayaran DP minimal 70%
							$lunas = $total['total_order'] - $pelunasan['nominal_pembayaran'];
						//Jika bayar lebih dari total pemesanan
						if ($this->input->post('nominal_pembayaran') > $lunas) {$salah = $this->session->set_flashdata("salah","Pembayaran salah, cek kembali total pelunasan Anda!");
							redirect('checkout/pelunasan/'.$id_order,$salah);
						}
						elseif ($this->input->post('nominal_pembayaran') <$lunas){$kurang = $this->session->set_flashdata("kurang","Silahkan lakukan pelunasan!");
							redirect('checkout/pelunasan/'.$id_order,$kurang);
						}
						elseif ($this->input->post('tgl_pembayaran') > $total['deadline_pembayaran'] || $this->input->post('tgl_pembayaran') <$hari_ini){$deadline = $this->session->set_flashdata("deadline","Lakukan pelunasan pembayaran sesuai batas tanggal yang ditentukan!");
							redirect('checkout/pelunasan/'.$id_order,$deadline);
						}
						else{if ($this->upload->do_upload("bukti")) {$data	 	= $this->upload->data();
								$source     = "./images/bukti_tf/".$data['file_name'] ;

								chmod($source, 0777) ;

								$st['status_order'] = '1';
								$id_in['id_order'] = $id_order;
								$this->db->update('tbl_order',$st,$id_in);
								$in_data['pelanggan_id'] 		= $this->session->userdata('id_pelanggan');
								$in_data['order_id']			= $id_order; 
								$in_data['rekening_id']			= $this->input->post('id_rekening');
								$in_data['tgl_konfirmasi']		= date("Y-m-d h-i-s");
								$in_data['tgl_pembayaran'] 		= $this->input->post('tgl_pembayaran');
								$in_data['bank'] 				= $this->input->post('bank');
								$in_data['nominal_pembayaran']	= $this->input->post('nominal_pembayaran');
								$in_data['no_rek']				= $this->input->post('no_rek');
								$in_data['atas_nama']			= $this->input->post('atas_nama');
								$in_data['bukti'] 				= $data['file_name'];

								$this->db->insert("tbl_pembayaran",$in_data);


								$sukses = $this->session->set_flashdata("berhasil","suksesss!");
								redirect(base_url('akun/riwayat_transaksi'),$sukses);					
							}
						}						
					}
				}
			}
		}
	}