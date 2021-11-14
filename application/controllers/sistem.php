<?php defined('BASEPATH') OR exit('No direct script access allowed');

class sistem extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('sistem_model');
		$this->load->model('chatbot_model');
		$this->datatables->setDatabase('kampungjawa');
	}

	public function index () {
		$this->load->view('sistem/login');

	}

	public function login() {
		$session_set_value = $this->session->all_userdata();
		if (isset($session_set_value['remember_me']) && $session_set_value['remember_me'] == "1") {
			redirect("sistem/home");
		}
		else {
			$this->form_validation->set_rules('username_admin','Username','required');
			$this->form_validation->set_rules('password_admin','Password','required');

			if ($this->form_validation->run()==FALSE) {
				$this->load->view('sistem/login');

			}
			else {
				$username_admin = $this->input->post('username_admin');
				$password_admin = md5($this->input->post('password_admin'));

				$this->sistem_model->CekLogin($username_admin,$password_admin);

			}
		}
	}

	public function logout() {
		$this->sistem_model->logout();
	}

	public function home() { 

		if($this->session->userdata("id_admin")!=="") {

			$data['new_order'] 	= $this->sistem_model->NewOrder();
			$data['pelanggan'] 	= $this->sistem_model->JumlahPelanggan();
			$data['menu'] 	= $this->sistem_model->JumlahMenu();
			$data['terjual'] 	= $this->sistem_model->JumlahTerjual();
			$data['pemesanan'] 	= $this->sistem_model->JumlahPesanan();
			$data['title'] 	= 'Home';
			$this->template_system->load('template_system','sistem/data/index',$data);
		}
		else{
			redirect('sistem');
		}
	}
	public function daftar_plg(){
		if($this->session->userdata("id_admin")!=="" ) {
			$data['daftar_plg']	= $this->sistem_model->DaftarPelanggan();
			$data['title'] 	= 'Daftar Pelanggan';
			$this->template_system->load('template_system','sistem/data/daftar_plg/index',$data);
		}
		else{
			redirect('sistem');
		}
	}
	public function daftar_plg_detail() {

		if($this->session->userdata("id_admin") !=="" ) {

			$id = $this->uri->segment(3);
			$data['plg_detail'] = $this->sistem_model->DetailPelanggan($id);
			$data['order_detail'] = $this->sistem_model->OrderDetail($id);
			$data['title'] 	= 'Detail';
			$this->template_system->load('template_system','sistem/data/daftar_plg/detail',$data);

		}
		else{
			redirect('sistem');
		}
	}
	//Awal Category Gallery

	public function kategori_galeri() {

		if($this->session->userdata("id_admin")!=="" ) {
			$data['kategori_galeri']	= $this->sistem_model->KategoriGaleri();
			$data['title'] 	= 'Kategori Galeri';
			$this->template_system->load('template_system','sistem/data/kategori_galeri/index',$data);
		}
		else{
			redirect('sistem');

		}
	}

	public function kategori_galeri_tambah () {

		if($this->session->userdata("id_admin")!=="" ) {
			$data['title'] 	= 'Tambah';
			$this->template_system->load('template_system','sistem/data/kategori_galeri/add',$data);
		}
		else{
			redirect('sistem');
		}
	}

	public function kategori_galeri_simpan () {
		if($this->session->userdata("id_admin")!=="" ) {

			$this->form_validation->set_rules('nama_kategori_galeri', 'Category Gallery', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				redirect('sistem/kategori_galeri_tambah');

			}
			else {
				$in['nama_kategori_galeri'] = $this->input->post('nama_kategori_galeri');

				$this->db->insert("tbl_kategori_galeri",$in);

				$this->session->set_flashdata('berhasil','ok');
				redirect("sistem/kategori_galeri");
			}
		}
		else{
			redirect('sistem');
		}
	}

	public function kategori_galeri_delete() {
		if($this->session->userdata("id_admin")!=="" ) {

			$id = $this->uri->segment(3);
			$this->sistem_model->DeleteKategoriGaleri($id);

			$this->session->set_flashdata('hapus','ok');
			redirect("sistem/kategori_galeri");
		}
		else{
			redirect('sistem');
		}
	}

	public function kategori_galeri_edit() {

		if($this->session->userdata("id_admin")!=="" ) {

			$id = $this->uri->segment(3);

			$query = $this->sistem_model->EditKategoriGaleri($id);

			foreach ($query->result_array() as $value) {
				$data['id_kategori_galeri'] 	=  $value['id_kategori_galeri'];
				$data['nama_kategori_galeri'] =  $value['nama_kategori_galeri'];
			}
			$data['title'] 	= 'Edit';
			$this->template_system->load('template_system','sistem/data/kategori_galeri/edit',$data);
		}
		else{
			redirect('sistem');
		}
	}


	public function kategori_galeri_update() {

		if($this->session->userdata("id_admin")!=="" ) {

			$id['id_kategori_galeri'] 	=  $this->input->post("id_kategori_galeri");
			$up['nama_kategori_galeri'] 	=  $this->input->post("nama_kategori_galeri");

			$this->db->update("tbl_kategori_galeri",$up,$id);

			$this->session->set_flashdata('update','ok');
			redirect("sistem/kategori_galeri");
		}
		else{
			redirect('sistem');
		}
	}
	//Akhir Category Gallery
	//Awal galeri
	public function galeri () {
		if($this->session->userdata("id_admin")!=="" ) {

			$data['galeri'] =  $this->sistem_model->GetGaleri();
			$data['title'] 	= 'Galeri';
			$this->template_system->load('template_system','sistem/data/galeri/index',$data);
		}
		else{
			redirect('sistem');
		}
	}

	public function galeri_tambah() {

		if($this->session->userdata("id_admin")!=="" ) {

			$data['kategori'] = $this->sistem_model->KategoriGaleri();
			$data['title'] 	= 'Tambah';
			$this->template_system->load('template_system','sistem/data/galeri/add',$data);
		}
		else{
			redirect('sistem');
		}
	}

	public function galeri_simpan() {

		if($this->session->userdata("id_admin")!=="" ) {

			$this->form_validation->set_rules('kategori_galeri_id','Category Gallery','required');
			$this->form_validation->set_rules('nama_galeri','Gallery Name','required');

			if ($this->form_validation->run()==FALSE) {
				redirect('sistem/galeri_tambah');
			}
			else {
				if(empty($_FILES['userfile']['name']))
				{
					redirect('sistem/galeri_tambah');
				}
				else
				{
					$config['upload_path'] = './images/galeri/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;
					$config['max_size']     = '3000';
					$config['max_width']  	= '*';
					$config['max_height']  	= '*';


					$this->load->library('upload', $config);
					if ($this->upload->do_upload("userfile")) {

						$data	 	= $this->upload->data();


						$source             = "./images/galeri/".$data['file_name'] ;

						chmod($source, 0777) ;

						$in['nama_galeri'] 			= $this->input->post('nama_galeri');
						$in['gambar'] 				= $data['file_name'];
						$in['kategori_galeri_id'] 	= $this->input->post('kategori_galeri_id');

						$this->db->insert("tbl_galeri",$in);

						$this->session->set_flashdata('berhasil','OK');
						redirect("sistem/galeri");
					}
					else
					{
						redirect('sistem/galeri_tambah');
					}
				}
			}
		}
		else{
			redirect('sistem');
		}

	}

	public function galeri_edit() {

		if($this->session->userdata("id_admin")!=="" ) {

			$id = $this->uri->segment(3);

			$query =  $this->sistem_model->EditGaleri($id);

			foreach ($query->result_array() as $value) {
				$data['id_galeri'] 			=  $value['id_galeri'];
				$data['nama_galeri'] 		=  $value['nama_galeri'];
				$data['gambar'] 			=  $value['gambar'];
				$data['kategori_galeri_id'] =  $value['kategori_galeri_id'];
			}

			$data['kategori'] =  $this->sistem_model->KategoriGaleri();
			$data['title'] 	= 'Edit';
			$this->template_system->load('template_system','sistem/data/galeri/edit',$data);
		}
		else{
			redirect('sistem');
		}
	}

	public function galeri_update() {

		if($this->session->userdata("id_admin")!=="" ) {

			$id['id_galeri'] = $this->input->post("id_galeri");

			if(empty($_FILES['userfile']['name']))
			{
				$up['nama_galeri'] 			= $this->input->post('nama_galeri');
				$up['kategori_galeri_id'] 	= $this->input->post('kategori_galeri_id');

				$this->db->update("tbl_galeri",$up,$id);

				$this->session->set_flashdata('update','ok');
				redirect("sistem/galeri");
			}
			else
			{
				$path = './images/galeri/';
				$config['upload_path'] = $path;
				$config['allowed_types']= 'gif|jpg|png|jpeg';
				$config['encrypt_name']	= TRUE;
				$config['remove_spaces']	= TRUE;
				$config['max_size']     = '10000';
				$config['max_width']  	= '*';
				$config['max_height']  	= '*';


				$this->load->library('upload', $config);

				if ($this->upload->do_upload("userfile")) {
					$data	 	= $this->upload->data();
					$source             = "./images/galeri/".$data['file_name'] ;
					chmod($source, 0777) ;

					$gambarlama = $this->input->post('gambar');
					$in_data['nama_galeri'] 		= $this->input->post('nama_galeri');
					$in_data['kategori_galeri_id'] 	= $this->input->post('kategori_galeri_id');
					$in_data['gambar'] 				= $data['file_name'];

					$this->db->update("tbl_galeri",$in_data,$id);
					@unlink($path.$gambarlama);
					$this->session->set_flashdata('update','OK');
					redirect("sistem/galeri");

				}
				else
				{
					redirect('sistem/galeri_edit');
				}
			}

		}
		else{
			redirect('sistem');

		}

	}

	public function galeri_delete() {

		if($this->session->userdata("id_admin")!=="" ) {
			$path = './images/galeri/';
			$id = $this->uri->segment(3);
			$query =  $this->sistem_model->EditGaleri($id);
			foreach ($query->result_array() as $value) {
				$gambar	=  $value['gambar'];
			}
			$this->sistem_model->DeleteGaleri($id);
			@unlink($path.$gambar);
			$this->session->set_flashdata('hapus','ok');
			redirect("sistem/galeri");


		}
		else{
			redirect('sistem');

		}

	}
	//Akhir Galeri
	//Awal Data Rekening
	public function rekening () {

		if($this->session->userdata("id_admin")!=="" ) {

			$data['rekening'] =  $this->sistem_model->GetRekening();

			$this->template_system->load('template_system','sistem/data/rekening/index',$data);

		}
		else{
			redirect('sistem');

		}

	}

	public function rekening_tambah() {

		if($this->session->userdata("id_admin")!=="" ) {

			$data['rekening'] = $this->sistem_model->GetRekening();

			$this->template_system->load('template_system','sistem/data/rekening/add',$data);

		}
		else{
			redirect('sistem');

		}

	}

	public function rekening_simpan() {

		if($this->session->userdata("id_admin")!=="" ) {

			$this->form_validation->set_rules('nama_bank','Nama Bank','required|trim');
			$this->form_validation->set_rules('nomor_rekening','Nomor Rekening','required|trim');
			$this->form_validation->set_rules('nama_pemilik','Nama Pemilik','required|trim');

			if ($this->form_validation->run()==FALSE) {

				$data['rekening'] = $this->sistem_model->GetRekening();

				$this->template_system->load('template_system','sistem/data/rekening/add',$data);

			}
			else {

				if(empty($_FILES['userfile']['name']))
				{
					$up['nama_bank'] 		= $this->input->post('nama_bank');
					$up['nomor_rekening'] 	= $this->input->post('nomor_rekening');
					$up['nama_pemilik'] 	= $this->input->post('nama_pemilik');
					$this->db->insert("tbl_rekening",$up,$id);

					$this->session->set_flashdata('berhasil','ok');
					redirect("sistem/rekening");


				}
				else
				{
					$config['upload_path'] = './images/rekening/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;
					$config['max_size']     = '3000';
					$config['max_width']  	= '*';
					$config['max_height']  	= '*';
					$this->load->library('upload', $config);
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
						$source             = "./images/rekening/".$data['file_name'] ;

						chmod($source, 0777) ;

						$in['nama_bank'] 			= $this->input->post('nama_bank');
						$in['nomor_rekening'] 		= $this->input->post('nomor_rekening');
						$in['nama_pemilik'] 		= $this->input->post('nama_pemilik');
						$in['gambar'] 				= $data['file_name'];

						$this->db->insert("tbl_rekening",$in);

						$this->session->set_flashdata('berhasil','OK');
						redirect("sistem/rekening");

					}

					else
					{
						$data['rekening'] = $this->sistem_model->GetRekening();

						$this->template_system->load('template_system','sistem/data/rekening/add',$data);
					}

				}


			}


		}
		else{
			redirect('sistem');

		}

	}

	public function rekening_edit() {

		if($this->session->userdata("id_admin")!=="" ) {

			$id = $this->uri->segment(3);

			$query =  $this->sistem_model->EditRekening($id);

			foreach ($query->result_array() as $value) {
				$data['id_rekening'] 		=  $value['id_rekening'];
				$data['nama_bank'] 			=  $value['nama_bank'];
				$data['nomor_rekening'] 	=  $value['nomor_rekening'];
				$data['nama_pemilik'] 		=  $value['nama_pemilik'];
				$data['gambar'] 			=  $value['gambar'];
			}

			$data['rekening'] =  $this->sistem_model->GetRekening();

			$this->template_system->load('template_system','sistem/data/rekening/edit',$data);

		}
		else{
			redirect('sistem');

		}

	}

	public function rekening_update() {

		if($this->session->userdata("id_admin")!=="" ) {

			$id['id_rekening'] = $this->input->post("id_rekening");

			if(empty($_FILES['userfile']['name']))
			{

				$up['nama_bank'] 			= $this->input->post('nama_bank');
				$up['nomor_rekening'] 			= $this->input->post('nomor_rekening');
				$up['nama_pemilik'] 			= $this->input->post('nama_pemilik');

				$this->db->update("tbl_rekening",$up,$id);

				$this->session->set_flashdata('update','ok');
				redirect("sistem/rekening");
			}
			else
			{
				$config['upload_path'] = './images/rekening/';
				$config['allowed_types']= 'gif|jpg|png|jpeg';
				$config['encrypt_name']	= TRUE;
				$config['remove_spaces']	= TRUE;
				$config['max_size']     = '3000';
				$config['max_width']  	= '*';
				$config['max_height']  	= '*';


				$this->load->library('upload', $config);

				if ($this->upload->do_upload("userfile")) {
					$data	 	= $this->upload->data();


					$source             = "./images/rekening/".$data['file_name'] ;



					chmod($source, 0777) ;



					$in_data['nama_bank'] 		= $this->input->post('nama_bank');
					$in_data['nomor_rekening'] 		= $this->input->post('nomor_rekening');
					$in_data['nama_pemilik'] 		= $this->input->post('nama_pemilik');
					$in_data['gambar'] 				= $data['file_name'];

					$this->db->update("tbl_rekening",$in_data,$id);


					$this->session->set_flashdata('update','OK');
					redirect("sistem/rekening");

				}
				else
				{
					$id = $this->uri->segment(3);

					$query =  $this->sistem_model->EditRekening($id);

					foreach ($query->result_array() as $value) {
						$data['id_rekening'] 		=  $value['id_rekening'];
						$data['nama_bank'] 			=  $value['nama_bank'];
						$data['nomor_rekening'] 	=  $value['nomor_rekening'];
						$data['nama_pemilik'] 		=  $value['nama_pemilik'];
						$data['gambar'] 			=  $value['gambar'];
					}

					$data['rekening'] =  $this->sistem_model->GetRekening();

					$this->template_system->load('template_system','sistem/data/rekening/edit',$data);
				}
			}

		}
		else{
			redirect('sistem');

		}

	}

	public function rekening_delete() {

		if($this->session->userdata("id_admin")!=="" ) {

			$id = $this->uri->segment(3);
			$this->sistem_model->DeleteRekening($id);

			$this->session->set_flashdata('hapus','ok');
			redirect("sistem/rekening");


		}
		else{
			redirect('sistem');

		}

	}
	//Akhir Data Rekening
	//Awal Setting Chatbot
	public function chatbot () {

		if($this->session->userdata("id_admin")!=="" ) {

			$data['chatbot'] =  $this->chatbot_model->get_all_chatbot();
			$data['title'] 	= 'Chatbot';
			$this->template_system->load('template_system','sistem/data/chatbot/index',$data);

		}
		else{
			redirect('sistem');

		}

	}

	public function chatbot_tambah() {

		if($this->session->userdata("id_admin")!=="" ) {

			$data['chatbot'] = $this->chatbot_model->get_all_chatbot();
			$data['title'] 	= 'Tambah';
			$this->template_system->load('template_system','sistem/data/chatbot/add',$data);
		}
		else{
			redirect('sistem');
		}
	}
	public function chatbot_simpan() {
		if($this->session->userdata("id_admin")!=="" ) {

			$this->form_validation->set_rules('question','Pertanyaan Pelanggan','required|trim');
			$this->form_validation->set_rules('answer','Jawaban Chatbot','required|trim');

			if ($this->form_validation->run()==FALSE) {
				redirect('sistem/chatbot_tambah');
			}
			else {
				date_default_timezone_set('Asia/Jakarta');
				$params['question'] 		= $this->input->post('question');
				$params['answer'] 	= $this->input->post('answer');
				$params['date_time_created'] 	= date('Y-m-d H:i:s');
				$this->chatbot_model->add_chatbot($params);
				$this->session->set_flashdata('berhasil','ok');
				redirect("sistem/chatbot");
			}
		}
		else{
			redirect('sistem');
		}
	}

	public function chatbot_edit() {

		if($this->session->userdata("id_admin")!=="" ) {

			$id = $this->uri->segment(3);

			$data['ambilchatbot'] =  $this->chatbot_model->get_chatbot($id);
			$data['title'] 	= 'Edit';
			$this->template_system->load('template_system','sistem/data/chatbot/edit',$data);

		}
		else{
			redirect('sistem');

		}

	}

	public function chatbot_update() {

		if($this->session->userdata("id_admin")!=="" ) {
			date_default_timezone_set('Asia/Jakarta');
			$id['id'] = $this->input->post("id");
			$up['question'] 		= $this->input->post('question');
			$up['answer'] 	= $this->input->post('answer');
			$up['date_time_updated'] 	= date('Y-m-d H:i:s');

			$this->db->update("tbl_chatbot",$up,$id);
			$this->session->set_flashdata('update','ok');
			redirect("sistem/chatbot");
		}
		else{
			redirect('sistem');
		}
	}

	public function chatbot_delete() {

		if($this->session->userdata("id_admin")!=="" ) {

			$id = $this->uri->segment(3);
			$this->chatbot_model->delete_chatbot($id);

			$this->session->set_flashdata('hapus','ok');
			redirect("sistem/chatbot");


		}
		else{
			redirect('sistem');

		}

	}
	//Akhir Setting Chatbot
	//Awal Jenis menu
	public function jenis_menu() {

		if($this->session->userdata("id_admin")!=="" ) {
			$data['jenis_menu']	= $this->sistem_model->JenisMenu();
			$data['title'] 	= 'Jenis Menu';
			$this->template_system->load('template_system','sistem/data/jenis_menu/index',$data);
		}
		else{
			redirect('sistem');

		}
	} 

	public function jenis_menu_tambah () {

		if($this->session->userdata("id_admin")!=="" ) {
			$data['title'] 	= 'Tambah';
			$this->template_system->load('template_system','sistem/data/jenis_menu/add',$data);
		}
		else{
			redirect('sistem');

		}

	}

	public function jenis_menu_simpan () {

		if($this->session->userdata("id_admin")!=="" ) {

			$this->form_validation->set_rules('jenis_menu', 'Jenis Menu', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				redirect('sistem/jenis_menu_tambah');

			}
			else {

				$in['jenis_menu'] = $this->input->post('jenis_menu');

				$this->db->insert("tbl_jenis_menu",$in);

				$this->session->set_flashdata('berhasil','ok');
				redirect("sistem/jenis_menu");	
			}

		}
		else{
			redirect('sistem');
		}
	}

	public function jenis_menu_delete() {

		if($this->session->userdata("id_admin")!=="" ) {

			$id = $this->uri->segment(3);
			$this->sistem_model->DeleteJenisMenu($id);

			$this->session->set_flashdata('hapus','ok');
			redirect("sistem/jenis_menu");

		}
		else{
			redirect('sistem');

		}

	}

	public function jenis_menu_edit() {

		if($this->session->userdata("id_admin")!=="" ) {

			$id = $this->uri->segment(3);

			$query = $this->sistem_model->EditJenisMenu($id);

			foreach ($query->result_array() as $value) {
				$data['id_jenis_menu'] 	=  $value['id_jenis_menu'];
				$data['jenis_menu'] =  $value['jenis_menu'];
			}
			$data['title'] 	= 'Edit';
			$this->template_system->load('template_system','sistem/data/jenis_menu/edit',$data);

		}
		else{
			redirect('sistem');
		}
	}


	public function jenis_menu_update() {

		if($this->session->userdata("id_admin")!=="" ) {

			$id['id_jenis_menu'] 	=  $this->input->post("id_jenis_menu");
			$up['jenis_menu'] 	=  $this->input->post("jenis_menu");

			$this->db->update("tbl_jenis_menu",$up,$id);

			$this->session->set_flashdata('update','ok');
			redirect("sistem/jenis_menu");

		}
		else{
			redirect('sistem');

		}
	}
	//Akhir Jenis Menu
	//Awal menu 
	public function menu () {

		if($this->session->userdata("id_admin")!=="" ) {

			$data['menu'] =  $this->sistem_model->Menu();
			$data['title'] 	= 'Menu';
			$this->template_system->load('template_system','sistem/data/menu/index',$data);

		}
		else{
			redirect('sistem');

		}

	}

	public function menu_tambah() {

		if($this->session->userdata("id_admin")!=="" ) {
			$data['jenis_menu']	= $this->sistem_model->JenisMenu();
			$data['title'] 	= 'Tambah';
			$this->template_system->load('template_system','sistem/data/menu/add',$data);

		}
		else{
			redirect('sistem');

		}
	}

	public function menu_simpan() {

		if($this->session->userdata("id_admin")!=="" ) { 

			$this->form_validation->set_rules('jenis_menu_id','Jenis menu','required');
			$this->form_validation->set_rules('nama_menu','Nama menu','required');
			$this->form_validation->set_rules('harga_menu','Harga menu','required');
			$this->form_validation->set_rules('detail_menu','Detail menu','required');

			if ($this->form_validation->run()==FALSE) {

				redirect('sistem/menu_tambah');
			}
			else {

				if(empty($_FILES['userfile']['name']))
				{
					redirect('sistem/menu_tambah');

				}
				else
				{
					$config['upload_path'] = './images/menu/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '10000';
					$config['max_width']  	= '*';
					$config['max_height']  	= '*';

					$this->load->library('upload', $config);
					if ($this->upload->do_upload("userfile")) {

						$data	 	= $this->upload->data();

						$source             = "./images/menu/".$data['file_name'] ;

						chmod($source, 0777) ;

						$in_data['nama_menu'] 		= $this->input->post('nama_menu');
						$in_data['harga_menu'] 		= $this->input->post('harga_menu');
						$in_data['detail_menu'] 	= $this->input->post('detail_menu');
						$in_data['jenis_menu_id'] 	= $this->input->post('jenis_menu_id');
						$in_data['gambar_menu'] 	= $data['file_name'];

						$this->db->insert("tbl_menu",$in_data);

						$this->session->set_flashdata('berhasil','OK');
						redirect("sistem/menu");

					}
					else 
					{
						redirect('sistem/menu_tambah');
					}
				}
			}
		}
		else{
			redirect('sistem');
		}
	}

	public function menu_edit() {

		if($this->session->userdata("id_admin")!=="" ) {

			$id = $this->uri->segment(3);

			$query =  $this->sistem_model->EditMenu($id);

			foreach ($query->result_array() as $value) {
				$data['id_menu'] 			=  $value['id_menu'];
				$data['nama_menu'] 		=  $value['nama_menu'];
				$data['harga_menu'] 		=  $value['harga_menu'];
				$data['detail_menu'] 	=  $value['detail_menu'];
				$data['gambar_menu'] 	=  $value['gambar_menu'];
				$data['jenis_menu_id'] 	=  $value['jenis_menu_id'];
			}

			$data['jenis']	= $this->sistem_model->JenisMenu();
			$data['title'] 	= 'Edit';
			$this->template_system->load('template_system','sistem/data/menu/edit',$data);
		}
		else{
			redirect('sistem');
		}
	}

	public function menu_update() {

		if($this->session->userdata("id_admin")!=="" ) {

			$id['id_menu'] = $this->input->post("id_menu");

			if(empty($_FILES['userfile']['name']))
			{


				$up['nama_menu'] 		= $this->input->post('nama_menu');
				$up['harga_menu'] 		= $this->input->post('harga_menu');
				$up['detail_menu'] 		= $this->input->post('detail_menu');
				$up['jenis_menu_id'] 	= $this->input->post('jenis_menu_id');
				$this->db->update("tbl_menu",$up,$id);

				$this->session->set_flashdata('update','ok');
				redirect("sistem/menu");
			}
			else
			{
				$path = './images/menu/';
				$config['upload_path'] = $path;
				$config['allowed_types']= 'gif|jpg|png|jpeg';
				$config['encrypt_name']	= TRUE;
				$config['remove_spaces']	= TRUE;	
				$config['max_size']     = '10000';
				$config['max_width']  	= '*';
				$config['max_height']  	= '*';


				$this->load->library('upload', $config);

				if ($this->upload->do_upload("userfile")) {
					$data	 	= $this->upload->data();


					$source             = "./images/menu/".$data['file_name'] ;



					chmod($source, 0777) ;


					$gambarlama = $this->input->post('gambar_menu');
					$in_data['nama_menu'] 		= $this->input->post('nama_menu');
					$in_data['harga_menu'] 		= $this->input->post('harga_menu');
					$in_data['detail_menu'] 	= $this->input->post('detail_menu');
					$in_data['jenis_menu_id'] 	= $this->input->post('jenis_menu_id');
					$in_data['gambar_menu'] 	= $data['file_name'];

					$this->db->update("tbl_menu",$in_data,$id);
					@unlink($path.$gambarlama);

					$this->session->set_flashdata('update','OK');
					redirect("sistem/menu");

				}
				else 
				{
					redirect('sistem/menu_edit');
				}
			}
		}
		else{
			redirect('sistem');
		}
	}

	public function menu_delete($id) {

		if($this->session->userdata("id_admin")!=="" ) {
			$query =  $this->sistem_model->EditMenu($id);
			$path = './images/menu/';
			foreach ($query->result_array() as $value) {
				$gambar_menu 	=  $value['gambar_menu'];
			}
			$this->sistem_model->DeleteMenu($id);
			@unlink($path.$gambar_menu);
			$this->session->set_flashdata('hapus','ok');
			redirect("sistem/menu");


		}
		else{
			redirect('sistem');

		}

	}
	//Akhir menu

	//profile
	public function profil(){
		if ($this->session->userdata("id_admin")!=="") {
			$data['data_profil']	= $this->sistem_model->Admin();
			$data['title'] 	= 'Profil';
			$this->template_system->load('template_system','sistem/data/profil/index',$data);
		}
		else{
			redirect('sistem');
		}
	}
	public function profil_update(){
		if($this->session->userdata("id_admin")!=="" ) {

			$id['id_admin'] = $this->input->post("id_admin");

			if(empty($_FILES['foto']['name']))
			{
				$up['nama_admin'] 		= $this->input->post('nama_admin');
				$up['username_admin'] 		= $this->input->post('username_admin');
				$up['telp_admin'] 		= $this->input->post('telp_admin');
				$up['email_admin'] 	= $this->input->post('email_admin');
				$this->db->update("tbl_admin",$up,$id);

				$this->session->set_flashdata('update','ok');
				redirect("sistem/profil");
			}
			else
			{
				$path = './images/admin/';
				$config['upload_path'] = $path;
				$config['allowed_types']= 'gif|jpg|png|jpeg';
				$config['encrypt_name']	= TRUE;
				$config['remove_spaces']	= TRUE;	
				$config['max_size']     = '100000';
				$config['max_width']  	= '*';
				$config['max_height']  	= '*';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload("foto")) {
					$data	 	= $this->upload->data();
					$source             = "./images/admin/".$data['file_name'] ;
					chmod($source, 0777) ;

					$gambar_lama = $this->input->post('foto');
					$in_data['nama_admin'] 		= $this->input->post('nama_admin');
					$in_data['username_admin'] 		= $this->input->post('username_admin');
					$in_data['telp_admin'] 	= $this->input->post('telp_admin');
					$in_data['email_admin'] 	= $this->input->post('email_admin');
					$in_data['foto'] 	= $data['file_name'];

					$this->db->update("tbl_admin",$in_data,$id);
					@unlink($path.$gambar_lama);

					$this->session->set_flashdata('update','OK');
					redirect("sistem/profil");

				}
				else 
				{
					$this->upload->display_errors('<p>', '</p>');
					$data['data_profil'] =  $this->sistem_model->Admin();

					$this->template_system->load('template_system','sistem/data/profil/index',$data);
				}
			}

		}
		else{
			redirect('sistem');

		}
	}
						//Awal Ganti Password

	public function ganti_password() {
		if($this->session->userdata("logged_in")!=="" ) {
			$data['title'] 	= 'Ganti Password';
			$this->template_system->load('template_system','sistem/data/ganti_password/index',$data);
		}
		else{
			redirect('sistem/logout');
		}
	}

	public function ganti_password_update () {

		if($this->session->userdata("logged_in")!=="" ) {

			$this->form_validation->set_rules('password_lama','Current Password','required');
			$this->form_validation->set_rules('password_baru','New Password','required');
			$this->form_validation->set_rules('password_konfirmasi','Confirmasi Password','required');

			if ($this->form_validation->run()==FALSE) {

				redirect('sistem/ganti_password');

			}
			else {

				$id_admin = $this->session->userdata("id_admin");
				$password_lama =  md5($this->input->post('password_lama'));

				$query = $this->sistem_model->GetAdminId($id_admin);

				foreach ($query->result_array() as $value) {
					$password = $value['password_admin'];
				}

				if ($password_lama!=$password) {

					$this->session->set_flashdata('salah','ok');
					redirect('sistem/ganti_password');

				}
				else {

					$password_baru 			= $this->input->post('password_baru');
					$password_konfirmasi 	= $this->input->post('password_konfirmasi');

					if ($password_baru!=$password_konfirmasi) {

						$this->session->set_flashdata('tidaksama','ok');
						redirect('sistem/ganti_password');

					}
					else {

						$id_admin 		= $this->session->userdata("id_admin");
						$password 		= md5($this->input->post('password_baru'));

						$this->sistem_model->UpdateAdmin($id_admin,$password);

						$this->session->set_flashdata('sukses','ok');
						redirect('sistem/profil');

					}
				}
			}
		}
		else{
			redirect('sistem/logout');
		}
	}
	//Akhir Ganti Password

	//Awal Admin Group

	public function admin_group() {

		if($this->session->userdata("id_admin")!=="" ) {
			$data['admin_group']	= $this->sistem_model->PelangganGroup();
			$this->template_system->load('template_system','sistem/data/admin_group/index',$data);
		}
		else{
			redirect('sistem');

		}
	} 

	public function admin_group_tambah () {

		if($this->session->userdata("id_admin")!=="" ) {

			$this->template_system->load('template_system','sistem/data/admin_group/add');
		}
		else{
			redirect('sistem');

		}

	}

	public function admin_group_simpan () {

		if($this->session->userdata("id_admin")!=="" ) {

			$this->form_validation->set_rules('nama_admin_group', 'Category Gallery', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				$this->template_system->load('template_system','sistem/data/admin_group/add');

			}
			else {

				$in['nama_admin_group'] = $this->input->post('nama_admin_group');

				$this->db->insert("tbl_admin_group",$in);

				$this->session->set_flashdata('berhasil','ok');
				redirect("sistem/admin_group");	
			}


		}
		else{
			redirect('sistem');

		}

	}

	public function admin_group_delete() {

		if($this->session->userdata("id_admin")!=="" ) {

			$id = $this->uri->segment(3);
			$this->sistem_model->DeleteAdminGroup($id);

			$this->session->set_flashdata('hapus','ok');
			redirect("sistem/admin_group");

		}
		else{
			redirect('sistem');

		}

	}

	public function admin_group_edit() {

		if($this->session->userdata("id_admin")!=="" ) {

			$id = $this->uri->segment(3);

			$query = $this->sistem_model->EditAdminGroup($id);

			foreach ($query->result_array() as $value) {
				$data['id_admin_group'] 	=  $value['id_admin_group'];
				$data['nama_admin_group'] =  $value['nama_admin_group'];

			}

			$this->template_system->load('template_system','sistem/data/admin_group/edit',$data);



		}
		else{
			redirect('sistem');

		}

	}


	public function admin_group_update() {

		if($this->session->userdata("id_admin")!=="" ) {

			$id['id_admin_group'] 	=  $this->input->post("id_admin_group");
			$up['nama_admin_group'] 	=  $this->input->post("nama_admin_group");

			$this->db->update("tbl_admin_group",$up,$id);

			$this->session->set_flashdata('update','ok');
			redirect("sistem/admin_group");

		}
		else{
			redirect('sistem');

		}

	}
	//Akhir Admin Group
	//Awal Blog
	public function blog(){
		if ($this->session->userdata('id_admin')!=="") {
			$data['blog']	= $this->sistem_model->Blog();
			$data['title'] 	= 'Blog';
			$this->template_system->load('template_system','sistem/data/blog/index',$data);
		}
		else{
			redirect('sistem');
		}
	}
	public function blog_tambah(){
		if($this->session->userdata("id_admin")!=="" ) {
			$data['title'] 	= 'Tambah';
			$data['kategori_blog']	= $this->sistem_model->KategoriBlog();
			$this->template_system->load('template_system','sistem/data/blog/add',$data);
		}
		else{
			redirect('sistem');
		}
	}
	public function blog_simpan() {

		if($this->session->userdata("id_admin")!=="" ) {
			$this->form_validation->set_rules('kategoriblog_id','Kategori Blog','required');
			$this->form_validation->set_rules('judul_blog','Judul Blog','required');
			$this->form_validation->set_rules('isi_blog','Isi blog','required');

			if ($this->form_validation->run()==FALSE) {
				redirect('sistem/blog_tambah');
			}
			else {

				if(empty($_FILES['userfile']['name']))
				{
					redirect('sistem/blog_tambah');
				}
				else
				{
					$config['upload_path'] = './images/blog/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;
					$config['max_size']     = '10000';
					$config['max_width']  	= '*';
					$config['max_height']  	= '*';

					$this->load->library('upload', $config);
					if ($this->upload->do_upload("userfile")) {

						$data	 	= $this->upload->data();
						$source             = "./images/blog/".$data['file_name'] ;

						chmod($source, 0777) ;
						date_default_timezone_set('Asia/Jakarta');
						$in_data['judul_blog'] 		= $this->input->post('judul_blog');
						$in_data['isi_blog'] 		= $this->input->post('isi_blog');
						$in_data['tgl_input'] 		= date('Y-m-d H:i:s');
						$in_data['kategoriblog_id'] = $this->input->post('kategoriblog_id');
						$in_data['gambar_blog'] 	= $data['file_name'];



						$this->db->insert("tbl_blog",$in_data);

						$this->session->set_flashdata('berhasil','OK');
						redirect("sistem/blog");
					}
					else
					{
						redirect('sistem/blog_tambah');
					}
				}
			}
		}
		else{
			redirect('sistem');
		}
	}

	public function blog_edit($idB) {
		if($this->session->userdata("id_admin")!=="" ) {

			$id = base64_decode($idB);

			$query =  $this->sistem_model->EditBlog($id);

			foreach ($query->result_array() as $value) {
				$data['id_blog'] 			=  $value['id_blog'];
				$data['judul_blog'] 		=  $value['judul_blog'];
				$data['tgl_input'] 		=  $value['tgl_input'];
				$data['isi_blog'] 	=  $value['isi_blog'];
				$data['gambar_blog'] 	=  $value['gambar_blog'];
				$data['kategoriblog_id'] 	=  $value['kategoriblog_id'];
			}
			$data['kategori_blog']	= $this->sistem_model->KategoriBlog();
			$data['title'] 	= 'Edit';
			$this->template_system->load('template_system','sistem/data/blog/edit',$data);
		}
		else{
			redirect('sistem');
		}
	}

	public function blog_update() {

		if($this->session->userdata("id_admin")!=="" ) {

			$id['id_blog'] = $this->input->post("id_blog");

			if(empty($_FILES['userfile']['name']))
			{


				$up['judul_blog'] 		= $this->input->post('judul_blog');
				$up['isi_blog'] 		= $this->input->post('isi_blog');
				$up['kategoriblog_id'] 	= $this->input->post('kategoriblog_id');
				$this->db->update("tbl_blog",$up,$id);

				$this->session->set_flashdata('update','ok');
				redirect("sistem/blog");
			}
			else
			{
				$path = './images/blog/';
				$config['upload_path'] = $path;
				$config['allowed_types']= 'gif|jpg|png|jpeg';
				$config['encrypt_name']	= TRUE;
				$config['remove_spaces']	= TRUE;	
				$config['max_size']     = '10000';
				$config['max_width']  	= '*';
				$config['max_height']  	= '*';


				$this->load->library('upload', $config);

				if ($this->upload->do_upload("userfile")) {
					$data	 	= $this->upload->data();
					$source             = "./images/blog/".$data['file_name'] ;
					chmod($source, 0777) ;


					$gambarlama = $this->input->post('gambar_blog');
					$in_data['judul_blog'] 		= $this->input->post('judul_blog');
					$in_data['isi_blog'] 	= $this->input->post('isi_blog');
					$in_data['kategoriblog_id'] 	= $this->input->post('kategoriblog_id');
					$in_data['gambar_blog'] 	= $data['file_name'];

					$this->db->update("tbl_blog",$in_data,$id);
					@unlink($path.$gambarlama);

					$this->session->set_flashdata('update','OK');
					redirect("sistem/blog");
				}
				else
				{
					redirect('sistem/blog_edit');
				}
			}
		}
		else{
			redirect('sistem');
		}
	}
	public function blog_delete($idB) {

		if($this->session->userdata("id_admin")!=="" ) {
			$id = base64_decode($idB);
			$query =  $this->sistem_model->EditBlog($id);
			$path = './images/blog/';
			foreach ($query->result_array() as $value) {
				$gambar_blog 	=  $value['gambar_blog'];
			}
			$this->sistem_model->DeleteBlog($id);
			@unlink($path.$gambar_menu);
			$this->session->set_flashdata('hapus','ok');
			redirect("sistem/blog");


		}
		else{
			redirect('sistem');

		}

	}
	//Akhir Blog
	//Awal Kategori Blog
	public function kategori_blog() {

		if($this->session->userdata("id_admin")!=="" ) {
			$data['kategori_blog']	= $this->sistem_model->KategoriBlog();
			$data['title'] 	= 'Kategori Blog';
			$this->template_system->load('template_system','sistem/data/kategori_blog/index',$data);
		}
		else{
			redirect('sistem');

		}
	} 

	public function kategori_blog_tambah () {

		if($this->session->userdata("id_admin")!=="" ) {
			$data['title'] 	= 'Tambah';
			$this->template_system->load('template_system','sistem/data/kategori_blog/add',$data);
		}
		else{
			redirect('sistem');
		}
	}

	public function kategori_blog_simpan () {

		if($this->session->userdata("id_admin")!=="" ) {

			$this->form_validation->set_rules('nama_kategoriblog', 'Nama Katergori', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				redirect('sistem/kategori_galeri_tambah');

			}
			else {

				$in['nama_kategoriblog'] = $this->input->post('nama_kategoriblog');

				$this->db->insert("tbl_kategori_blog",$in);

				$this->session->set_flashdata('berhasil','ok');
				redirect("sistem/kategori_blog");
			}
		}
		else{
			redirect('sistem');
		}
	}
	public function kategori_blog_delete() {

		if($this->session->userdata("id_admin")!=="" ) {

			$id = $this->uri->segment(3);
			$this->sistem_model->DeleteKategoriBlog($id);

			$this->session->set_flashdata('hapus','ok');
			redirect("sistem/kategori_blog");

		}
		else{
			redirect('sistem');

		}

	}

	public function kategori_blog_edit() {

		if($this->session->userdata("id_admin")!=="" ) {

			$id = $this->uri->segment(3);

			$query = $this->sistem_model->EditKategoriBlog($id); 

			foreach ($query->result_array() as $value) {
				$data['id_kategoriblog'] 	=  $value['id_kategoriblog'];
				$data['nama_kategoriblog'] =  $value['nama_kategoriblog'];

			}
			$data['title'] 	= 'Edit';
			$this->template_system->load('template_system','sistem/data/kategori_blog/edit',$data);

		}
		else{
			redirect('sistem');
		}
	}

	public function kategori_blog_update() {

		if($this->session->userdata("id_admin")!=="" ) {

			$id['id_kategoriblog'] 	=  $this->input->post("id_kategoriblog");
			$up['nama_kategoriblog'] 	=  $this->input->post("nama_kategoriblog");

			$this->db->update("tbl_kategori_blog",$up,$id);

			$this->session->set_flashdata('update','ok');
			redirect("sistem/kategori_blog");

		}
		else{
			redirect('sistem');

		}
	}
	//Akhir Kategori Blog
	//Awal admin 
	public function admin () {

		if($this->session->userdata("id_admin")!=="" ) {

			$data['admin']	= $this->sistem_model->Admin();

			$this->template_system->load('template_system','sistem/data/admin/index',$data);


		}
		else{
			redirect('sistem');

		}

	}

	public function admin_tambah() {

		if($this->session->userdata("id_admin")!=="" ) {

			$data['admin_group']	= $this->sistem_model->AdminGroup();

			$this->template_system->load('template_system','sistem/data/admin/add',$data);

		}
		else{
			redirect('sistem');

		}

	}

	public function admin_simpan() {

		if($this->session->userdata("id_admin")!=="" ) {

			$this->form_validation->set_rules('nama_admin','Nama Admin','required');
			$this->form_validation->set_rules('email_admin','Email','required');
			$this->form_validation->set_rules('telp_admin','Telp','required');
			$this->form_validation->set_rules('username_admin','Username','required');
			$this->form_validation->set_rules('password_admin','Password','required');
			$this->form_validation->set_rules('admin_group_id','Admin Group','required');



			if ($this->form_validation->run()==FALSE) {

				$data['admin_group']	= $this->sistem_model->AdminGroup();

				$this->template_system->load('template_system','sistem/data/admin/add',$data);

			}
			else {


				$in['nama_admin'] 		= $this->input->post('nama_admin');
				$in['email_admin'] 		= $this->input->post('email_admin');
				$in['telp_admin'] 		= $this->input->post('telp_admin');
				$in['username_admin'] 	= $this->input->post('username_admin');
				$in['password_admin'] 	= md5($this->input->post('password_admin'));
				$in['admin_group_id'] 	= $this->input->post('admin_group_id');	

				$this->db->insert("tbl_admin",$in);

				$this->session->set_flashdata('berhasil','OK');
				redirect("sistem/admin");
			}


		}
		else{
			redirect('sistem');

		}

	}

	public function admin_edit() {

		if($this->session->userdata("id_admin")!=="" ) {

			$id = $this->uri->segment(3);

			$query =  $this->sistem_model->EditAdmin($id);

			foreach ($query->result_array() as $value) {
				$data['id_admin'] 		=  $value['id_admin'];
				$data['nama_admin'] 		=  $value['nama_admin'];
				$data['email_admin'] 	=  $value['email_admin'];
				$data['telp_admin'] 		=  $value['telp_admin'];
				$data['username_admin'] 	=  $value['username_admin'];
				$data['password_admin'] 	=  $value['password_admin'];
				$data['admin_group_id'] 	=  $value['admin_group_id'];
			}

			$data['admin_group']	= $this->sistem_model->AdminGroup();

			$this->template_system->load('template_system','sistem/data/admin/edit',$data);

		}
		else{
			redirect('sistem');

		}

	}

	public function admin_update() {

		if($this->session->userdata("id_admin")!=="" ) {

			$password = $this->input->post('password_admin');

			if ($password=="") {

				$id['id_admin'] = $this->input->post("id_admin");

				$in_data['nama_admin'] 		= $this->input->post('nama_admin');
				$in_data['email_admin'] 		= $this->input->post('email_admin');
				$in_data['telp_admin'] 		= $this->input->post('telp_admin');
				$in_data['username_admin'] 	= $this->input->post('username_admin');
				$in_data['admin_group_id'] 	= $this->input->post('admin_group_id');


				$this->db->update("tbl_admin",$in_data,$id);


				$this->session->set_flashdata('update','OK');
				redirect("sistem/admin");
			}
			else {


				$id['id_admin'] = $this->input->post("id_admin");

				$in_data['nama_admin'] 		= $this->input->post('nama_admin');
				$in_data['email_admin'] 		= $this->input->post('email_admin');
				$in_data['telp_admin'] 		= $this->input->post('telp_admin');
				$in_data['username_admin'] 	= $this->input->post('username_admin');
				$in_data['password_admin'] 	= md5($this->input->post('password_admin'));
				$in_data['admin_group_id'] 	= $this->input->post('admin_group_id');


				$this->db->update("tbl_admin",$in_data,$id);


				$this->session->set_flashdata('update','OK');
				redirect("sistem/admin");
			}





		}
		else{
			redirect('sistem');

		}

	}

	public function admin_delete() {

		if($this->session->userdata("id_admin")!=="" ) {

			$id = $this->uri->segment(3);
			$this->sistem_model->DeleteAdmin($id);

			$this->session->set_flashdata('hapus','ok');
			redirect("sistem/admin");


		}
		else{
			redirect('sistem');

		}

	}
	//Akhir Admin
	//Awal Tentang Kami
	public function tentang_kami() {
		if($this->session->userdata("id_admin")!=="" ) {

			$data['tentang_kami'] = $this->sistem_model->TentangKami();
			$data['title'] 	= 'Tentang Resto';
			$this->template_system->load('template_system','sistem/data/tentang_kami/index',$data);


		}
		else{
			redirect('sistem');

		}
	}

	public function tentang_kami_update () {

		if($this->session->userdata("id_admin")!=="" ) {
			if(empty($_FILES['userfile']['name']))
			{
				$up['nama_resto'] 			= $this->input->post('nama_resto');
				$up['alamat_resto'] 		= $this->input->post('alamat_resto');
				$up['lokasi'] 				= $this->input->post('kota');
				$up['email_resto'] 			= $this->input->post('email_resto');
				$up['telp_resto'] 			= $this->input->post('telp_resto');
				$up['isi_tentang_resto'] 	= $this->input->post('isi_tentang_resto');
				$up['ig'] 					= $this->input->post('ig');
				$up['tw'] 					= $this->input->post('tw');
				$up['gp'] 					= $this->input->post('gp');

				$this->db->update("tbl_tentang_resto",$up);

				$this->session->set_flashdata('update','ok');
				redirect("sistem/tentang_kami");
			}
			else
			{
				$config['upload_path'] = './images/tentang_kami/';
				$config['allowed_types']= 'gif|jpg|png|jpeg';
				$config['encrypt_name']	= TRUE;
				$config['remove_spaces']	= TRUE;	
				$config['max_size']     = '3000';
				$config['max_width']  	= '*';
				$config['max_height']  	= '*';


				$this->load->library('upload', $config);

				if ($this->upload->do_upload("userfile")) {
					$data	 	= $this->upload->data();


					$source             = "./images/tentang_kami/".$data['file_name'] ;



					chmod($source, 0777) ;


					$up['nama_resto'] 			= $this->input->post('nama_resto');
					$up['alamat_resto'] = $this->input->post('alamat_resto');
					$up['lokasi'] = $this->input->post('kota');
					$up['email_resto'] 	= $this->input->post('email_resto');
					$up['telp_resto'] 	= $this->input->post('telp_resto');
					$up['isi_tentang_resto'] 	= $this->input->post('isi_tentang_resto');
					$up['ig'] 					= $this->input->post('ig');
					$up['tw'] 					= $this->input->post('tw');
					$up['gp'] 					= $this->input->post('gp');
					$up['logo'] 				= $data['file_name'];

					$result = $this->db->update("tbl_tentang_resto",$up,$id);
					echo json_decode($result);
					$this->session->set_flashdata('update','OK');
					redirect("sistem/tentang_kami");

				}
				else 
				{
					$data['tentang_kami'] = $this->sistem_model->TentangKami();

					$this->template_system->load('template_system','sistem/data/tentang_kami/index',$data);
				}
			}

		}
		else{
			redirect('sistem');

		}

	}
	//Akhir Tentang Kami
	public function laporan_plg(){
		if($this->session->userdata("id_admin")!=="" ) {
			$data['detail_order']	= $this->sistem_model->TampilOrder();
			$data['title'] 	= 'Laporan';
			$this->template_system->load('template_system','sistem/data/laporan_plg/index',$data);
		}
	}
	//Awal saran


	public function saran() {

		if($this->session->userdata("id_admin")!=="" ) {

			$data['saran'] = $this->sistem_model->Saran();
			$data['title'] 	= 'Kritik & Saran';
			$this->template_system->load('template_system','sistem/data/saran/index',$data);
		}
		else{
			redirect('sistem');
		}
	}
	//Akhir Saran
	//Awal Reservasi

	public function pesanan() {

		if($this->session->userdata("id_admin")!=="" ) {

			$data['order'] = $this->sistem_model->Order();
			$data['title'] 	= 'Order';
			$this->template_system->load('template_system','sistem/data/order/index',$data);

		}
		else{
			redirect('sistem');
		}
	}

	public function pesanan_baru () {

		if($this->session->userdata("id_admin")!=="" ) {

			$data['new_order'] = $this->sistem_model->NewOrder();

			$this->template_system->load('template_system','sistem/data/new_order/index',$data);

		}
		else{
			redirect('sistem');

		}

	}
	public function pesanan_delete() {

		if($this->session->userdata("id_admin")!=="" ) {

			$id = $this->uri->segment(3);
			$this->sistem_model->DeleteOrder($id);

			$this->session->set_flashdata('hapus','ok');
			redirect("sistem/pesanan");

		}
		else{
			redirect('sistem');

		}

	}

	public function nota () {

		if($this->session->userdata("id_admin")!=="" ) {

			$id	= $this->uri->segment(3);

			$data['nota'] = $this->pelanggan_model->DetailOrderById($id);
			$data['tpesan'] = $this->pelanggan_model->DetailOrderById($id);
			$data['title'] 	= 'Nota';
			$this->template_system->load('template_system','sistem/data/nota/index',$data);

		}
		else{
			redirect('sistem');
		}
	}

	public function pembayaran () {

		if($this->session->userdata("id_admin")!=="" ) {
			$data['pembayaran'] = $this->sistem_model->PembayaranDesc();
			$data['title'] 	= 'Pembayaran';
			$this->template_system->load('template_system','sistem/data/pembayaran/index',$data);

		}
		else{
			redirect('sistem');
		}
	}
	public function status () {

		if($this->session->userdata("id_admin")!=="" ) {
			$id['id_order'] = $this->input->post('id_order');
			$up['status_order']= $this->input->post('status_order');
			$this->db->update('tbl_order',$up,$id);
			$this->session->set_flashdata('');
			redirect('sistem/pesanan','refresh');

		}
		else{
			redirect('sistem');

		}
	}
	public function laporan(){
		if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
			$filter = $_GET['filter']; // Ambil data filder yang dipilih user
			if($filter == '1'){ // Jika filter nya 1 (per tanggal)
				$tgl = $_GET['tanggal'];
				$tgl_indo = date('y-m-d', strtotime($tgl));
				$ket = 'Data Transaksi Tanggal '.tgl_indo($tgl_indo);
				$url_cetak = 'cetak?filter=1&tahun='.$tgl;
				$transaksi = $this->sistem_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di sistem_model
			}
			else if($filter == '2'){ // Jika filter nya 2 (per bulan)
				$bulan = $_GET['bulan'];
				$tahun = $_GET['tahun'];
				$nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
				$ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
				$url_cetak = 'cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
				$transaksi = $this->sistem_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di sistem_model
			}
			else{ // Jika filter nya 3 (per tahun)
				$tahun = $_GET['tahun'];
				$ket = 'Data Transaksi Tahun '.$tahun;
				$url_cetak = 'cetak?filter=3&tahun='.$tahun;
				$transaksi = $this->sistem_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di sistem_model
			}
		}
		else{ // Jika user tidak mengklik tombol tampilkan
			$ket = 'Semua Data Transaksi';
			$url_cetak = 'cetak';
			$transaksi = $this->sistem_model->view_all(); // Panggil fungsi view_all yang ada di sistem_model
		}
		$data['ket'] = $ket;
		$data['url_cetak'] = base_url('sistem/'.$url_cetak);
		$data['transaksi'] = $transaksi;
		$data['option_tahun'] = $this->sistem_model->option_tahun();
		$data['title'] 	= 'Laporan';
		$this->template_system->load('template_system','sistem/data/laporan_plg/index',$data);
	}
	public function cetak(){
		if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
			$filter = $_GET['filter']; // Ambil data filder yang dipilih user
			if($filter == '1'){ // Jika filter nya 1 (per tanggal)                
				$tgl = $_GET['tanggal'];                                
				$ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));                
				$transaksi = $this->sistem_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di sistem_model            
			}
			else if($filter == '2'){ // Jika filter nya 2 (per bulan)                
				$bulan = $_GET['bulan'];                
				$tahun = $_GET['tahun'];                
				$nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
				$ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
				$transaksi = $this->sistem_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di sistem_model
			}
			else{ // Jika filter nya 3 (per tahun)                
				$tahun = $_GET['tahun'];                                
				$ket = 'Data Transaksi Tahun '.$tahun;                
				$transaksi = $this->sistem_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di sistem_model            
			}        
		}
		else{ // Jika user tidak mengklik tombol tampilkan            
			$ket = 'Semua Data Transaksi';            
			$transaksi = $this->sistem_model->view_all(); // Panggil fungsi view_all yang ada di sistem_model        
		}                
		$data['ket'] = $ket;        
		$data['transaksi'] = $transaksi;            
		$data['tentang'] = $this->sistem_model->TentangKami();
		$this->load->view('sistem/print', $data);    
	}
	public function backup_db() {

		// Load the DB utility class
		$this->load->dbutil();

		// Backup your entire database and assign it to a variable
		$backup = $this->dbutil->backup();

		// Load the file helper and write the file to your server
		$this->load->helper('file');
		write_file('database/backup/', $backup);

		// Load the download helper and send the file to your desktop
		$this->load->helper('download');
		force_download('kampungjawa.sql', $backup);

	}
	public function download_pdf_transaksi($id){
		$url = $this->sistem_model->Pembayaran($id);
		foreach ($url->result_array() as $value) {
			$data = $value['pdf_url'];
		}

        // Set header content type.
		header('Content-Type', 'application/pdf');
		header('Content-Transfer-Encoding', 'binary');
		header('Content-Length: '. filesize($data),'');
		$this->load->helper('download');
		force_download('cara-pembayaran.pdf', $data);
	}
}