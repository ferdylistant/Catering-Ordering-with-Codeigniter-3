<?php

defined('BASEPATH') OR exit('No direct script access allowed'); 

class cart extends CI_Controller {

	public function __construct() { 
		parent::__construct();
		$this->load->model('pelanggan_model');
		$this->load->model('chatbot_model');
		$this->load->library('session');
	}
	public function index() {
		
		$data['title'] = 'Checkout';
		$this->template_pelanggan->load('template_pelanggan','pelanggan/data/cart/index',$data);
	}
	public function add(){
		//ambil data dari form
		$data = array(
			'id' => $this->input->post('id'), 
			'name' => $this->input->post('name'), 
			'price' => $this->input->post('price'), 
			'qty' => $this->input->post('qty'), 
		);

		// if ($data['qty'] < 10) {
			// echo "<script>alert('Minimal pembelian 10 pcs');history.go(-1);</script>";

		// }
		// else {

		$this->cart->insert($data);
			// redirect page
			redirect('cart','refresh'); //tampilkan cart setelah added
		// }

		}
		public function load_cart(){ 
			echo $this->show_cart();
		}
		public function load_keranjang(){
			echo $this->show_keranjang_cart();
		}
		public function load_badge(){
			echo $this->show_badge_cart();
		}
		public function show_cart(){
			$output = '';
			$no = 0;
			$krj=$this->cart->contents();
			if (empty($krj)) {

			}
			else{	
				foreach ($krj as $krj) {
					$id = $krj['id'];
					$model=$this->pelanggan_model->MenuDetail($id);
					foreach ($model->result_array() as $tampil) {

						$no++;
						$output .='
						<tr>
						<td class="text-center">'.$no.'</td>
						<td class="text-center isotope-item">
						<a class="btn-show-gallery" href="'.base_url('images/menu/'.$tampil['gambar_menu']).'"  data-lightbox="menu">
						<img class="img-rounded" src="'.base_url('images/menu/'.$tampil['gambar_menu']).'" style="width: 72px; height: 72px;">
						</a>
						</td> 
						<td>
						<h3 class="txt22"><span>'.$krj['name'].'</span></h4>
						<h6 class="txt32">Jenis: <span class="txt24">'.$tampil['jenis_menu'].'</span></h6>
						</td>
						<td class="text-center txt10"><span>'.$krj['qty'].'</span></td>
						<td class="text-center txt10"><span>'.rupiah($krj['price']).'</span></td>
						<td class="text-center txt10"><span>'.rupiah($krj['subtotal']).'</span></td>
						<td class="text-center"><button type="button" id="'.$krj['rowid'].'" class="hapus_cart form-control btn btn-warning m-t-10 txt10" style="color:white"><span class="fa fa-times"></span> Cancel</button></td>
						</tr>
						';
					}
				}
				$output .= '
				<tr>
				<th colspan="7" class="text-center txt25 "><strong style="float:right"><span class="txt35">Total Pemesanan</span><br>'.rupiah($this->cart->total()).'</strong></th>
				</tr>
				';
				return $output;
			}

		}
		private function show_badge_cart(){
			$output = '';
			$no = 0;
			$badge=$this->cart->contents();
			$output .= count($badge);
			return $output;
		}
		private function show_keranjang_cart(){
			$output = '';
			$krj=$this->cart->contents();
			if (!empty($krj)) {
				$output .='<li id="cart" style="overflow-x: hidden;overflow-y: scroll;height: 330px">';
				foreach ($krj as $krj) {
					$id = $krj['id'];
					$model=$this->pelanggan_model->MenuDetail($id);
					foreach ($model->result_array() as $tampil) {
						$output .=

						'
						<div class="cart-food">
						<div class="item col-lg-12 p-t-10">
						<img class="bo-rad-10" src="'.base_url('images/menu/'.$tampil['gambar_menu']).'" alt="" style="width: 100px;align-items: center;"><button type="button" id="'.$krj['rowid'].'" class="hapus_badge_cart item-right batal"><i class="fa fa-times"></i></button>
						<div class="text p-t-10" style="float: left; margin: 0 0 0 ;">
						<span class="tit10">'.$krj['name'].'</span>
						<p>'.$krj['qty'].'x Rp.'.number_format($krj['price']).'</p>
						</div>
						<div class="sub-total p-b-15" style="margin: 0 0 0 0; float: left; width: 100%;border-bottom: dashed;" >
						<span>SUBTOTAL: <strong>Rp.'.number_format($krj['subtotal']).'</strong></span>
						</div>
						</div>
						</div>';
					}
				}
				$output .='</li>
				<li class="divider"></li>	
				<div style="margin: 0 0 0 0; float: right; width: 100%;" >
				<span>TOTAL: <strong>Rp.'.$this->cart->total().'</strong></span>
				<div class="m-l-3 m-t-10">
				<a href="'.base_url('cart').'" style="font-size:13px; width: 48%; float: left; border-radius: 5px; text-align: center; color: #fff; text-transform: uppercase; padding: 11px 0;" class="btn3">view cart</a>
				<a href="'.base_url('checkout').'"  style="padding-right: auto; font-size:13px; width: 48%; float: left; border-radius: 5px; text-align: center; color: #fff; text-transform: uppercase; padding: 11px 0;" class="btn7">Check Out</a>
				</div>
				</div>';
			}
			else{
				$output .='
				<li id="cart" style="height: 160px;align-items: center;">
				<div class="col-lg-12 m-t-40" align="center">
				<img style="width: 60px;" src="'.base_url("images/icons/cart.png").'">
				<br>
				<span class="txt24">Belum Ada Pemesanan</span>
				</div>

				</li>';
			}
			return $output;
		}
		public function update(){
			$rowid 	=  $this->input->post("rowid");
			$qty 	=  $this->input->post("qty");
			if ($qty < 10) {
				echo "<script>alert('Minimal pembelian 10 pcs');</script>";
				redirect(base_url('cart'),'refresh');
			}
			else{

				$data = array(
					'rowid' => $rowid,
					'qty'   => $qty
				);

				$this->cart->update($data);

				$this->session->set_flashdata('update','ok');
				redirect("cart",'refresh');
			}

		}
		public function delete(){

			$data = array(
				'rowid' => $this->input->post('row_id'), 
				'qty' => 0, 
			);
			$this->cart->update($data);
			echo $this->show_cart();		

		}
		public function delete_badge(){

			$data = array(
				'rowid' => $this->input->post('row_id'), 
				'qty' => 0, 
			);
			$this->cart->update($data);
			echo $this->show_keranjang_cart();
		}
		public function empty(){

			$this->cart->destroy();
			$this->session->set_flashdata('sukses','Anda berhasil logout');
			if ($this->cart->contents()==null) {

				redirect(base_url('menu'),'refresh');
			}
			else{
				redirect(base_url('cart'),'refresh');
			}
		}
	}


