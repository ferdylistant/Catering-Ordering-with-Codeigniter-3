<div class="row purchace-popup">
  <div class="col-12">
    <span class="d-block d-md-flex align-items-center text-center "style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
      <ul class="breadcrumb py-0">
        <li>
          <a href="<?php echo base_url();?>sistem/home" class="mt-2 text-dark" >
            <i class="mdi mdi-home"></i> Home</a>
            <i class="mdi mdi-arrow-right"></i>
        </li>
        <li>
          <a href="<?php echo base_url();?>sistem/tentang_kami" class="mt-2 text-dark">Tentang Kami</a>
        </li>
      </ul>
    </span>                            
  </div>
  <?php foreach ($tentang_kami->result_array() as $key) {}?>
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
        <h4 class="card-title"><i class="fa fa-gears"></i> SETTINGS</h4>
        <?php 
        if ($this->session->flashdata('hapus')){
              echo "&nbsp;&nbsp;&nbsp;<div class='alert alert-danger'>
              <span>Profil Delete</span>  
              </div>";
              echo "<meta http-equiv='refresh' content='1;url=tentang_kami'>";
        }
        else if($this->session->flashdata('berhasil')){
              echo "&nbsp;&nbsp;&nbsp;<div class='alert alert-success'>
              <span>Profil Save</span>  
              </div>";
              echo "<meta http-equiv='refresh' content='1;url=tentang_kami'>";
        }
        else if($this->session->flashdata('update')){
              echo "<script>swal('update berhasil','mantap' ,'success');</script>";
        }
        else if($this->session->flashdata('ada')){
              echo "&nbsp;&nbsp;&nbsp;<div class='alert alert-danger'>
              <span>Profil Exist</span>  
              </div>";
              echo "<meta http-equiv='refresh' content='1;url=tentang_kami'>";
        }
      ?>
          <p class="card-description">
            <hr>

          </p>

        <?php echo form_open_multipart('sistem/tentang_kami_update')?>
            <div class="form-group">
              <label for="nama_resto">Nama Perusahaan</label>
              <input type="text" class="form-control" name="nama_resto" value="<?php echo $key['nama_resto'] ?>" placeholder="Nama Perusahaan Anda">
            </div>
            <div class="form-group">
              <label for="email_resto">Email Perusahaan</label>
              <input type="email" class="form-control" name="email_resto" value="<?php echo $key['email_resto'] ?>" placeholder="resto@example.com">
            </div>
            <div class="form-group">
              <label for="telp_resto">Telepon Perusahaan</label>
              <input type="text" class="form-control" name="telp_resto" value="<?php echo $key['telp_resto']?>" placeholder="08xxxxxxxxxx">
            </div>
            <div class="form-group">
              <label for="alamat_resto">Alamat Perusahaan</label>
              <input type="text" class="form-control" name="alamat_resto" value="<?php echo $key['alamat_resto'] ?>" placeholder="Location">
            </div>
            <div class="form-group">
              <label for="provinsi">Provinsi</label>
              <select class="form-control" name="provinsi" value="<?php echo $key['alamat_resto'] ?>">
              </select>
                <label for="kota">Kota</label>
              <select class="form-control" name="kota">
              </select>
            </div>
            <div class="form-group">
              <label for="isi_tentang_resto">Keterangan</label>
              <textarea class="form-control" name="isi_tentang_resto" rows="2"><?php echo $key['isi_tentang_resto']?></textarea>
            </div>
            <div class="form-group">
              <label for="ig">Instagram</label>
              <input type="text" class="form-control" name="ig" value="<?php echo $key['ig'] ?>" placeholder="username/email instagram">
            </div>
            <div class="form-group">
              <label>Logo</label>
              <input type="file" onchange="readURL(this);" name="userfile">
              <?php 
              if ($key['logo']=='') {?>

              <?php }
              else{?>
                
                <img id="blah" class="img-thumbnail" src="<?php echo base_url()?>images/tentang_kami/<?php echo $key['logo']?>" alt="logo" style="width: 100px">
              <?php} ?>
            <?php }?>
            </div>
            <button type="submit" onclick="return Swal.fire('UPDATE BERHASIL!','' ,'success')" class="btn btn-success mr-2">Update</button>
        <?php echo form_close()?>
      </div>
    </div>
  </div>        
</div>
