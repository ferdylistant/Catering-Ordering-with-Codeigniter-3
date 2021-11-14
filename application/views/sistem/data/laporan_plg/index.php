<div class="row purchace-popup">
  <div class="col-12">
    <span class="d-block d-md-flex align-items-center text-center " style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
      <ul class="breadcrumb py-0">
        <li>
          <a href="<?php echo base_url();?>sistem/home" class="mt-2 text-dark" ><i class="mdi mdi-home"></i> Home</a>
          <i class="mdi mdi-arrow-right"></i>
        </li>
        <li>
          <a href="<?php echo base_url();?>sistem/laporan_plg" class="mt-2 text-dark">Laporan</a>
        </li>
      </ul>
    </span>                    
  </div>
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
        <h4 class="card-title"><i class="fa fa-file-pdf-o"></i> LAPORAN</h4>
        <p class="card-description">
          <hr>
        </p>     
        <form method="get" action="">        
          <label>Filter Berdasarkan</label>
          <br>        
          <select name="filter" id="filter" class="form-control">            
            <option value="">Pilih</option>            
            <option value="1">Per Tanggal</option>            
            <option value="2">Per Bulan</option>            
            <option value="3">Per Tahun</option>        
          </select>        
          <br /><br />        
          <div id="form-tanggal">            
            <label>Tanggal</label>
            <br>            
            <input type="date" name="tanggal" class="form-control" />            
            <br /><br />        
          </div>        
          <div id="form-bulan">            
            <label>Bulan</label><br>            
            <select name="bulan" class="form-control">               
              <option value="">Pilih</option>                
              <option value="1">Januari</option>                
              <option value="2">Februari</option>                
              <option value="3">Maret</option>                
              <option value="4">April</option>                
              <option value="5">Mei</option>                
              <option value="6">Juni</option>                
              <option value="7">Juli</option>                
              <option value="8">Agustus</option>                
              <option value="9">September</option>                
              <option value="10">Oktober</option>                
              <option value="11">November</option>                
              <option value="12">Desember</option>            
            </select>            
            <br /><br />        
          </div>        
          <div id="form-tahun">            
            <label>Tahun</label><br>            
            <select name="tahun" class="form-control">                
              <option value="">Pilih</option>                
              <?php                
          foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller                    
            echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
          }?>            
        </select>            
        <br /><br />        
      </div>        
      <button class="btn btn-primary" type="submit"><i class="fa fa-eye"></i>Tampilkan</button>        
      <a class="btn btn-danger" href="<?php echo base_url('sistem/laporan'); ?>"><i class="fa fa-history"></i> Reset Filter</a>    
    </form>    
    <hr /> 

    <?php    
    if( ! empty($transaksi)){ ?>
      <?php $no = 1; ?>   
      <b><?php echo $ket; ?></b>
      <br />
      <br />    
      <a class="btn btn-info" href="<?php echo $url_cetak; ?>" target="_blank"><img src="<?php echo base_url()?>images/icons/b_print.png">&nbsp;Cetak</a>
      <br /><br />    
      <table class="table table-striped table-bordered" id="table">
      <thead>
        <tr>        
          <th>Kode Pemesanan</th>        
          <th>Nama</th>        
          <th>Telepon</th>        
          <th>Alamat</th>
          <th>Tanggal Pemesanan</th>         
          <th>Total Pemesanan</th>    
        </tr>    
      </thead>   
        <tbody>
          <?php foreach($transaksi as $data){?>           
          <?php  $tgl_order_masuk = date('d-m-y', strtotime($data->tgl_order_masuk));                    
          echo "<tr>";                
          echo "<td>".$data->id_order."</td>";        
          echo "<td>".$data->nama_order."</td>";        
          echo "<td>".$data->telp_order."</td>";
          echo "<td>".$data->alamat_order."</td>";       
          echo "<td>".tgl_indo($data->tgl_order_masuk)."</td>";
          echo "<td>Rp.".number_format($data->total_order)."</td>";        
          echo "</tr>";        
          $no++;?>
        <?php }?>
        </tbody>
           
      <?php } 
      else{ ?>
        <b>Tidak Ada <?php echo $ket; ?></b>
      <?php } ?>   
    </table>

  </div>
</div>
</div>
</div>