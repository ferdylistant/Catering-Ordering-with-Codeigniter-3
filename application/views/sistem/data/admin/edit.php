<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo base_url();?>sistem/home">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo base_url();?>sistem/admin">Admin</a>
					</li>
				</ul>
				
			</div>


<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-gift"></i>Form Edit Admin
										</div>
										
									</div>
									<div class="portlet-body form">
										
										
											<?php echo form_open_multipart('sistem/admin_update/','class="form-horizontal"'); ?>
											<div class="form-body">
												<h3 class="form-section"></h3>
												<div class="row">
													<input type="hidden" name="id_admin" value="<?php echo $id_admin;?>" >
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Group</label>
															<div class="col-md-9">
																<select data-placeholder="Select..." name="admin_group_id" class="form-control select2me">
																<option value=""></option>					
																<?php
																foreach ($admin_group->result_array() as $tampil) { 
																if ($admin_group_id==$tampil['id_admin_group']) { ?>
																<option value="<?php echo $tampil['id_admin_group'];?>" selected="selected"><?php echo $tampil['nama_admin_group'];?></option>
																<?php
																}
																else { ?>
																<option value="<?php echo $tampil['id_admin_group'];?>"><?php echo $tampil['nama_admin_group'];?></option>
																<?php
																}
																					
																}
																?>
															</select>
															</div>
														</div>
													</div>



													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Nama</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="nama_admin" value="<?php echo $nama_admin;?>">
																
															</div>
														</div>
													</div>
													
												</div>

												<div class="row">
													

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Email</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="email_admin" value="<?php echo $email_admin;?>">
																
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Telp</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="telp_admin" value="<?php echo $telp_admin;?>">
																
															</div>
														</div>
													</div>
													
												</div>

												<div class="row">
													

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Username</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="username_admin" value="<?php echo $username_admin;?>">
																
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Password</label>
															<div class="col-md-9">
																<input type="password" class="form-control" placeholder="" name="nama_admin" value="">
																
															</div>
														</div>
													</div>
													
												</div>

											<span class="label label-important">Kosongkan Passsword Jika Tidak Dirubah!</span>
											</div>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-offset-3 col-md-9">
																<button type="submit" class="btn green">Update</button>
																</div>
														</div>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
										<?php echo form_close();?>  
										
									</div>
								</div>