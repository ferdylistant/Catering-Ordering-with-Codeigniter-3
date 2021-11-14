<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15 banner-menu">
	<h2 class="tit6 t-center">
		Menu
	</h2>
</section>


<!-- Content page -->
<section>
	<div class="bo5-b p-t-0 p-b-17">

	</div>

	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-9">
				<div class="p-t-80 p-b-124 bo5-r h-full p-r-50 p-r-0-md bo-none-md">
					<div class="col-lg-12 wrap-item-mainmenu p-b-38">

						<?php foreach ($j_menu->result_array() as $value) { ?>
						<?php } ?>
						<h3 class="tit-mainmenu tit10 p-b-25">
							<?php if (!empty($j_menu)): ?>
								<img src="<?php echo base_url('images/icons/jenis_menu.png') ?>" style="width: 40px;"> Terkait: <?php echo $value['jenis_menu'] ?>
								<?php elseif(empty($j_menu)):?> 
									<?php echo $value['jenis_menu'] ?><img src="<?php echo base_url('images/icons/box.png') ?>" style="width: 40px;">  Belum Tersedia
								<?php endif ?>
							</h3>

							<?php
							foreach ($j_menu->result_array() as $value) {?> 		


								<div class="col-sm-4 blo3 m-b-60 bo1 m-r-0" style="float: left;">
									<div class="pic-blo3 item-gallery isotope-item bo-rad-10 hov-img-zoom m-r-28" style="width: 100%;margin: 0px!important">
										<img src="<?php echo base_url()?>images/menu/<?php echo $value['gambar_menu']?>" alt="IMG-MENU" height="180">

										<div class="overlay-item-gallery trans-0-4 flex-c-m">
											<a class="btn-show-gallery flex-c-m fa fa-search" href="<?php echo base_url()?>images/menu/<?php echo $value['gambar_menu']?>" data-lightbox="menu"></a>
										</div>

									</div>
									<div class="text-blo3 size21 flex-col-l-m" style="width: 100%;">
										<span class="tit9 m-b-3 col-lg">
											<?php echo $value['nama_menu'] ?>
										</span>
										<div class="txt32 flex-w">
											<span class="col-lg-12">
												<?php echo $value['jenis_menu'] ?>
												<span class="m-r-6 m-l-4"></span>
											</span>
										</div>

										<span class="txt22 m-t-3 m-b-8 col-lg-12">
											Rp.<?php echo number_format($value['harga_menu'])?>

										</span>


									</div>
									<a href="<?php echo base_url()?>menu/detail/<?php echo $value['id_menu'];?>" class="form-control btn3 txt11 trans-0-4 p-t-13" style="width: 100%!important;margin: 0px;height: 40px;text-align: center">Pesan <i class="fa fa-shopping-basket"></i></a>
								</div>

							<?php } ?>
						</div>						
					</div>
				</div>

				<div class="col-md-4 col-lg-3">
					<div class="sidebar2 p-t-80 p-b-80 p-l-20 p-l-0-md p-t-0-md">
						<!-- Search -->
						<div class="search-sidebar2 size12 bo2 pos-relative">
							<input class="input-search-sidebar2 txt10 p-l-20 p-r-55" type="text" name="search" placeholder="Search">
							<button class="btn-search-sidebar2 flex-c-m ti-search trans-0-4"></button>
						</div>

						<!-- Categories -->
						<div class="categories">
							<h4 class="txt33 bo5-b p-b-35 p-t-58">
								Jenis Menu
							</h4>				

							
							<ul>
								<li class="bo5-b p-t-8 p-b-8">
									<img style="width:40px " src="<?php echo base_url()?>images/icons/left-arrow1.png"> &nbsp;
									<a href="<?php echo base_url();?>menu/" class="txt27">
										Semua
									</a>
								</li>
								<?php foreach ($jenis_menu->result_array() as $value) { ?>
									<li class="bo5-b p-t-8 p-b-8">
										<img style="width:40px " src="<?php echo base_url()?>images/icons/left-arrow1.png"> &nbsp;
										<a href="<?php echo base_url();?>menu/jenis_menu/<?php echo $value["id_jenis_menu"] ?>" class="txt27">
											<?php echo $value["jenis_menu"] ?>
										</a>
									</li>
								<?php } ?>
								
							</ul>
						</div>

						<!-- Most Popular -->
						<div class="popular">
							<h4 class="txt33 p-b-35 p-t-58">
								Recent Order
							</h4>
							<?php
							foreach ($recent->result_array() as $recent) { ?>
								<ul>
									<li class="flex-w m-b-25">
										<div class="size16 bo-rad-10 wrap-pic-w of-hidden m-r-18">
											<a href="<?php echo base_url()?>menu/detail/<?php echo $recent['id_menu'];?>">
												<img style="width: 93px" src="<?php echo base_url()?>images/menu/<?php echo $recent['gambar_menu']?>" alt="IMG-BLOG">
											</a>
										</div>

										<div class="size28">
											<a href="<?php echo base_url()?>menu/detail/<?php echo $recent['id_menu'];?>" class="dis-block txt28 m-b-8">
												<?php echo $recent['nama_produk']?>
											</a>

											<p class="txt10">
												<?php echo $recent['jenis_produk'];?>
											</p>
											<span class="txt14">
												<?php echo waktu_lalu($recent['tgl_order_masuk']);?>
											</span>
										</div>
									</li>
								</ul>
							<?php } ?>
						</div>


						<!-- Archive -->
						<div class="archive">
							<h4 class="txt33 p-b-20 p-t-43">
								Archive
							</h4>

							<ul>
								<li class="flex-sb-m p-t-8 p-b-8">
									<a href="#" class="txt27">
										uly 2018
									</a>

									<span class="txt29">
										(9)
									</span>
								</li>

								<li class="flex-sb-m p-t-8 p-b-8">
									<a href="#" class="txt27">
										June 2018
									</a>

									<span class="txt29">
										(39)
									</span>
								</li>

								<li class="flex-sb-m p-t-8 p-b-8">
									<a href="#" class="txt27">
										May 2018
									</a>

									<span class="txt29">
										(29)
									</span>
								</li>

								<li class="flex-sb-m p-t-8 p-b-8">
									<a href="#" class="txt27">
										April  2018
									</a>

									<span class="txt29">
										(35)
									</span>
								</li>

								<li class="flex-sb-m p-t-8 p-b-8">
									<a href="#" class="txt27">
										March 2018
									</a>

									<span class="txt29">
										(22)
									</span>
								</li>

								<li class="flex-sb-m p-t-8 p-b-8">
									<a href="#" class="txt27">
										February 2018
									</a>

									<span class="txt29">
										(32)
									</span>
								</li>

								<li class="flex-sb-m p-t-8 p-b-8">
									<a href="#" class="txt27">
										January 2018
									</a>

									<span class="txt29">
										(21)
									</span>
								</li>

								<li class="flex-sb-m p-t-8 p-b-8">
									<a href="#" class="txt27">
										December 2017
									</a>

									<span class="txt29">
										(26)
									</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


