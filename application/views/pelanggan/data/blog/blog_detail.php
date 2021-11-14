<style type="text/css">
	.comment-list .row {
  margin-bottom: 0px;
}
.comment-list .panel .panel-heading {
  padding: 4px 15px;
  position: absolute;
  border:none;
  /*Panel-heading border radius*/
  border-top-right-radius:0px;
  top: 1px;
}
.comment-list .panel .panel-heading.right {
  border-right-width: 0px;
  /*Panel-heading border radius*/
  border-top-left-radius:0px;
  right: 16px;
}
.comment-list .panel .panel-heading .panel-body {
  padding-top: 6px;
}
.comment-list figcaption {
  /*For wrapping text in thumbnail*/
  word-wrap: break-word;
}
/* Portrait tablets and medium desktops */
@media (min-width: 768px) {
  .comment-list .arrow:after, .comment-list .arrow:before {
    content: "";
    position: absolute;
    width: 0;
    height: 0;
    border-style: solid;
    border-color: transparent;
  }
  .comment-list .panel.arrow.left:after, .comment-list .panel.arrow.left:before {
    border-left: 0;
  }
  /*****Left Arrow*****/
  /*Outline effect style*/
  .comment-list .panel.arrow.left:before {
    left: 0px;
    top: 30px;
    /*Use boarder color of panel*/
    border-right-color: inherit;
    border-width: 16px;
  }
  /*Background color effect*/
  .comment-list .panel.arrow.left:after {
    left: 1px;
    top: 31px;
    /*Change for different outline color*/
    border-right-color: #FFFFFF;
    border-width: 15px;
  }
  /*****Right Arrow*****/
  /*Outline effect style*/
  .comment-list .panel.arrow.right:before {
    right: -16px;
    top: 30px;
    /*Use boarder color of panel*/
    border-left-color: inherit;
    border-width: 16px;
  }
  /*Background color effect*/
  .comment-list .panel.arrow.right:after {
    right: -14px;
    top: 31px;
    /*Change for different outline color*/
    border-left-color: #FFFFFF;
    border-width: 15px;
  }
}
.comment-list .comment-post {
  margin-top: 6px;
}
</style>
	<section class="p-t-120 p-b-80 p-l-10 p-r-15">
		<div class="bread-crumb bo5-b p-t-15 p-b-35" style="text-align: left;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
			<div class="container">
				<a href="<?php echo base_url()?>" class="txt27">
					Home
				</a>

				<span class="txt29 m-l-10 m-r-10">/</span>

				<a href="<?php echo base_url()?>blog" class="txt27">
					Blog
				</a>

				<span class="txt29 m-l-10 m-r-10">/</span>

				<span class="txt29">
					<?= $detail['judul_blog']?>
				</span>
			</div>
		</div>

		<div class="container">
			<div class="row ">
				<div class="col-md-8 col-lg-9">
					<div class="p-t-80 p-b-124 bo5-r p-r-50 h-full p-r-0-md bo-none-md">
						<!-- Block4 -->
						<div class="blo4 p-b-63">
							<div class="pic-blo4 hov-img-zoom bo-rad-10 pos-relative" >
								<a href="#">
									<img src="<?php echo base_url()?>images/blog/<?php echo $detail['gambar_blog'] ?>" alt="IMG-BLOG">
									<div class="overlay-item-gallery trans-0-4 flex-c-m">
										<a class="btn-show-gallery flex-c-m fa fa-search" href="<?php echo base_url()?>images/blog/<?php echo $detail['gambar_blog']?>" data-lightbox="blog"></a>
									</div>
								</a>

								<div class="date-blo4 flex-col-c-m">
									<span class="txt30 m-b-4">
										<?php echo date('d',strtotime($detail['tgl_input'])); ?>
									</span>

									<span class="txt31">
										<?php echo date('M',strtotime($detail['tgl_input'])) ?>, <?php echo  date('Y',strtotime($detail['tgl_input'])) ?>
									</span>
								</div>
							</div>

							<div class="text-blo4 p-t-33">
								<h4 class="p-b-16">
									<a href="blog-detail.html" class="tit9"><?php echo $detail['judul_blog'] ?></a>
								</h4>

								<div class="txt32 flex-w p-b-24">
									<span>
										by Admin
										<span class="m-r-6 m-l-4">|</span>
									</span>

									<span>
										<?php echo date('d F, Y',strtotime($detail['tgl_input'])) ?>
										<span class="m-r-6 m-l-4">|</span>
									</span>

									<span>
										<?php echo $detail['nama_kategoriblog'] ?>
									</span>
								</div>

								<p style="text-indent: 20px;text-align: justify;">
									<?php echo $detail['isi_blog']?>
								</p>
							</div>
						</div>

						<!-- Leave a comment -->
						<form class="leave-comment p-t-10">
							<h4 class="txt33 p-b-14">
								Leave a Comment
							</h4>

							<p>
								Your email address will not be published. Required fields are marked *
							</p>

							<textarea class="bo-rad-10 size29 bo2 txt10 p-l-20 p-t-15 m-b-10 m-t-40" name="commentent" placeholder="Comment..."></textarea>

							<!-- Button3 -->
							<button type="submit" class="btn3 flex-c-m size31 txt11 trans-0-4">
								Post Comment
							</button>
						</form>
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
									<a href="<?= base_url()?>blog/archive" class="txt27">
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
