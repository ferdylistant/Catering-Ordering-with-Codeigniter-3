<div class="row purchace-popup">
  <div class="col-12">
    <span class="d-block d-md-flex align-items-center text-center" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
      <ul class="breadcrumb py-0">
        <li>
          <a href="<?php echo base_url();?>sistem/home" class="mt-2 text-dark" ><i class="mdi mdi-home"></i> Home</a>
          <i class="mdi mdi-arrow-right"></i>
        </li>
        <li>
          <a href="<?php echo base_url();?>sistem/chatbot" class="mt-2 text-dark">Settings Chatbot</a>
          <i class="mdi mdi-arrow-right"></i>
        </li>
        <li>
          <a href="<?php echo base_url();?>sistem/chatbot_simpan" class="mt-2 text-dark">Add Chatbot</a>
        </li>
      </ul>
    </span>
  </div>
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
        <h4 class="card-title"><i class="fa fa-weixin"></i> ADD CHATBOT</h4>
        <p class="card-description">
          <hr>
        </p>
        <?php echo form_open('sistem/chatbot_simpan/','class="form-horizontal"'); ?>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Pertanyaan Pelanggan:</label>
              <div class="col-sm-8">
                <textarea class="form-control" placeholder="" name="question"></textarea>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Jawaban Chatbot:</label>
              <div class="col-sm-12">
                <textarea class="form-control" id="ckeditor" placeholder="" name="answer"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="py-3">
          <button type="submit" class="btn btn-success mr-2">Simpan</button>
          <button type="button" class="btn btn-dark" onclick="goBack()">Cancel</button>
        </div>
        <?php echo form_close();?>
      </div>
    </div>
  </div>
</div>