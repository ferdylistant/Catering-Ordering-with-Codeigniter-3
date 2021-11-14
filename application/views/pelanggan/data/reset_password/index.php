
<section class="section-reservation bg1-pattern p-t-180 p-b-113">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 p-b-30">
                <div class="t-center">
                    <span class="tit2 t-center">
                        Ganti password dan amankan akun Anda
                    </span>

                    <h3 class="tit3 t-center m-b-25 m-t-2" style="font-size: 20px">
                        <?= $this->session->userdata('reset_email') ?>
                    </h3>
                </div>

                <?php echo form_open('lupa_password/change_password','class="wrap-form-reservation size22 m-l-r-auto"') ?>

                <div class="row">

                    <div class="col-md-12">
                        <!-- Email -->
                        <span class="txt9">
                            Password Baru
                        </span>

                        <div class="size12 bo2 bo-rad-10 m-t-3 m-b-23">
                            <input class="bo-rad-10 sizefull txt10 p-l-20" type="password" id="password1" name="password1" placeholder="Masukkan password baru Anda...">
                            <?php echo form_error('password1','<span class="text-danger">','</span>')?>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <span class="txt9">
                            Ulangi Password Baru
                        </span>

                        <div class="size12 bo2 bo-rad-10 m-t-3 m-b-23">
                            <input class="bo-rad-10 sizefull txt10 p-l-20" type="password" id="password2" name="password2" placeholder="Ulangi password baru...">
                            <?php echo form_error('password2','<span class="text-danger">','</span>')?>
                        </div>
                    </div>
                </div>

                <div class="flex-c-m m-t-6">
                    <button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">
                        Ganti Password
                    </button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>


