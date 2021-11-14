	<!-- Title Page -->
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(./images/tentang_kami/tim1.png);">
		<h2 class="tit6 t-center">
			About Us
		</h2>
	</section>

	<?php foreach ($tentang_resto->result_array() as $value): ?>
		
	<?php endforeach ?>
	<!-- Our Story -->
	<section class="bg2-pattern p-t-116 p-b-110 t-center p-l-15 p-r-15">
		<span class="tit2 t-center">
			Traditional Restaurant
		</span>

		<h3 class="tit3 t-center m-b-35 m-t-5">
			Our Story
		</h3>

		<p class="t-center size32 m-l-r-auto">
			<?php echo $value['isi_tentang_resto'] ?>
		</p>
	</section>


	<!-- Video -->
	<section class="section-video parallax100" style="background-image: url(./images/tentang_kami/tim1.png);">
		<div class="t-center p-t-225 p-b-250">
			<span class="tit2 p-l-15 p-r-15">
				Discover
			</span>

			<h3 class="tit4 t-center p-l-15 p-r-15 p-t-3">
				Kampung Creative
			</h3>
		</div>
	</section>


	<!-- Delicious & Romantic-->
	<section class="bg1-pattern p-t-120 p-b-105">
		<div class="container">
			<!-- Delicious -->
			<div class="row">
				<div class="col-md-6 p-t-45 p-b-30">
					<div class="wrap-text-delicious t-center">
						<span class="tit2 t-center">
							Kampung
						</span>

						<h3 class="tit3 t-center m-b-35 m-t-5">
							Collabs
						</h3>

						<p class="t-center m-b-22 size3 m-l-r-auto">
							Kampung Jawa Resto berkolaborasi bersama Kopi Senja di sebuah paduan desain tata ruang alam senja di sore hari, dan kopi varian lokal serta interlokal.
						</p>
					</div>
				</div>

				<div class="col-md-6 p-b-30">
					<div class="wrap-pic-delicious size2 bo-rad-10 hov-img-zoom m-l-r-auto">
						<img src="<?php echo base_url()?>images/tentang_kami/Orang kampung jawa.png" alt="IMG-OUR">
					</div>
				</div>
			</div>


			<!-- Romantic -->
			<div class="row p-t-170">
				<div class="col-md-6 p-b-30">
					<div class="wrap-pic-romantic size2 bo-rad-10 hov-img-zoom m-l-r-auto">
						<img src="<?php echo base_url()?>images/tentang_kami/outdoor.jpg" alt="IMG-OUR">
					</div>
				</div>

				<div class="col-md-6 p-t-45 p-b-30">
					<div class="wrap-text-romantic t-center">
						<span class="tit2 t-center">
							Romantic
						</span>

						<h3 class="tit3 t-center m-b-35 m-t-5">
							Restaurant
						</h3>

						<p class="t-center m-b-22 size3 m-l-r-auto">
							Spot foto yang indah serta kenyamanan mata memandang istimewanya bentuk alam. Tempat sejuk yang sangat cocok untuk bersama orang-orang tersayang.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Banner -->
	<div class="parallax0 parallax100" style="background-image: url(./images/tentang_kami/tim1.png);">
		<div class="overlay0-parallax t-center size33"></div>
	</div>


	<!-- Founder -->
	<section class="section-chef bgwhite p-t-115 p-b-95">
		<div class="container t-center">
			<span class="tit2 t-center">
				Kampung
			</span>

			<h3 class="tit5 t-center m-b-50 m-t-5">
				Jawa
			</h3>

			<div class="row">
				<div class="col-md-8 col-lg-4 m-l-r-auto p-b-30">
					<!-- -Block5 -->
					<div class="blo5 pos-relative p-t-60">
						<div class="pic-blo5 size14 bo4 wrap-cir-pic hov-img-zoom ab-c-t">
							<a href="#"><img src="<?php echo base_url()?>images/tentang_kami/kukuh.png" alt="IGM-AVATAR"></a>
						</div>

						<div class="text-blo5 size34 t-center bo-rad-10 bo7 p-t-90 p-l-35 p-r-35 p-b-30">
							<h6 class="txt34 dis-block p-b-6">
								Kukuh Sambodo
							</h6>

							<span class="dis-block t-center txt35 p-b-25">
								Head Manager
							</span>

							<p class="t-center">
								"Semua tentang ruang lingkup dan kualitas pertemanan, adapun itu bisnis menambahkan tali yang cukup erat, tepatnya di Kampung Jawa Resto"
							</p>
						</div>
					</div>
				</div>

				<div class="col-md-8 col-lg-4 m-l-r-auto p-b-30">
					<!-- -Block5 -->
					<div class="blo5 pos-relative p-t-60">
						<div class="pic-blo5 size14 bo4 wrap-cir-pic hov-img-zoom ab-c-t">
							<a href="#"><img src="<?php echo base_url()?>images/tentang_kami/hedar.png" alt="IGM-AVATAR"></a>
						</div>

						<div class="text-blo5 size34 t-center bo-rad-10 bo7 p-t-90 p-l-35 p-r-35 p-b-30">
							<h6 class="txt34 dis-block p-b-6">
								Hedar Alaydrus
							</h6>

							<span class="dis-block t-center txt35 p-b-25">
								Owner
							</span>

							<p class="t-center">
								"Dari banyaknya bisnis yang mode fancy, Kampung Jawa merupakan tempat yang saya impikan untuk membuat suatu impian-impian lainnya."
							</p>
						</div>
					</div>
				</div>

				<div class="col-md-8 col-lg-4 m-l-r-auto p-b-30">
					<!-- -Block5 -->
					<div class="blo5 pos-relative p-t-60">
						<div class="pic-blo5 size14 bo4 wrap-cir-pic hov-img-zoom ab-c-t">
							<a href="#"><img src="<?php echo base_url()?>images/tentang_kami/nabil.png" alt="IGM-AVATAR"></a>
						</div>

						<div class="text-blo5 size34 t-center bo-rad-10 bo7 p-t-90 p-l-35 p-r-35 p-b-30">
							<h6 class="txt34 dis-block p-b-6">
								Nabil Muhammad
							</h6>

							<span class="dis-block t-center txt35 p-b-25">
								Head Creative
							</span>

							<p class="t-center">
								"Seni itu ringan, yang berat adalah pokok ide dan makna dari sebuah seni itu sendiri. Kenapa? kalau tidak ada arti, maka air pun sudah seni."
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

