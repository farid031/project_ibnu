<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Peserta
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Peserta</h3><br />
                        <!-- <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-input" title="tambah data learning"><i class="fas fa-plus"></i> Learning</button> -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="jns_sertifikat" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peserta</th>
                                    <th>Nama Organisasi</th>
                                    <th>Alamat</th>
                                    <th>E-mail</th>
                                    <th>Status Register</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $a = 1;
                                foreach ($user as $data_usr) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data_usr->user_name; ?></td>
                                        <td><?php echo $data_usr->user_company; ?></td>
                                        <td><?php echo $data_usr->user_address; ?></td>
                                        <td><?php echo $data_usr->user_email; ?></td>
                                        <td><?php echo ($data_usr->user_is_registered == '1' ? 'Sudah' : 'Belum'); ?></td>
                                        <td>
                                            <button style="width: 60px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-detail<?= $a; ?>" title="Detail Peserta">Detail</button>
                                            <?php if ($data_usr->user_is_registered == '1') { ?>
                                                <button style="width: 60px;" type="button" class="btn btn-danger" title="Batalkan Registrasi Peserta" onclick="unregUser(<?php echo $data_usr->id_user ?>)">Unreg</button>
                                            <?php } else { ?>
                                                <button style="width: 60px;" type="button" class="btn btn-success" title="Setujui Registrasi Peserta" onclick="regUser(<?php echo $data_usr->id_user ?>)">Reg</button>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php $a++;
                                } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peserta</th>
                                    <th>Nama Organisasi</th>
                                    <th>Alamat</th>
                                    <th>E-mail</th>
                                    <th>Status Register</th>
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

    <!-- Modal Edit -->
    <?php
    $y = 1;
    foreach ($user as $data) { ?>
        <div class="modal fade" id="modal-detail<?= $y++; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Detail Data Peserta</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="learn_head">Nama Peserta</label><br />
                            <span style="font-size: 20px;"><?php echo (!empty($data->user_name) ? $data->user_name : '-') ?></span>
                        </div>
                        <div class="form-group">
                            <label for="learn_head">Nama Organisasi</label><br />
                            <span style="font-size: 20px;"><?php echo (!empty($data->user_company) ? $data->user_company : '-') ?></span>
                        </div>
                        <div class="form-group">
                            <label for="learn_head">Alamat</label><br />
                            <span style="font-size: 20px;"><?php echo (!empty($data->user_address) ? $data->user_address : '-') ?></span>
                        </div>
                        <div class="form-group">
                            <label for="learn_head">Email</label><br />
                            <span style="font-size: 20px;"><?php echo (!empty($data->user_email) ? $data->user_email : '-') ?></span>
                        </div>
                        <div class="form-group">
                            <label for="learn_head">LinkedIn</label><br />
                            <span style="font-size: 20px;">
                                <?php if (!empty($data->user_linkedin)) { ?>
                                    <a href="<?php echo $data->user_linkedin ?>" target="_blank"><?php echo $data->user_linkedin ?></a>
                                <?php } else {
                                    echo '-';
                                } ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="learn_head">Facebook</label><br />
                            <span style="font-size: 20px;">
                                <?php if (!empty($data->user_facebook)) { ?>
                                    <a href="<?php echo $data->user_facebook ?>" target="_blank"><?php echo $data->user_facebook ?></a>
                                <?php } else {
                                    echo '-';
                                } ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="learn_head">Instagram</label><br />
                            <span style="font-size: 20px;">
                                <?php if (!empty($data->user_instagram)) { ?>
                                    <a href="<?php echo $data->user_instagram ?>" target="_blank"><?php echo $data->user_instagram ?></a>
                                <?php } else {
                                    echo '-';
                                } ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="learn_head">Twitter</label><br />
                            <span style="font-size: 20px;">
                                <?php if (!empty($data->user_twitter)) { ?>
                                    <a href="<?php echo $data->user_twitter ?>" target="_blank"><?php echo $data->user_twitter ?></a>
                                <?php } else {
                                    echo '-';
                                } ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="learn_head">Youtube</label><br />
                            <span style="font-size: 20px;">
                                <?php if (!empty($data->user_youtube)) { ?>
                                    <a href="<?php echo $data->user_youtube ?>" target="_blank"><?php echo $data->user_youtube ?></a>
                                <?php } else {
                                    echo '-';
                                } ?>
                            </span>
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
    <!-- End Modal Edit -->
</div>
<!-- /.content-wrapper -->