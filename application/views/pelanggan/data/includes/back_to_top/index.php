<?php
if ($this->session->userdata('email_pelanggan')) { ?>
<!-- WhatsApp -->
<div class="myk-wa">
	<div class="myk-item" data-wanumber="6287781742506" data-waname="Hedar Alaydrus" data-wadivision="Owner" data-waava="<?php echo base_url()?>images/userWA.png" data-watext="Perkenalkan,%20saya%20Hedar%20selaku%20owner%20Kampung%20Jawa%20Resto,%20apakah%20ada%20yang%20bisa%20saya%20bantu?"></div>
	<div class="myk-item" data-wanumber="6282126131300" data-waname="Kukuh Sambodo" data-wadivision="Manager" data-waava="<?php echo base_url()?>images/userWA.png" data-watext="Perkenalkan,%20saya%20Kukuh%20selaku%20manager%20Kampung%20Jawa%20Resto,%20apakah%20ada%20yang%20bisa%20saya%20bantu?"></div>
	<div class="myk-item" data-wanumber="6285727662524" data-waname="Nabil Muhammad" data-wadivision="Head Team Creative" data-waava="<?php echo base_url()?>images/userWA.png" data-watext="Perkenalkan,%20saya%20Nabil%20selaku%20Head%20Team%20Creative%20Kampung%20Jawa%20Resto,%20apakah%20ada%20yang%20bisa%20saya%20bantu?"></div>
	<div class="myk-item" data-wanumber="6285878844409" data-waname="Agus Syahputra" data-wadivision="Head Shipper" data-waava="<?php echo base_url()?>images/userWA.png" data-watext="Perkenalkan,%20saya%20Agus%20selaku%20Head%20Shipper%20Kampung%20Jawa%20Resto,%20apakah%20ada%20yang%20bisa%20saya%20bantu?"></div>
</div>
<!-- Batas WhatsApp -->
<?php } ?>
<?php
$this->load->model("chatbot_model");
$pelanggan = $this->pelanggan_model->Akun();
$cb = $this->chatbot_model->get_all_chatbot();
?>
<!-- ChatBot -->
<button class="open-button" onclick="openForm()"><img src="<?php echo base_url()?>images/icons/chatbot-icon.png" style="width: 25px" alt="">&nbsp;ChatBot</button>
<div class="chat-popup" id="myForm" style="background:#fff;">
	<div class="chatlabel"><h3><img src="<?php echo base_url()?>images/icons/chatbot-icon.png" style="width: 50px">&nbsp;ChatBot</h3></div>
	<div id="chatmsg" class="card-body">
	</div>
	<form action="javascript:void();" class="form-container"  style="z-index: 99999 !important;">
		<label for="msg"><center><b>Message</b></center></label><br>
		<?php foreach ($cb as $key) {?>
		<button type="submit" class="btn-xs btnAsk txt12 tbl" name="msg" id="msg" value="<?php echo $key['question']?>" style="word-wrap: break-word;margin:2px;white-space: normal; width: 100%;border:none!important; font-size: 13px!important;"><?php echo $key['question']?></button><br>
		<?php } ?>
		<!-- <button type="submit" class="tombol">Send</button> -->
		<button type="button" class="tombol cancel" onclick="closeForm()">Close</button>
	</form>
</div>
<!-- Batas ChatBot -->
<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="topBtn">
	<span class="symbol-btn-back-to-top">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</span>
</div>
<!-- Batas Back to top -->