<?php

defined('BASEPATH') OR exit('No direct script access allowed'); 

class login extends CI_Controller { 

	public function __construct() {
		parent::__construct();
		$this->load->model('pelanggan_model');
		$this->load->model('chatbot_model');
		$this->load->library('session');
	}
	public function index() {
		
		$this->form_validation->set_rules('email_pelanggan','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password_pelanggan','Password','required');

		if ($this->form_validation->run() == false) {
			$data['tentang_resto'] = $this->pelanggan_model->TentangKami();
			$data['login_url'] = $this->googleplus->loginURL();
			$data['title'] = 'Login';
			$this->template_pelanggan->load('template_pelanggan','pelanggan/data/login/index',$data);
		}
		else{
			$this->_login();
		}
	}
	private function _login(){
		$email_pelanggan =$this->input->post('email_pelanggan');
		$password_pelanggan =$this->input->post('password_pelanggan');

		$pelanggan = $this->pelanggan_model->login($email_pelanggan, $password_pelanggan);

		//jika pelanggan ada
		if ($pelanggan) {
			if ($pelanggan['is_active'] == 1) {
				$data = [
					'id_pelanggan' => $pelanggan['id_pelanggan'],
					'email_pelanggan' => $pelanggan['email_pelanggan'] 

				];
				$this->session->set_userdata($data);
				if (empty($this->cart->contents())) {
					redirect (base_url('akun/'),'refresh');
				}
				else{
					redirect (base_url('cart/'),'refresh');
				}
			}
			else{
				$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Peringatan! akun dengan email <b>'.$email.'</b> belum aktif, silahkan cek email Anda dan lakukan aktivasi akun!</div>');
				redirect('login');
			}
		}
		else{
			$this->session->set_flashdata("error","Email atau Password Anda Salah!");
			redirect ('login');
		}
	}
	public function with_google(){
		if (isset($_GET['code'])) {
			$this->googleplus->getAuthenticate();
			$this->session->set_userdata('login',true);
			$this->session->set_userdata('user_profile',$this->googleplus->getUserInfo());
			$user = $this->session->userdata('user_profile');
			$dataGoogle = [
				'nama_pelanggan' => $user['name'],
				'email_pelanggan' => $user['email'],
				'poto_profil'	=> $user['picture']
			];
			$cekPelanggan = $this->db->get_where('tbl_pelanggan', ['email_pelanggan' => $user['email']])->row_array();
			if (count($cekPelanggan) > 0) {
				if ($this->session->userdata('login') != true) {
					$this->session->set_userdata('id_pelanggan', $cekPelanggan['id_pelanggan']);
					$this->session->set_userdata('email_pelanggan', $cekPelanggan['email_pelanggan']);
					$this->session->set_userdata('nama_pelanggan', $cekPelanggan['nama_pelanggan']);
					$this->session->set_userdata('telp_pelanggan', $cekPelanggan['telp_pelanggan']);
					$this->session->set_userdata('alamat_pelanggan', $cekPelanggan['alamat_pelanggan']);
					$this->session->set_userdata('password_pelanggan', $cekPelanggan['password_pelanggan']);
					redirect('akun','refresh');
				}
				else{
					$this->session->set_userdata('id_pelanggan', $cekPelanggan['id_pelanggan']);
					$this->session->set_userdata('email_pelanggan', $cekPelanggan['email_pelanggan']);
					$this->session->set_userdata('nama_pelanggan', $cekPelanggan['nama_pelanggan']);
					$this->session->set_userdata('telp_pelanggan', $cekPelanggan['telp_pelanggan']);
					$this->session->set_userdata('alamat_pelanggan', $cekPelanggan['alamat_pelanggan']);
					$this->session->set_userdata('password_pelanggan', $cekPelanggan['password_pelanggan']);
					$this->session->set_userdata('poto_profil', $cekPelanggan['poto_profil']);
					redirect('akun','refresh');
				}
			}
			else{
				$this->db->insert('tbl_pelanggan', $dataGoogle);
				$id = $this->db->insert_id();
				$cekPelangganBaru = $this->db->get_where('tbl_pelanggan', ['email_pelanggan' => $user['email']])->row_array();
				$aktif = ['is_active' => 1];
				$this->db->where('email_pelanggan', $cekPelangganBaru['email_pelanggan']);
				$this->db->update('tbl_pelanggan', $aktif);
				$this->session->set_userdata('id_pelanggan',$id);
				$this->session->set_userdata($dataGoogle);
				redirect('akun','refresh');
			}
		}
	}
	public function logout() {
		$this->googleplus->revokeToken();
		$this->pelanggan_model->logout();
	}
}

