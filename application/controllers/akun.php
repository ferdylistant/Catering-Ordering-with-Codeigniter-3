<?php

defined('BASEPATH') OR exit('No direct script access allowed'); 

class akun extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$params = array('server_key' => 'SB-Mid-server-Q2zVnvjTjb5MYFx4-5AE1c_F', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->model('pelanggan_model');
		$this->load->model('chatbot_model');
		$this->load->library('session');
		$this->load->library('encrypt');
	}
	public function index(){
		if ($this->session->userdata('id_pelanggan')=='') {
			redirect('login');
		}
		else{
			$id = $this->session->userdata('id_pelanggan');
			$id = base64_encode($id);
			redirect('akun/p/'.$id);
		}
	}
	public function p($id){
		$id = base64_decode($id);
		$data['pelanggan'] = $this->pelanggan_model->Akun();
		$data['order_detail'] = $this->pelanggan_model->OrderDetail($id);
		$data['title'] =  'Akun';
		$this->template_pelanggan->load('template_pelanggan','pelanggan/data/akun/index',$data);
	}
	public function p_edit($idP){
		if ($this->session->userdata('id_pelanggan')=='') {
			redirect('login');
		}
		else{
			$id = base64_decode($idP);
			$data['edit'] = $this->pelanggan_model->AkunEdit($id);
			$data['title'] =  'Akun';
			$this->template_pelanggan->load('template_pelanggan','pelanggan/data/akun/edit_profil',$data);
		}
	}
	public function profile_update(){

		if($this->session->userdata("id_pelanggan")!=="" ) {

			$id['id_pelanggan'] = $this->input->post("id_pelanggan");

			if(empty($_FILES['poto_profil']['name']))
			{
				$up['nama_pelanggan'] 			= $this->input->post('nama_pelanggan');
				$up['telp_pelanggan'] 	= $this->input->post('telp_pelanggan');
				$up['alamat_pelanggan'] 	= $this->input->post('alamat_pelanggan');
				$this->db->update("tbl_pelanggan",$up,$id);

				$this->session->set_flashdata('update','ok');
				redirect("akun/");
			}
			else
			{
				$path = './upload/pelanggan/';
				$config['upload_path'] = $path;
				$config['allowed_types']= 'gif|jpg|png|jpeg';
				$config['encrypt_name']	= TRUE;
				$config['remove_spaces']	= TRUE;	
				$config['max_size']     = '10000';
				$config['max_width']  	= '*';
				$config['max_height']  	= '*';
				
				
				$this->load->library('upload', $config);
				
				if ($this->upload->do_upload("poto_profil")) {
					$data	 	= $this->upload->data();
					$source     = "./upload/pelanggan/".$data['file_name'] ;
					
					chmod($source, 0777) ; 
					$gambarlama = $this->input->post('poto_profil');
					$in_data['nama_pelanggan'] 	= $this->input->post('nama_pelanggan');
					$in_data['telp_pelanggan'] 	= $this->input->post('telp_pelanggan');
					$in_data['alamat_pelanggan']= $this->input->post('alamat_pelanggan');
					$in_data['poto_profil'] 	= $data['file_name'];
					
					$this->db->update("tbl_pelanggan",$in_data,$id);
					@unlink($path.$gambarlama);
					$this->session->set_flashdata('update','OK');
					redirect("akun");
					
				}
			}

		}
		else{
			redirect('login');

		}
	}
}

