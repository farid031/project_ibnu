<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Video Sub Materi
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Video Sub Materi <?php echo ucwords(strtolower($learn_detail[0]->learn_det_desc)) ?></h3><br />
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-input" title="tambah video sub materi"><i class="fas fa-plus"></i> Video Sub Materi</button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="jns_sertifikat" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Deskripsi Video</th>
                                    <th>File Video</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $a = 1;
                                foreach ($learn_video as $data_vd) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data_vd->vid_learn_desc; ?></td>
                                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-video-sub-learn<?= $a; ?>" title="Lihat Video Sub Materi"><i class="fas fa-eye"></i></button></td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit<?= $a; ?>" title="Edit Video"><i class="fas fa-pen"></i></button> <button class="btn btn-danger btn-md" onclick="hapusLearningVideo(<?php echo $data_vd->id_vid_learn ?>)" title="Hapus Video"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                <?php $a++;
                                } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Deskripsi Video</th>
                                    <th>File Video</th>
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
                <form role="form" method="post" action="<?php echo base_url('C_admin_learn_dt_video/input_learn_video/' . $this->uri->segment(3)); ?>" enctype="multipart/form-data" accept-charset="utf-8">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Input Video Sub Materi</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="judul_video">Judul Video *</label>
                            <input class="form-control" type="text" id="judul_video" name="judul_video" placeholder="Masukkan Nama Sub Materi" required>
                        </div>
                        <div class="form-group">
                            <label for="video">File Video *</label>
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
    foreach ($learn_video as $data) { ?>
        <div class="modal fade" id="modal-edit<?= $y++; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" method="post" action="<?php echo base_url('C_admin_learn_dt_video/update_learn_video/' . $data->id_vid_learn . '-' . $data->vid_learn_id_learn_det); ?>" enctype="multipart/form-data" accept-charset="utf-8">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Video Sub Materi</h4>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="judul_video">Judul Video *</label>
                                <input class="form-control" type="text" id="judul_video" name="judul_video" placeholder="Masukkan Nama Sub Materi" required value="<?php echo $data->vid_learn_desc ?>">
                            </div>
                            <div class="form-group">
                                <label for="video">Video Sub Materi</label>
                                <input class="form-control" type="file" id="video" name="video" accept="video/*">
                                <small>* Kosongi jka tidak ingin mengubah video</small>
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

    <!-- Modal Video -->
    <?php
    $y = 1;
    foreach ($learn_video as $data) { ?>
        <div class="modal fade" id="modal-video-sub-learn<?= $y++; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Video Sub Materi</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <?php if (!empty($data->vid_learn_url)) { ?>
                                <video width="100%" height="100%" controls>
                                    <source src="<?php echo base_url('assets/video/video-learning/' . $data->vid_learn_url) ?>" type="video/mp4">
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


    <!-- Modal Input Peserta -->
    <?php
    $z = 1;
    foreach ($learn_detail as $data_learn_det) {
        $learn_det_user = $this->M_data->get_sub_materi_user($data_learn_det->id_learn_det);
        $user = $this->M_data->get_user_learn_det($data_learn_det->id_learn_det); ?>
        <div class="modal fade" id="modal-input-cat-user<?= $z; ?>">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Entry Data Peserta <?php echo $data_learn_det->learn_det_desc ?></h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_katalog">Nama Peserta *</label>
                            <select id="nama_peserta_sub_materi_<?php echo $z ?>" class="form-control select2 btn btn-primary" multiple="multiple" data-placeholder="Pilih Peserta" style="width: 100%;">
                                <?php foreach ($user as $data) { ?>
                                    <option value="<?php echo $data->id_user; ?>"><?php echo $data->user_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button onclick="saveUserSubMateri('<?php echo $data_learn_det->id_learn_det . '-' . $z ?>')" class="btn btn-primary">Simpan</button>
                        </div>

                        <table id="table_sub_materi_user" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Organisasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($learn_det_user as $data) { ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data->user_name; ?></td>
                                        <td><?php echo $data->user_email; ?></td>
                                        <td><?php echo $data->user_company; ?></td>
                                        <td>
                                            <button class="btn btn-danger btn-xs" title="Hapus Peserta" onclick="hapusEntryPeserta('<?php echo $data->id_user . '-' . $data->learn_dt_usr_learn_id ?>')"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Organisasi</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php $z++;
    }
    ?>
    <!-- End Modal Input Peserta -->
</div>
<!-- /.content-wrapper -->