<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class menu extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('pelanggan_model');
		$this->load->model('chatbot_model');
		$this->load->library('session');
	}
	public function index() {
		$data['menu'] 			= $this->pelanggan_model->MenuAll();
		$data['recent'] 			= $this->pelanggan_model->RecentOrder();
		$data['jenis_menu'] 			= $this->pelanggan_model->JenisMenu();
		$data['terlaris'] 			= $this->pelanggan_model->Terlaris();
		$data['title']			= 'Menu';

		$this->template_pelanggan->load('template_pelanggan','pelanggan/data/menu/index',$data);

	}
	public function detail($idM) { 
		$id = base64_decode($idM);
		$data['detail'] 			= $this->pelanggan_model->MenuDetail($id);
		$data['title']			= 'Detail Menu';
		$this->template_pelanggan->load('template_pelanggan','pelanggan/data/menu/detail',$data);
	}
	public function jenis_menu() {
		$id = $this->uri->segment(3);
		$data['j_menu'] 			= $this->pelanggan_model->sJenisMenu($id);
		$data['recent'] 			= $this->pelanggan_model->RecentOrder();
		$data['jenis_menu'] 			= $this->pelanggan_model->JenisMenu();
		$data['title']			= 'Jenis Menu';


		$this->template_pelanggan->load('template_pelanggan','pelanggan/data/menu/jenis_menu',$data);

	}
	public function search(){    // Ambil data NIS yang dikirim via ajax post
		$keyword = strtolower(trim($this->input->post('keyword')));
		$data['menu'] = $this->pelanggan_model->search($keyword);
	  	// Kita load file view.php sambil mengirim data siswa hasil query function search
		$hasil = $this->load->view('pelanggan/data/menu/view_menu', $data,true);
	  	// Buat sebuah array
		$callback = array(
	  		'hasil' => $hasil, // Set array hasil dengan isi dari view.php yang diload tadi
	  	);
	  	echo json_encode($callback); // konversi varibael $callback menjadi JSON
	  }
	  public function recent_order(){
	  	$recent = $this->pelanggan_model->RecentOrder(); 
	  	$output ="";
	  	$output .="<h4 class='txt33 p-b-35 p-t-58'>
	  	Recent Order
	  	</h4>";
	  	foreach ($recent->result_array() as $recent) {
	  		$idM = base64_encode($recent['menu_id']);
	  		$output .="
	  		<ul>
	  		<li class='flex-w m-b-25'>
	  		<div class='size16 bo-rad-10 wrap-pic-w of-hidden m-r-18'>
	  		<a href='".base_url('menu/detail/'.$idM)."'>
	  		<img style='width: 93px' src='".base_url('images/menu/'.$recent['gambar_menu'])."' alt='IMG-RECENT'>
	  		</a>
	  		</div>
	  		<div class='size28'>
	  		<a href='".base_url('menu/detail/'.$idM)."' class='dis-block txt28 m-b-8'>".$recent['nama_produk']
	  		."</a>
	  		<p class='txt10'>".
	  		$recent['jenis_produk']
	  		."</p>
	  		<span class='txt14'>".
	  		waktu_lalu($recent['tgl_order_masuk'])
	  		."</span>
	  		</div>
	  		</li>
	  		</ul>";
	  	}
	  	$data = array('hasil' => $output,true );
	  	echo json_encode($data);
	  }

	}

