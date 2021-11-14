<div class="row purchace-popup">
    <div class="col-lg-12">
        <span class="d-block d-md-flex align-items-center text-center" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
            <ul class="breadcrumb py-0">
                <li>
                    <a href="<?php echo base_url();?>sistem/home" class="mt-2 text-dark" ><i class="mdi mdi-home"></i> Home</a>
                    <i class="mdi mdi-arrow-right"></i>
                </li>
                <li>
                    <a href="<?php echo base_url();?>sistem/blog" class="mt-2 text-dark">Blog</a>
                </li>
            </ul></span>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                    <h4 class="card-title"><i class="fa  fa-rss-square"></i> BLOGS</h4>
                    <?php
                    if ($this->session->flashdata('hapus')){
                        echo "&nbsp;&nbsp;&nbsp;<div class='alert alert-danger'>
                        <span>Blog Deleted</span>
                        </div>";
                        echo "<meta http-equiv='refresh' content='1;url=blog'>";
                    }
                    else if($this->session->flashdata('berhasil')){
                        echo "&nbsp;&nbsp;&nbsp;<div class='alert alert-success'>
                        <span>Blog Saved</span>
                        </div>";
                    }
                    else if($this->session->flashdata('update')){
                        echo "&nbsp;&nbsp;&nbsp;<div class='alert alert-success'>
                        <h6>Blog Updated</h6>
                        </div>";
                        echo "<meta http-equiv='refresh' content='1;url=blog'>";
                    }
                    else if($this->session->flashdata('ada')){
                        echo "&nbsp;&nbsp;&nbsp;<div class='alert alert-danger'>
                        <span>Blog Exist</span>
                        </div>";
                    }
                    ?>
                    <p class="card-description">
                        <a class="btn btn-success btn-block" href="<?php echo base_url();?>sistem/blog_tambah">Add<i class="mdi mdi-plus"></i></a>
                        <hr>
                    </p>
                    <table class="table table-striped table-bordered table-hover" id="table" style="word-wrap:break-word;">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Judul Blog</th>
                                <th class="text-center">Tanggal Input</th>
                                <th class="text-center">Isi Blog</th>
                                <th class="text-center">Gambar</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;

                            foreach ($blog as $tampil) {
                                $idB = base64_encode($tampil['id_blog']) ?>
                            <tr >

                                <td class="text-center"><?php echo $no;?></td>
                                <td class="text-center"><?php echo $tampil['judul_blog'];?></td>
                                <td class="text-center"><?php echo format_hari_tanggal_jam($tampil['tgl_input']);?></td>
                                <td class="text-center"><p style="width: 100%; word-wrap:break-word;white-space: normal;"><?php echo character_limiter($tampil['isi_blog'],100)  ?></p></td>
                                <td class="text-center"><img src="<?php echo base_url()?>images/blog/<?php echo $tampil['gambar_blog']?>" class="img img-fluid"></td>
                                <td class="text-center"><?php echo $tampil['nama_kategoriblog'];?></td>
                                <td class="text-center"><a class="btn btn-outline-primary" href="<?php echo base_url();?>sistem/blog_edit/<?php echo $idB;?>"><i class="fa fa-edit"></i></a> &nbsp;
                                    <a class="btn btn-outline-danger hapus-blog" href="<?php echo base_url();?>sistem/blog_delete/<?php echo $idB;?>"> <i class="fa fa-times"></i></a>

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