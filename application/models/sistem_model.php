<?php
class sistem_model extends CI_Model {
	function CekLogin($username_admin,$password_admin) {
		$ceklogin = $this->db->query("select a.*,b.* from tbl_admin a join tbl_admin_group b on a.admin_group_id=b.id_admin_group where a.username_admin='$username_admin' and a.password_admin='$password_admin' ");

		if (count($ceklogin->result())>0) {
			foreach ($ceklogin->result_array() as $value) {
				$sess_data['id_admin']  		= $value['id_admin'];
				$sess_data['nama_admin']  		= $value['nama_admin'];
				$sess_data['email_admin']  		= $value['email_admin'];
				$sess_data['telp_admin']  		= $value['telp_admin'];
				$sess_data['username_admin']  	= $value['username_admin'];
				$sess_data['password_admin']  	= $value['password_admin'];
				$sess_data['admin_group_id']  	= $value['admin_group_id'];
				$sess_data['nama_admin_group']  = $value['nama_admin_group'];
				$this->session->set_userdata($sess_data);
			}
				redirect("sistem/home");
		}
		else {
			$this->session->set_flashdata("error","username atau Password Anda Salah!");
			redirect('sistem');
		}
	}
	function logout() {
		$this->session->unset_userdata('id_admin');
		$this->session->unset_userdata('nama_admin');
		$this->session->unset_userdata('email_admin');
		$this->session->unset_userdata('telp_admin');
		$this->session->unset_userdata('username_admin');
		$this->session->unset_userdata('password_admin');
		$this->session->unset_userdata('admin_group_id');
		$this->session->unset_userdata('nama_admin_group');
		$this->session->set_flashdata('sukses','Anda berhasil logout');
		redirect('sistem');
	}
	function cek() {
		if($this->session->userdata('admin_group_id') == '') {
			$this->session->set_flashdata("gagal","Silahkan login terlebih dahulu!");
			redirect('sistem');
		}
	}
	function cekSes() {
		if($this->session->userdata('admin_group_id')) {
			echo ("<script LANGUAGE='JavaScript'>
				window.alert('Anda sudah login!');
				window.location.href='".base_url('sistem/home')."';
				</script>");
		}
	}
	 //Awal Kategori Galeri
	function KategoriGaleri(){
		return $this->db->query("select * from tbl_kategori_galeri order by id_kategori_galeri desc");
	}
	function DeleteKategoriGaleri($id) {
		return $this->db->query("delete from tbl_kategori_galeri where id_kategori_galeri='$id' ");
	}
	function EditKategoriGaleri($id) {
		return $this->db->query("select * from tbl_kategori_galeri where id_kategori_galeri='$id' ");
	}
	function GetGaleri() {
		return $this->db->query("select a.*,b.* from tbl_galeri a join tbl_kategori_galeri b on 
			a.kategori_galeri_id=b.id_kategori_galeri order by a.id_galeri desc");
	}
	function EditGaleri($id) {
		return $this->db->query("select a.*,b.* from tbl_galeri a join tbl_kategori_galeri b on 
			a.kategori_galeri_id=b.id_kategori_galeri where  a.id_galeri='$id'");
	}
	function DeleteGaleri($id) {
		return $this->db->query("delete from tbl_galeri where id_galeri='$id' ");
	}
	function GetRekening() {
		return $this->db->query("select * from tbl_rekening order by id_rekening desc");
	}
	function EditRekening($id) {
		return $this->db->query("select * from tbl_rekening where id_rekening='$id'");
	}
	function DeleteRekening($id) {
		return $this->db->query("delete from tbl_rekening where id_rekening='$id' ");
	}
	function JenisMenu(){
		return $this->db->query("select * from tbl_jenis_menu order by id_jenis_menu desc");
	}
	function EditJenisMenu($id) {
		return $this->db->query("select * from tbl_jenis_menu where id_jenis_menu='$id' ");
	}
	function DeleteJenisMenu($id) {
		return $this->db->query("delete from tbl_jenis_menu where id_jenis_menu='$id' ");
	}
	function Menu(){
		return $this->db->query("select a.*,b.* from tbl_menu a join tbl_jenis_menu b on 
			a.jenis_menu_id=b.id_jenis_menu order by a.id_menu desc");
	}
	function DeleteMenu($id) {
		return $this->db->query("delete from tbl_menu where id_menu='$id' ");
	}
	function EditMenu($id) {
		return $this->db->query("select a.*,b.* from tbl_menu a join tbl_jenis_menu b on 
			a.jenis_menu_id=b.id_jenis_menu where  a.id_menu='$id'");
	}
	function MenuId($id) {
		return $this->db->query("select a.*,b.* from tbl_menu a join tbl_paket_menu b on a.paket_menu_id=b.id_paket_menu where a.id_menu='$id'");
	}
	function MenuGambar ($id) {
		return $this->db->query("select * from tbl_menu_gambar where menu_id='$id' ");
	}
	function DeleteMenuGambar($id) {
		return $this->db->query("delete from tbl_menu_gambar where id_menu_gambar='$id' ");
	}
	function GetAdminId($id_admin) {
		return $this->db->query("select * from tbl_admin where id_admin='$id_admin'");
	}
	function UpdateAdmin($id_admin,$password) {
		return $this->db->query("update tbl_admin set password_admin='$password' where id_admin='$id_admin' ");
	}
	function AdminGroup(){
		return $this->db->query("select * from tbl_admin_group order by id_admin_group desc");
	}
	function DeleteAdminGroup($id) {
		return $this->db->query("delete from tbl_admin_group where id_admin_group='$id' ");
	}
	function EditAdminGroup($id) {
		return $this->db->query("select * from tbl_admin_group where id_admin_group='$id' ");
	}
	function JumlahPelanggan(){
		$ambil = $this->db->query("select * from tbl_pelanggan order by id_pelanggan");
		return $ambil->num_rows();
	}
	function JumlahMenu(){
		$ambil = $this->db->query("select * from tbl_menu order by id_menu");
		return $ambil->num_rows();
	}
	function JumlahPesanan(){
		$ambil = $this->db->query("select * from tbl_order order by id_order");
		return $ambil->num_rows();
	}
	function JumlahTerjual(){
		$ambil = $this->db->query("select * from tbl_order where status_order='2' order by id_order");
		return $ambil->num_rows();
	}
	function DaftarPelanggan(){
		return $this->db->query("select * from tbl_pelanggan order by id_pelanggan");
	}
	function DetailPelanggan($id){
		return $this->db->query("select * from tbl_pelanggan where id_pelanggan='$id' ");
	}
	function OrderDetail($id){
		return $this->db->query("SELECT a.*,b.* FROM tbl_order a
			JOIN tbl_pelanggan b ON a.pelanggan_id=b.id_pelanggan
			WHERE a.pelanggan_id='$id'");
	}
	function Blog(){
		return $this->db->query("SELECT a.*,b.* FROM tbl_blog a
			JOIN tbl_kategori_blog b ON a.kategoriblog_id=b.id_kategoriblog
			ORDER BY a.id_blog DESC")->result_array();
	}
	function DeleteBlog($id) {
		return $this->db->query("delete from tbl_blog where id_blog='$id' ");
	}
	function EditBlog($id) {
		return $this->db->query("select a.*,b.* from tbl_blog a join tbl_kategori_blog b on 
			a.kategoriblog_id=b.id_kategoriblog where a.id_blog='$id'");
	}
	function KategoriBlog(){
		return $this->db->query("select * from tbl_kategori_blog order by id_kategoriblog desc");
	}
	function EditKategoriBlog($id) {
		return $this->db->query("select * from tbl_kategori_blog where id_kategoriblog='$id' ");
	}
	function DeleteKategoriBlog($id) {
		return $this->db->query("delete from tbl_kategori_blog where id_kategoriblog='$id' ");
	}
	function Admin() {
		return $this->db->query("select a.*,b.* from tbl_admin a
			join tbl_admin_group b on a.admin_group_id=b.id_admin_group
			order by a.id_admin desc");
	}
	function EditAdmin($id) {
		return $this->db->query("select * from tbl_admin where id_admin='$id' ");
	}
	function DeleteAdmin($id) {
		return $this->db->query("delete from tbl_admin where id_admin='$id' ");
	}
	function TentangKami() {
		return $this->db->query("select * from tbl_tentang_resto");
	}
	function Saran() {
		return $this->db->query("select * from tbl_saran order by id_saran desc");
	}
	function Order() {
		return $this->db->query("SELECT * from tbl_order
			join tbl_pelanggan on tbl_order.pelanggan_id=tbl_pelanggan.id_pelanggan
			where status_order='0' or status_order='201' or status_order='200' or status_order='407' or status_order='1' or status_order='2'
			order by tgl_perlu asc");
	}
	function DeleteOrder($id) {
		return $this->db->query("delete from tbl_order where id_order='$id' ");
	}
	function OrderById(){
		return $this->db->query("SELECT * FROM tbl_order ORDER BY id_order");
	}
	function TampilOrder(){
		return $this->db->query("select * from tbl_order_detail");
	}
	function LaporanPdf($bulan,$tahun){
		return $this->db->query("SELECT * FROM tbl_order_detail 
			JOIN tbl_order  ON tbl_order_detail.order_id=tbl_order.id_order
			JOIN tbl_menu ON tbl_order_detail.menu_id=tbl_menu.id_menu 
			JOIN tbl_pelanggan ON tbl_order_detail.pelanggan_id=tbl_pelanggan.id_pelanggan
			WHERE  month(tgl_order_masuk)='$bulan' AND year(tgl_order_masuk)='$tahun' AND status_order='4' ");
	}
	function NewOrder() {
		return $this->db->query("SELECT * from tbl_order
			join tbl_pelanggan on tbl_order.pelanggan_id=tbl_pelanggan.id_pelanggan
			where status_order='0' or status_order='1'
			order by id_order desc");
	}
	function NotifNewOrder() {
		return $this->db->query("SELECT * from tbl_order
			join tbl_pelanggan on tbl_order.pelanggan_id=tbl_pelanggan.id_pelanggan
			where tbl_order.status_order='0' or tbl_order.status_order='1' or tbl_order.status_order='2' or tbl_order.status_order='200' or tbl_order.status_order='201' or tbl_order.status_order='407'
			order by tbl_order.update_status  asc limit 3");
	}
	function NotifNewOrderAll() {
		return $this->db->query("SELECT * from tbl_order
			join tbl_pelanggan on tbl_order.pelanggan_id=tbl_pelanggan.id_pelanggan
			where tbl_order.status_order='0' or tbl_order.status_order='1' or tbl_order.status_order='2' or tbl_order.status_order='200' or tbl_order.status_order='201' or tbl_order.status_order='407'
			order by tbl_order.tgl_order_masuk  desc");
	}
	function ReservasiId($id) {
		return $this->db->query("select a.*,b.*,TIMESTAMPDIFF(DAY, a.tgl_order_masuk, a.tgl_reservasi_keluar) as waktu from tbl_order a 
			join tbl_menu b on a.menu_id=b.id_menu where id_order='$id' ");
	}
	function Pembayaran($id){
		return $this->db->query("SELECT * FROM tbl_transaksi WHERE id_transaksi='$id'");
	}
	function PembayaranDesc(){
		return $this->db->query("SELECT a.*,b.* FROM tbl_transaksi a
			JOIN tbl_order b ON a.order_id=b.id_order
			WHERE b.status_order='200' OR  b.status_order='1' OR b.status_order='2' order by a.id_transaksi asc");
	}
	function JumlahPembayaran($id){
		$ambil = $this->db->query("SELECT a.*,b.*,c.* FROM tbl_pembayaran a
			JOIN tbl_order b ON a.order_id=b.id_order
			JOIN tbl_rekening c ON a.rekening_id=c.id_rekening
			WHERE b.id_order='$id'");
		return $ambil->num_rows();
	}
	public function view_by_date($tgl){   
		$ambil = $this->db->query("SELECT * FROM tbl_order WHERE date(tgl_order_masuk)='$tgl' AND status_order='2'");
		$hasil= $ambil->result();
		return $hasil;    
	}      
	public function view_by_month($bulan, $tahun){ 
		$ambil = $this->db->query("SELECT * FROM tbl_order WHERE MONTH(tgl_order_masuk)='$bulan' AND YEAR(tgl_order_masuk)='$tahun' AND status_order='2'");
		$hasil= $ambil->result();
		return $hasil;
	}      
	public function view_by_year($tahun){  
		$ambil = $this->db->query("SELECT * FROM tbl_order WHERE YEAR(tgl_order_masuk)='$tahun' AND status_order='2'");
		$hasil= $ambil->result();
		return $hasil;  
	}      
	public function view_all(){ 
		$ambil = $this->db->query("SELECT * FROM tbl_order WHERE status_order='2'");
		$hasil= $ambil->result();
		return $hasil;   
	}        
	public function option_tahun(){ 
		$ambil = $this->db->query("SELECT YEAR(tgl_order_masuk) AS tahun FROM tbl_order GROUP BY YEAR(tgl_order_masuk) ORDER BY YEAR(tgl_order_masuk)");
		$hasil= $ambil->result();
		return $hasil;       
	}	
}