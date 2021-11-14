<style>
.badge-notify{
	background:red;
	position:absolute;
	top: -13px;
	right: 3px;
}
.my-cart-icon-affix {
	position: fixed;
	z-index: 999;
}
ul.dropdown-cart{
	min-width:250px;
}
ul.dropdown-cart li .item{
	display:inline-block;
	padding:3px 10px;
	margin: 3px 0;
}

ul.dropdown-cart li .item:after{
	visibility: hidden;
	display: block;
	font-size: 0;
	content: " ";
	clear: both;
	height: 0;
}

ul.dropdown-cart li .item-left{
	float:left;
}
ul.dropdown-cart li .item-left img,
ul.dropdown-cart li .item-left span.item-info{
	float:left;
}
ul.dropdown-cart li .item-left span.item-info{
	margin-left:10px;   
}
ul.dropdown-cart li .item-left span.item-info span{
	display:block;
}
ul.dropdown-cart li .item-right{
	float:right;
}
ul.dropdown-cart li .item-right button{
	margin-top:14px;
}
.batal{
	color: #111111!important;
}
.batal:hover{
	color: red!important;
}
</style>
<!-- Header -->
<header>
	<!-- Header desktop -->
	<div class="wrap-menu-header gradient1 trans-0-4" id="top-header">
		<div class="container h-full">
			<div class="wrap_header trans-0-3">
				<!-- Logo -->
				<div class="logo">
					<a href="<?php echo base_url()?>">
						<img src="<?php echo base_url();?>images/logo/logokj.png" alt="IMG-LOGO" data-logofixed="<?php echo base_url();?>images/logo/logokj1.png">
					</a>
				</div>

				<!-- Menu -->
				<div class="wrap_menu p-l-45 p-l-0-xl">
					<nav class="menu">
						<ul class="main_menu active-menu">
							<li>
								<a href="<?php echo base_url();?>">Home</a>
							</li>

							<li>
								<a href="<?php echo base_url();?>menu">Menu</a>
							</li>

							<li>
								<a href="<?php echo base_url();?>gallery">Gallery</a>
							</li>

							<li>
								<a href="<?php echo base_url();?>tentang_resto">About</a>
							</li>

							<li>
								<a href="<?php echo base_url();?>blog">Blog</a>
							</li>

							<li>
								<a href="<?php echo base_url();?>contact">Contact</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Cart -->
				<?php
				$cart_check = $this->cart->contents();


				?>


				<ul class="shop-bag social navbar-right flex-w flex-l-m p-r-10">
					<li class="dropdown aa-cartbox" id="awal_badge">
						<a href="#" class="aa-cart-link" aria-expanded="false">
							<?php
								if (empty($cart_check)) { ?>

								<?php }
								else{ ?>
								<span class="badge badge-notify my-cart-badge" id="badge_cart"></span>
								<?php }?>
								<span class="fa fa-shopping-cart m-l-21"></span>
									<?php
									if (empty($cart_check)) { ?>
									<ul class="dropdown-menu dropdown-cart aa-cartbox-summary" role="menu">
									<li id="cart" style="height: 160px;align-items: center;">
										<div class="col-lg-12 m-t-40" align="center">
											<img style="width: 60px;" src="<?php echo base_url()?>images/icons/cart.png">
											<br>
											<span class="txt24">Belum Ada Pemesanan</span>
										</div>

									</li>
								</ul>
									<?php }
									else{ ?>
									<ul class="dropdown-menu dropdown-cart aa-cartbox-summary" id="keranjang_cart" role="menu">
										<?php } ?>
									</ul>
							</a>
						</li>
					</ul>
					<button class="btn-show-sidebar m-l-33 trans-0-4"></button>
				</div>
			</div>
		</div>
	</header>
