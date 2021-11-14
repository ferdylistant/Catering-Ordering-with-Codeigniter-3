<?php
foreach ($menu->result_array() as $value) {
    $idM = base64_encode($value['id_menu']); ?>
	<div class="col-sm-4 blo3 m-b-60 bo1 m-r-0" style="float: left;">
		<div class="pic-blo3 item-gallery isotope-item bo-rad-10 hov-img-zoom m-r-28" style="width: 100%;margin: 0px!important">
			<img src="<?php echo base_url()?>images/menu/<?php echo $value['gambar_menu']?>" alt="IMG-MENU" height="180">

			<div class="overlay-item-gallery trans-0-4 flex-c-m">
				<a class="btn-show-gallery flex-c-m fa fa-search" href="<?php echo base_url()?>images/menu/<?php echo $value['gambar_menu']?>" data-lightbox="menu"></a>
			</div>
		</div>
		<div class="text-blo3 size21 flex-col-l-m" style="width: 100%;">
			<span class="tit9 m-b-10 col-lg">
				<?php echo $value['nama_menu'] ?>
			</span>
			<div class="txt32 flex-w m-t-30 ">
				<span class="col-lg">
					<?php echo $value['jenis_menu'] ?>
					<span class="m-r-6 m-l-4"></span>
				</span>
			</div>
			<span class="txt22 m-t-3 m-b-8 col-lg-12">
				Rp.<?php echo number_format($value['harga_menu']) ?>
			</span>
		</div>
		<a href="<?php echo base_url()?>menu/detail/<?php echo $idM; ?>" class="form-control btn3 txt11 trans-0-4 p-t-13" style="width: 100%!important;margin: 0px;height: 40px;text-align: center">Pesan <i class="fa fa-shopping-basket"></i></a>
	</div>
<?php
} ?>
