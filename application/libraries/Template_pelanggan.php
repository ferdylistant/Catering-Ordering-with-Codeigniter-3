<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template_pelanggan {
	protected $CI;
	public function __construct(){
		$this->CI =& get_instance();
		$this->CI->load->model('pelanggan_model');
		$this->CI->load->model('chatbot_model');
	}
	public function login($email_pelanggan, $password_pelanggan){
		$check = $this->CI->pelanggan_model->login($email_pelanggan,$password_pelanggan);
		//Jika ada data pelanggan, maka create session login
		if ($check) {
			$id_pelanggan	= $check->$id_pelanggan;
			$nama_pelanggan	= $check->$nama_pelanggan;
			$telp_pelanggan	= $check->$telp_pelanggan;
			$alamat_pelanggan= $check->$alamat_pelanggan;
			$poto_profil= $check->$poto_profil;
			//Create Session

			$this->CI->session->set_userdata('id_pelanggan',$id_pelanggan);
			$this->CI->session->set_userdata('nama_pelanggan',$nama_pelanggan);
			$this->CI->session->set_userdata('email_pelanggan',$email_pelanggan);
			$this->CI->session->set_userdata('telp_pelanggan',$telp_pelanggan);
			$this->CI->session->set_userdata('alamat_pelanggan',$alamat_pelanggan);
			$this->CI->session->set_userdata('poto_profil',$poto_profil);

			redirect (base_url('akun/'),'refresh');
		}
		else{
			$this->CI->session->set_flashdata("error","Email atau Password Anda Salah!");
			redirect (base_url('login'),'refresh');
		}
	}
	
	
		var $template_data = array();
		
		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}
	
		function load($template_pelanggan = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
			
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
			$this->set('header', $this->CI->load->view('pelanggan/data/includes/header/index', $view_data, TRUE));
			$this->set('header_side', $this->CI->load->view('pelanggan/data/includes/header_side/index', $view_data, TRUE));
			$this->set('footer', $this->CI->load->view('pelanggan/data/includes/footer/index', $view_data, TRUE));
			$this->set('back_to_top', $this->CI->load->view('pelanggan/data/includes/back_to_top/index', $view_data, TRUE));			
			return $this->CI->load->view($template_pelanggan, $this->template_data, $return);
		}
}

/* End of file Template.php */
/* Location: ./pelanggan/application/libraries/Template.php */
