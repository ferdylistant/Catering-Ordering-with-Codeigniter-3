<?php

defined('BASEPATH') OR exit('No direct script access allowed'); 

class datadaerah extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->controller('apiongkir');
		$this->load->library('session');
	}
	public function index(){
		$datprov =$this->apiongkir->update_provinsi();
		// echo "<pre>";
  //              // print_r($datprov);
  //           echo "</pre>";
		$output = ''; 
		$output .='<option value="">Pilih Provinsi</option>'.foreach ($datprov as $key => $value):.'
		<option value="'.echo $value['province_id'].'" nama="'.echo $value['province'].'">'.echo $value['province'].'</option>'.endforeach.'';
		return $output;

	}
	public function data_kota(){
		$idprov=$this->input->post('idprov');
		$datkot=$this->apiongkir->update_kota($idprov);
		$output = '';
		$output .='<option value="">Pilih Kota</option>'.foreach ($datkot as $key => $value):.'<option value="'.echo $value['city_id'].'" nama="'. echo $value['city_name'].'" kodepos="'.echo $value['postal_code'].'" tipe="'.echo $value['type'].'">'.echo $value['type'];echo $value['city_name'];.'</option>'.endforeach.'';
		return $output;
	}
	public function dataekspedisi(){
		$output = '';
		$output .='<option value="">Pilih ekspedisi</option>
		<option value="tiki" nama="TIKI">TIKI</option>
		<option value="pos" nama="POS">POS</option>
		<option value="jne" nama="JNE">JNE</option>';
		return $output;
	}
	public function dataongkir(){
		$id_kota=$this->input->post('id_kota');
		$ekspedisi=$this->input->post('ekspedisi');
		// obyek apiongkir menjalankan fungsi update(ongkir)
		$this->apiongkir->update_ongkir(419,$id_kota,$ekspedisi);
// 419 diasumsikan pengiriman dari sleman
		
}

}