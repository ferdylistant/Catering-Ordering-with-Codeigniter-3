<section class="section-reservation bg1-pattern p-t-110 p-b-70">
  <div class="container">
    <div class="row">
     <div class="col-lg-12 m-l-r-auto">
      <div class=" p-t-50 wrap-item-mainmenu">
       <h3 class="tit-mainmenu tit10 p-b-15 m-l-16">
         <img src="<?php echo base_url('images/icons/png/037-shoppingbag.png') ?>" style="width: 40px;"> CART PEMESANAN
       </h3>
       <div class="row">
        <div class="col-lg-12 p-t-30 bg-white" style="border-radius: 10px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
          <table class="table table-striped table-responsive">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Produk</th>
                <th></th>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Sub-Total</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead> 
            <tbody id="detail_cart">

            </tbody>
          </table>
          <?php
          $totJum = 0;
          $krj=$this->cart->contents(); 
          foreach ($krj as $min) {
            $totJum += $min['qty'];
          }
          if (empty($krj)) {?>
              <div class="row ">
            <div class="col-lg-12 p-b-30 text-right m-t-10 m-r-330">
              <center><img src="<?php echo base_url()?>images/icons/cart.png" style="width: 15%;opacity: 0.8"><h6>Belum ada belanjaan, nih!</h6></center>
              <br>
              <a href="<?php echo base_url('menu')?>" class="btn btn-default txt10">
                <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
              </a>
            </div>
          </div>
          <?php }
          else{ ?> 
            <div class="row ">
            <div class="col-lg-12 p-b-30 text-right m-t-10 m-r-330">
              <a class="kosongkan-keranjang btn btn-danger txt10" href="<?php echo base_url('cart/empty/');?>"  style="color: white">
                <span class="glyphicon glyphicon-trash"></span> Kosongkan Keranjang
              </a>
              <a href="<?php echo base_url('menu')?>" class="btn btn-light txt10">
                <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
              </a>
              <input type="hidden" id="minimal" name="qty" value="<?php echo $totJum;?>">
              <a href="<?php echo base_url('checkout') ?>" class="checkout btn btn-success txt10" style="color: white">
                Checkout <span class="glyphicon glyphicon-play"></span>
              </a>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div> 
</div>
</section>




