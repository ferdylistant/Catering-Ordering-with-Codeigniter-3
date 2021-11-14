
<!-- Sidebar -->
<aside class="sidebar trans-0-4">
	<!-- Button Hide sidebar -->
	<button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>

	<!-- - -->
	<ul class="menu-sidebar p-t-95 p-b-70">
		<li class="t-center m-b-13">
			<a href="<?php echo base_url();?>" class="txt19">Home</a>
		</li>

		<li class="t-center m-b-13">
			<a href="<?php echo base_url();?>menu" class="txt19">Menu</a>
		</li>

		<li class="t-center m-b-13">
			<a href="<?php echo base_url();?>galeri" class="txt19">Gallery</a>
		</li>

		<li class="t-center m-b-13">
			<a href="<?php echo base_url();?>tentang_resto" class="txt19">About</a>
		</li>

		<li class="t-center m-b-13">
			<a href="<?php echo base_url()?>blog" class="txt19">Blog</a>
		</li>

		<li class="t-center m-b-33">
			<a href="<?php echo base_url();?>contact" class="txt19">Contact</a>
		</li>

		<li class="t-center">

			<?php
			if ($this->session->userdata("id_pelanggan")==''){ ?>
			<a href="<?php echo base_url();?>signup" class="btn3 flex-c-m size13 txt11 trans-0-4 m-l-r-auto">
				Signup
			</a>
			<br>
			<a href="<?php echo base_url();?>login" class="btn3 flex-c-m size13 txt11 trans-0-4 m-l-r-auto">
				Login
			</a>

			<?php } 

			else{ ?>
			<a href="<?php echo base_url();?>akun" class="flex-c-m size10 txt11 trans-0-4 m-l-r-auto">
				<?php 
				$plg= $this->db->get_where('tbl_pelanggan', ['email_pelanggan' => $this->session->userdata('email_pelanggan')])->row_array();
				if ($plg["poto_profil"]==''){?>
				<img style="border-radius: 50%; " src="<?php echo base_url();?>upload/profil/user.jpg">
				<?php }
				else { ?>
				<img style="border-radius: 50%;width: 100%;height: 50px " src="<?php echo base_url();?>upload/pelanggan/<?php echo $plg["poto_profil"] ?>">
				<?php } ?>


			</a><a href="<?php echo base_url();?>akun" class="m-l-r-auto flex-c-m trans-0-4 tit2 fs-10" style="font-size: 20px!important"><?php echo $plg['nama_pelanggan']; ?></a>
			<br>

			<a href="<?php echo base_url();?>login/logout" id="keluar" class="btn3 flex-c-m size13 txt11 trans-0-4 m-l-r-auto">
				Logout
			</a>

			<?php }  ?>

			


		</li>
	</ul>

	<!-- - -->
	<div class="gallery-sidebar t-center p-l-60 p-r-60 p-b-40">
		<!-- - -->
		<h4 class="txt20 m-b-33">
			Gallery
		</h4>
		<?php
		$query= $this->db->query("SELECT * FROM tbl_galeri");?>

		<!-- Gallery -->
		<div class="wrap-gallery-sidebar flex-w">
			<?php foreach ($query->result_array() as $value) { ?>
			<a class="item-gallery-sidebar wrap-pic-w" href="<?php echo base_url()?>images/galeri/<?php echo $value['gambar'];?>" data-lightbox="gallery-footer">
				<img src="<?php echo base_url()?>images/galeri/<?php echo $value['gambar'];?>" alt="GALLERY" height="70">
			</a>
			<?php } ?>
		</div>
	</div>
	<!--<div class="flex-c-m size13 txt11 m-l-r-auto p-b-40">
		<a href="<?php echo base_url()?>syarat_dan_ketentuan" class="t-center fs-15 btn-link" style="border-bottom: 3px groove coral; width: 3.1cm"><img src="<?php echo base_url()?>images/icons/png/032-marketing.png" style="width: 20px;">&nbsp;Syarat & Ketentuan</a>
	</div>  -->
</aside>



