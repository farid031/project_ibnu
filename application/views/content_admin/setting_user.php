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
                        <a href="<?php echo base_url('C_admin_setting_user/export_excel_peserta') ?>" target="_blank"><button class="btn btn-success btn-sm" title="Download Data Peserta"><i class="fas fa-download"></i> Peserta</button></a>
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
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-detail<?= $a; ?>" title="Detail Peserta"><i class="fas fa-info"></i></button>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit<?= $a; ?>" title="Edit Data Peserta"><i class="fas fa-edit"></i></button>
                                            <?php if ($data_usr->user_is_registered == '1') { ?>
                                                <button type="button" class="btn btn-danger" title="Batalkan Registrasi Peserta" onclick="unregUser(<?php echo $data_usr->id_user ?>)"><i class="fas fa-lock-open"></i></button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-success" title="Setujui Registrasi Peserta" onclick="regUser(<?php echo $data_usr->id_user ?>)"><i class="fas fa-lock"></i></button>
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

    <!-- Modal Detail -->
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
    <!-- End Modal Detail -->

    <!-- Modal Edit -->
    <?php
    $y = 1;
    foreach ($user as $data) { ?>
        <div class="modal fade" id="modal-edit<?= $y++; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" method="post" action="<?php echo base_url('C_admin_setting_user/update_user/' . $data->id_user); ?>" enctype="multipart/form-data" accept-charset="utf-8">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Data Peserta</h4>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Peserta</label><br />
                                <input class="form-control" type="text" value="<?php echo (!empty($data->user_name) ? $data->user_name : '-') ?>" name="nama_peserta" />
                            </div>
                            <div class="form-group">
                                <label>Nama Organisasi</label><br />
                                <input class="form-control" type="text" value="<?php echo (!empty($data->user_company) ? $data->user_company : '-') ?>" name="nama_org" />
                            </div>
                            <div class="form-group">
                                <label>Alamat</label><br />
                                <input class="form-control" type="text" value="<?php echo (!empty($data->user_address) ? $data->user_address : '-') ?>" name="alamat" />
                            </div>
                            <div class="form-group">
                                <label>Email</label><br />
                                <input class="form-control" type="email" value="<?php echo (!empty($data->user_email) ? $data->user_email : '-') ?>" name="email" />
                            </div>
                            <div class="form-group">
                                <label>Password Login</label><br />
                                <input class="form-control" type="password" name="pass" placeholder="Isi bagian ini jika ingin mengganti password..."/>
                            </div>
                            <div class="form-group">
                                <label>No. HP</label><br />
                                <input class="form-control" type="text" value="<?php echo (!empty($data->user_phone_number) ? $data->user_phone_number : '-') ?>" name="no_hp" />
                            </div>
                            <div class="form-group">
                                <label>Apakah Ini Admin?</label><br />
                                <select class="form-control" name="is_admin">
                                    <option value="0" <?php ($data->user_is_admin != '1' ? "selected" : '') ?>>Tidak</option>
                                    <option value="1" <?php ($data->user_is_admin == '1' ? "selected" : '') ?>>Ya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>LinkedIn</label><br />
                                <input class="form-control" type="text" value="<?php echo $data->user_linkedin ?>" name="linkedin" />
                            </div>
                            <div class="form-group">
                                <label>Facebook</label><br />
                                <input class="form-control" type="text" value="<?php echo $data->user_facebook ?>" name="facebook" />
                            </div>
                            <div class="form-group">
                                <label>Instagram</label><br />
                                <input class="form-control" type="text" value="<?php echo $data->user_instagram ?>" name="instagram" />
                            </div>
                            <div class="form-group">
                                <label>Twitter</label><br />
                                <input class="form-control" type="text" value="<?php echo $data->user_twitter ?>" name="twitter" />
                            </div>
                            <div class="form-group">
                                <label>Youtube</label><br />
                                <span style="font-size: 20px;">
                                    <input class="form-control" type="text" value="<?php echo $data->user_youtube ?>" name="youtube" />
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button> <button type="submit" class="btn btn-primary pull-right">Simpan</button>
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
</div>
<!-- /.content-wrapper -->