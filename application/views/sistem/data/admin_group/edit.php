<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo base_url();?>sistem/home">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="<?php echo base_url();?>sistem/admin_group">ADMIN GROUP</a>
					</li>
				</ul>
				
			</div>


<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-gift"></i>Edit ADMIN GROUP
										</div>
										
									</div>
									<div class="portlet-body form">
										
										
											<?php echo form_open('sistem/admin_group_update/','class="form-horizontal"'); ?>
											<div class="form-body">
												<h3 class="form-section"></h3>
												<div class="row">
													<input type="hidden" name="id_admin_group" value="<?php echo $id_admin_group;?>" >
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">ADMIN GROUP</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="nama_admin_group" value="<?php echo $nama_admin_group;?>">
																
															</div>
														</div>
													</div>
													
												</div>
											
												
												
											
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