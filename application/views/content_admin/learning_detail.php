<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Learning
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Sub Learning <?php echo ucwords(strtolower($learn_head[0]->learn_head_desc)) ?></h3><br />
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-input" title="tambah data learning"><i class="fas fa-plus"></i> Sub Learning</button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="jns_sertifikat" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Sub Learning</th>
                                    <th>Banner</th>
                                    <th>Video</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $a = 1;
                                foreach ($learn_detail as $data_learn) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data_learn->learn_det_desc; ?></td>
                                        <td><button style="width: 100px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-banner-sub-learn<?= $a; ?>" title="Lihat Banner Sub Learning">Lihat Banner</button></td>
                                        <td><button style="width: 100px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-video-sub-learn<?= $a; ?>" title="Lihat Video Sub Learning">Lihat Video</button></td>
                                        <td>
                                            <button style="width: 60px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit<?= $a; ?>" title="Edit Judul Learning">Edit</button> <button style="width: 60px;" class="btn btn-danger btn-md" onclick="hapusLearningDetail(<?php echo $data_learn->id_learn_det ?>)" title="Hapus Sub Learning">Hapus</button>
                                        </td>
                                    </tr>
                                <?php $a++;
                                } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Sub Learning</th>
                                    <th>Banner</th>
                                    <th>Video</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    <!--modal input-->
    <div class="modal fade" id="modal-input">
        <div class="modal-dialog">
            <div class="modal-content">
                <form role="form" method="post" action="<?php echo base_url('C_admin_learning_detail/input_learn_detail/' . $this->uri->segment(3)); ?>" enctype="multipart/form-data" accept-charset="utf-8">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Input Data Sub Learning</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="learn_detail">Nama Sub Learning *</label>
                            <input class="form-control" type="text" id="learn_detail" name="learn_detail" placeholder="Masukkan Nama Learning" required>
                        </div>
                        <div class="form-group">
                            <label for="banner">Banner Sub Learning *</label>
                            <input class="form-control" type="file" id="banner" name="banner" required accept="image/*">
                            <small>* Ukuran file maksimal 5 MB</small>
                        </div>
                        <div class="form-group">
                            <label for="video">Video Sub Learning *</label>
                            <input class="form-control" type="file" id="video" name="video" required accept="video/*">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal input-->

    <!-- Modal Edit -->
    <?php
    $y = 1;
    foreach ($learn_detail as $data) { ?>
        <div class="modal fade" id="modal-edit<?= $y++; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" method="post" action="<?php echo base_url('C_admin_learning_detail/update_learn_detail/' . $data->id_learn_det . '-' . $data_learn->learn_det_id_header); ?>" enctype="multipart/form-data" accept-charset="utf-8">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Data Sub Learning</h4>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="learn_detail">Nama Learning *</label>
                                <input class="form-control" type="text" id="learn_detail" name="learn_detail" placeholder="Masukkan Nama Learning" required value="<?php echo $data->learn_det_desc ?>">
                            </div>
                            <div class="form-group">
                                <label for="banner">Banner Sub Learning</label>
                                <input class="form-control" type="file" id="banner" name="banner" accept="image/*">
                                <small>* Kosongi, jika tidak ingin mengubah banner sub learning</small><br />
                                <small>* Ukuran file maksimal 5 MB</small>
                            </div>
                            <div class="form-group">
                                <label for="video">Video Sub Learning</label>
                                <input class="form-control" type="file" id="video" name="video" accept="video/*">
                                <small>* Kosongi, jika tidak ingin mengubah video sub learning</small>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php
    }
    ?>
    <!-- End Modal Edit -->

    <!-- Modal Banner -->
    <?php
    $y = 1;
    foreach ($learn_detail as $data) { ?>
        <div class="modal fade" id="modal-banner-sub-learn<?= $y++; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Banner Sub Learning</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <?php if (file_exists('assets/img/banner-learning/' . $data->learn_det_banner_file)) { ?>
                                <img src="<?php echo base_url('assets/img/banner-learning/' . $data->learn_det_banner_file); ?>" alt="Banner Sub Learning" style="width: 100%;">
                            <?php } else { ?>
                                Banner belum diupload
                            <?php }
                            ?>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php
    }
    ?>
    <!-- End Modal Banner -->

    <!-- Modal Video -->
    <?php
    $y = 1;
    foreach ($learn_detail as $data) { ?>
        <div class="modal fade" id="modal-video-sub-learn<?= $y++; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Video Sub Learning</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <?php if (file_exists('assets/video/video-learning/' . $data->learn_det_video_file)) { ?>
                                <video width="100%" height="100%" controls>
                                    <source src="<?php echo base_url('assets/video/video-learning/' . $data->learn_det_video_file) ?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            <?php } else { ?>
                                Video belum diupload
                            <?php }
                            ?>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php
    }
    ?>
    <!-- End Modal Video -->
</div>
<!-- /.content-wrapper -->