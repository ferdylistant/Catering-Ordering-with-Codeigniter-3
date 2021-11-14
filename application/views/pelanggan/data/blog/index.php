<!-- Title Page -->
<section class="p-t-120 p-b-80 p-l-10 p-r-15">
	<div class="bread-crumb bo5-b p-t-15 p-b-35" style="text-align: left;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
		<div class="container">
			<a href="<?php echo base_url()?>" class="txt27">
				Home
			</a>

			<span class="txt29 m-l-10 m-r-10">/</span>

			<span class="txt29">
				Blog
			</span>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-lg-9">
				<div class="p-t-80 p-b-124 bo5-r h-full p-r-50 p-r-0-md bo-none-md">
					<!-- Block4 -->
					<?php foreach ($blog as $blg) { ?>
					<?php $idB = base64_encode($blg['id_blog']); ?>
					<div class="blo4 p-b-63">
						<div class="pic-blo4 hov-img-zoom bo-rad-10 pos-relative">
							<a href="<?php echo base_url()?>blog/detail/<?php echo $idB;?>">
								<img src="<?php echo base_url()?>images/blog/<?php echo $blg['gambar_blog'] ?>" alt="IMG-BLOG">
							</a>

							<div class="date-blo4 flex-col-c-m">
								<span class="txt30 m-b-4">
									<?php echo date('d',strtotime($blg['tgl_input'])); ?>
								</span>

								<span class="txt31">
									<?php echo date('M',strtotime($blg['tgl_input'])) ?>, <?php echo  date('Y',strtotime($blg['tgl_input'])) ?>
								</span>
							</div>
						</div>

						<div class="text-blo4 p-t-33">
							<h4 class="p-b-16">
								<a href="blog-detail.html" class="tit9"><?php echo $blg['judul_blog'] ?></a>
							</h4>

							<div class="txt32 flex-w p-b-24">
								<span>
									by Admin
									<span class="m-r-6 m-l-4">|</span>
								</span>

								<span>
									<?php echo date('d F, Y',strtotime($blg['tgl_input'])) ?>
									<span class="m-r-6 m-l-4">|</span>
								</span>

								<span>
									<?php echo $blg['nama_kategoriblog'] ?>
								</span>
							</div>

							<p style="text-indent: 20px;text-align: justify;">
								<?php echo character_limiter($blg['isi_blog'],250)?>
							</p>
							<a href="<?php base_url()?>blog/detail/<?php echo $idB ?>" class="dis-block txt4 m-t-30">
								Continue Reading
								<i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
							</a>
						</div>
					</div>
					<?php } ?>

					<!-- Pagination -->
					<div class="pagination flex-l-m flex-w m-l--6 p-t-25">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-lg-3">
				<div class="sidebar2 p-t-80 p-b-80 p-l-20 p-l-0-md p-t-0-md">

					<!-- Categories -->
					<div class="categories">
						<h4 class="txt33 bo5-b p-b-35 p-t-58">
							Categories
						</h4>

						<ul>
							<?php foreach ($kategori_blog as $ktg) { ?>
							<li class="bo5-b p-t-8 p-b-8">
								<a href="#" class="txt27">
									<?php echo $ktg['nama_kategoriblog'] ?>
								</a>
							</li>
							<?php } ?>
						</ul>
					</div>


					<!-- Archive -->
					<div class="archive">
						<h4 class="txt33 p-b-20 p-t-43">
							Archive
						</h4>

						<ul>
							<?php foreach ($blog as $value) {
								$bulan = date('m', strtotime($value['tgl_input']));
								$tahun = date('Y', strtotime($value['tgl_input']));
							}
								$count = $this->pelanggan_model->ArsipBlog($bulan,$tahun);
								$rslt = $count->num_rows();
							?>
							<li class="flex-sb-m p-t-8 p-b-8">
								<?php
							foreach ($arsip->result_array() as $ars) { }?>
								<a href="#" class="txt27">
									<?php echo date('F Y',strtotime($ars['tgl_input'])) ?>
								</a>
									
								<span class="txt29">
									(<?php echo $rslt?>)
								</span>
							</li>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
