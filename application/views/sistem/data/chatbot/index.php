<div class="row purchace-popup">
    <div class="col-lg-12">
        <span class="d-block d-md-flex align-items-center text-center" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
            <ul class="breadcrumb py-0">
                <li>
                    <a href="<?php echo base_url();?>sistem/home" class="mt-2 text-dark" ><i class="mdi mdi-home"></i> Home</a>
                    <i class="mdi mdi-arrow-right"></i>
                </li>
                <li>
                    <a href="<?php echo base_url();?>sistem/chatbot" class="mt-2 text-dark">Settings Chatbot</a>
                </li>
            </ul></span>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                    <h4 class="card-title"><i class="fa fa-weixin"></i> SETTINGS CHATBOT</h4>
                    <?php
                    if ($this->session->flashdata('hapus')){
                        echo "&nbsp;&nbsp;&nbsp;<div class='alert alert-danger'>
                        <span>Chatbot Deleted</span>
                        </div>";
                        echo "<meta http-equiv='refresh' content='1;url=chatbot'>";
                    }
                    else if($this->session->flashdata('berhasil')){
                        echo "&nbsp;&nbsp;&nbsp;<div class='alert alert-success'>
                        <span>Chatbot Saved</span>
                        </div>";
                    }
                    else if($this->session->flashdata('update')){
                        echo "&nbsp;&nbsp;&nbsp;<div class='alert alert-success'>
                        <h6>Chatbot Updated</h6>
                        </div>";
                        echo "<meta http-equiv='refresh' content='1;url=chatbot'>";
                    }
                    else if($this->session->flashdata('ada')){
                        echo "&nbsp;&nbsp;&nbsp;<div class='alert alert-danger'>
                        <span>Chatbot Exist</span>
                        </div>";
                    }
                    ?>
                    <p class="card-description">
                        <a class="btn btn-success btn-block" href="<?php echo base_url();?>sistem/chatbot_tambah">Add<i class="mdi mdi-plus"></i></a>
                        <hr>
                    </p>
                    <table class="table table-striped table-bordered table-hover" id="table" style="word-wrap:break-word;">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Pertanyaan</th>
                                <th class="text-center">Jawaban</th>
                                <th class="text-center">Tanggal Buat</th>
                                <th class="text-center">Tanggal Update</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;

                            foreach ($chatbot as $tampil) { ?>
                            <tr >

                                <td class="text-center"><?php echo $no;?></td>
                                <td class="text-center"><p style="width: 100%; word-wrap:break-word;white-space: normal;"><?php echo $tampil['question'];?></p></td>
                                <td class="text-center"><p style="width: 100%; word-wrap:break-word;white-space: normal;"><?php echo $tampil['answer'];?></p></td>
                                <td class="text-center"><p style="width: 100%; word-wrap:break-word;white-space: normal;"><?php echo format_hari_tanggal_jam($tampil['date_time_created']);?></p></td>
                                <td class="text-center"><p style="width: 100%; word-wrap:break-word;white-space: normal;"><?php
                                    if ($tampil['date_time_updated'] == null) {
                                        echo "Belum Pernah Diubah!";
                                    }
                                    else{
                                        echo format_hari_tanggal_jam($tampil['date_time_updated']);
                                    }
                                 ?></p></td>
                                <td class="text-center"><a class="btn btn-outline-primary" href="<?php echo base_url();?>sistem/chatbot_edit/<?php echo $tampil['id'];?>"><i class="fa fa-edit"></i></a> &nbsp;
                                    <a class="btn btn-outline-danger hapus-chatbot" href="<?php echo base_url();?>sistem/chatbot_delete/<?php echo $tampil['id'];?>"> <i class="fa fa-times"></i></a>

                                </td>
                            </tr>
                            <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>