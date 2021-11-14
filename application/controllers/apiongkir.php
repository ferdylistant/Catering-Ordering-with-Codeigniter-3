<?php

defined('BASEPATH') OR exit('No direct script access allowed'); 

class apiongkir extends CI_Controller {
	private $api_key = 'df21c818972cbe41afe7b50dfe23ad30';
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('sistem_model');
	}
	public function provinsi()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=5",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: $this->api_key"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$data = json_decode($response, true);
			$dataprovinsi = $data['rajaongkir']['results'];
			echo '<option value="">--------Pilih Provinsi--------</option>';
				echo "<option value='".$dataprovinsi['province_id']."' nama='".$dataprovinsi['province']."'>".$dataprovinsi['province']."</option>";
			
		}
	}
	public function update_kota()
	{
		$id_provinsi = $this->input->post('id_provinsi');
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=&province=$id_provinsi",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: $this->api_key"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) 
		{
			echo "cURL Error #:" . $err;
		} 
		else 
		{
            // echo $response;
            // konvert data array
			$datakota=json_decode($response,TRUE);
            // hanya data kota
			$datkot=$datakota['rajaongkir']['results'];
			echo '<option value="">--------Pilih Kota--------</option>';
			foreach ($datkot as $key => $value){
				echo '<option value="'.$value['city_id'].'"
				nama="'.$value['city_name'].'"
				kodepos="'.$value['postal_code'].'"
				tipe="'.$value['type'] .'">'.$value['city_name'].'</option>';
			}
		}
	}
	public function ekspedisi(){
		echo '<option value="">--------Pilih Ekspedisi--------</option>
		<option value="tiki" nama="TIKI">Kampung Jawa Express</option>';
	}
	function update_ongkir()
	{
		$p = $this->sistem_model->TentangKami();
		foreach ($p->result_array() as $q) {
			
		}
		$id_asal = $q['lokasi'];
		$id_tujuan = $this->input->post('id_kota');
		$ekspedisi = $this->input->post('ekspedisi');
		$total_berat = $this->input->post('total_berat');
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=$id_asal&destination=$id_tujuan&weight=$total_berat&courier=$ekspedisi",
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: $this->api_key"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) 
		{
			echo "cURL Error #:" . $err;
		} 
		else 
		{
            // echo $response;
            // konvert data ke array
			$dataongkir = json_decode($response,TRUE);
            // echo "<pre>";
                // print_r($dataongkir);
            // echo "</pre>";
			$dataongkir = $dataongkir['rajaongkir']['results']['0']['costs'];
			echo '<option value="">--------Pilih Jenis--------</option>';
			foreach ($dataongkir as $key => $value){
				echo '<option value=""
				nama="'. $value['service'].'"
				biaya="'.$value['cost']['0']['value'].'"
				lama="'. $value['cost']['0']['etd'].'">'. $value['service'] .' Rp.'. number_format($value['cost']['0']['value']).' '. $value['cost']['0']['etd'].'</option>';
			}
			
		}
	}
}