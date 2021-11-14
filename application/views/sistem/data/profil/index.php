<div class="row purchace-popup" >
	<div class="col-12" >
		<span class="d-block d-md-flex align-items-center text-center" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
			<ul class="breadcrumb py-0">
				<li>
					<a href="<?php echo base_url();?>sistem/home" class="mt-2 text-dark" ><i class="mdi mdi-home"></i> Home</a>
					<i class="mdi mdi-arrow-right"></i>
				</li>
				<li>
					<a href="<?php echo base_url();?>sistem/profil" class="mt-2 text-dark"><i class="fa fa-user"></i> Profil</a>
				</li>
			</ul></span>
		</div>
		<div class="col-lg-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
					<h4 class="card-title"><i class="fa fa-user"></i> Profil Administrator</h4>

					<div class="row">
                        <div class="col-md-3">
                            <div class="card ">
                                <div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                                  <center>
                                     <?php
                                     $id = $this->session->userdata('id_admin');
                                     $grup = $this->session->userdata('username_admin');
                                     $auth = $this->db->get_where('tbl_admin',['id_admin' => $id, 'username_admin' => $grup] )->row_array();
                                      if ($auth['foto'] != ""): ?>
                                        <img id="blah" width="125" class="img-thumbnail" src="<?php echo base_url()?>images/admin/<?= $auth['foto'] ?>" alt="">
                                  <?php else: ?>
                                    <img width="125" class="img-thumbnail" src="<?php echo base_url()?>images/user.jpg" alt="">
                                <?php endif ?>
                                <br><br>
                                <h5 class="profile-name"><?php echo $this->session->userdata('nama_admin'); ?></h5>
                                  <small class="text-muted"><?php echo $this->session->userdata('nama_admin_group');?></small>
                                  <span class="status-indicator online"></span>
                          </center>
                      </div>
                  </div>
              </div>
              <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Profil</h5>
                    </div>
                    <?php $id_admin = $this->session->userdata('id_admin'); ?>
                    <div class="card-body">
                       <?php echo form_open_multipart('sistem/profil_update/');?>
                       <input type="hidden" name="id_admin" value="<?php echo $id_admin;?>"/>
                       <input type="hidden" name="foto" value="<?php echo $this->session->userdata('foto')?>"/>
                       <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="nama_admin" class="form-control" value="<?= $this->session->userdata('nama_admin') ?>" placeholder="Nama Lengkap" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Username</label>
                            <input type="text" name="username_admin" class="form-control" value="<?= $this->session->userdata('username_admin') ?>" placeholder="Username" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Telepon</label>
                            <input type="number" name="telp_admin" value="<?= $this->session->userdata('telp_admin') ?>" class="form-control" placeholder="Telepon" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Email</label>
                            <input type="email" name="email_admin" value="<?= $this->session->userdata('email_admin') ?>" class="form-control" placeholder="Telepon" required="">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Foto</label>
                            <input type="file" name="foto" onchange="readURL(this);" class="form-control">
                        </div>

                    </div>
                    <hr>
                    <button type='submit' class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
                    <a href="<?php echo base_url()?>sistem/ganti_password" class="btn btn-info"><i class="feather icon-lock"></i> Ubah Password</a>
                    <?php echo form_close(); ?>

                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</div>