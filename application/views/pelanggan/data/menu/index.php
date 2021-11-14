   <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15 banner-menu">
   	<h2 class="tit6 t-center">
   		Menu
   	</h2>
   </section>


   <!-- Content page -->
   <section>
   	<?php 
   	if($this->session->flashdata('sukses')){
   		echo "<div id='myModal' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='...' aria-hidden='true'>
   		<div class='modal-dialog'>
   		<!-- Modal content-->
   		<div class='modal-content' role='document'>
   		<div class='modal-header'>                				
   		<h4 class='modal-title txt24'>Peringatan!</h4>
   		<button type='button' class='close' data-dismiss='modal'>&times;</button>
   		</div>
   		<div class='modal-body'>
   		<p>Keranjang berhasil dikosongkan!</p>
   		</div>           
   		</div>
   		</div>
   		</div>";
   	}
   	?>
   	<div class="container">
   		<div class="row">
   			<div class="col-lg-8 col-lg-9">
   				<div class="p-t-80 p-b-124 bo5-r h-full p-r-50 p-r-0-md bo-none-md">
   					<div class="col-lg-12 wrap-item-mainmenu p-b-38">
   						<h3 class="tit-mainmenu tit10 p-b-25">
   							<img src="<?php echo base_url('images/icons/menu.png') ?>" style="width: 40px;"> MENU KAMPUNG JAWA
   						</h3>
   						<div id="view">						
   							<?php $this->load->view('pelanggan/data/menu/view_menu', array('menu' => $menu)); ?>
   							<div class="col-sm-4 blo3 m-b-60 m-r-0 " id="gagal" style="float: center;">
                             </div>
                         </div>

                     </div>						
                 </div>
             </div>

             <div class="col-md-4 col-lg-3">
                <div class="sidebar2 p-t-80 p-b-80 p-l-20 p-l-0-md p-t-0-md">
                   <!-- Search -->
                   <div class="search-sidebar2 size12 bo2 pos-relative">
                      <input class="input-search-sidebar2 txt10 p-l-20 p-r-55" type="text" id="keyword" placeholder="Search">
                      <button class="btn-search-sidebar2 flex-c-m ti-search trans-0-4" id="btn-search"></button>
                  </div>
                  <div class="categories">
                      <h4 class="txt33 bo5-b p-b-35 p-t-58">
                         Jenis Menu
                     </h4>									
                     <ul>
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

              <!-- Recent Order -->
              <div class="popular" id="tampil_recent_order">

              </div>
              <!-- Most Popular -->
              <div class="popular">
                <h4 class="txt33 p-b-35 p-t-58">
                    Most popular
                </h4>

                <ul>
                    <?php foreach ($terlaris as $value):
                    $idM = base64_encode($value['id_menu']); ?>


                        <li class="flex-w m-b-25">
                            <div class="size16 bo-rad-10 wrap-pic-w of-hidden m-r-18">
                                <a href="#">
                                    <img src="<?php echo base_url()?>images/menu/<?php echo $value['gambar_menu'] ?>" alt="IMG-BLOG">
                                </a>
                            </div>

                            <div class="size28">
                                <a href="<?php echo base_url()?>menu/detail/<?php echo $idM; ?>" class="dis-block txt28 m-b-8">
                                    <?php echo $value['nama_menu'] ?>
                                </a>
                                <p class='txt10'>
                                    <?php echo $value['jenis_produk']?>
                                </p>
                            </div>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</section>


