
<!-- Gallery -->
<div class="section-gallery p-t-173 p-b-115">
 <center class=" p-b-55"><h3 class="tit-mainmenu tit10" style="border-bottom: 3px groove coral; width: 3.1cm">Gallery</h3></center>
<div class="wrap-label-gallery size27 flex-w flex-sb-m m-l-r-auto flex-col-c-sm p-l-15 p-r-15 m-b-60">
			<button class="label-gallery txt26 trans-0-4 is-actived all">
				All Photo
			</button>
				<?php 	foreach ($kategori->result_array() as $ktg) { ?>
			<button type="submit" class="label-gallery txt26 trans-0-4 btn-kategori" id="kategori" value="<?php echo  $ktg['id_kategori_galeri']; ?>">
				<?php echo $ktg['nama_kategori_galeri']; ?>
			</button>
				<?php } ?>
		</div>

	<div class="wrap-gallery flex-w p-l-25 p-r-25 filter_data_galeri" id="tampil_ktg">
		<?php foreach ($gallery->result_array() as $key): ?>
			<div class="item-gallery bo-rad-10 hov-img-zoom <?php echo $ktg['nama_kategori_galeri'] ?>" >
				<img src="<?php echo base_url()?>images/galeri/<?php echo $key['gambar'] ?>" alt="IMG-GALLERY" height="300">
				<span href="#" class="flex-c-m txt1 ab-c-m size4">
                  <?php echo $key['nama_galeri'] ?>
                </span>
				<div class="overlay-item-gallery trans-0-4 flex-c-m">
					<a class="btn-show-gallery flex-c-m fa fa-search" href="<?php echo base_url()?>images/galeri/<?php echo $key['gambar'] ?>" data-lightbox="gallery"></a>
				</div>
			</div>
		<?php endforeach ?>
	</div>
	
</div>
