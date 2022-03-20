<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Katalog
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Jenis Katalog</h3><br />
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-input" title="tambah data katalog"><i class="fas fa-plus"></i> Katalog</button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="jns_sertifikat" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Benefit</th>
                                    <th>Materi</th>
                                    <th>Harga Asli</th>
                                    <th>Diskon</th>
                                    <th>Harga Diskon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $a = 1;
                                foreach ($catalog as $data_cat) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data_cat->catalog_title; ?></td>
                                        <td><?php echo $data_cat->catalog_penghargaan; ?></td>
                                        <td><?php echo $data_cat->catalog_pelajaran; ?></td>
                                        <td><?php echo 'Rp' . number_format($data_cat->catalog_harga); ?></td>
                                        <td><?php echo $data_cat->catalog_diskon . '%'; ?></td>
                                        <td><?php echo 'Rp' . number_format(($data_cat->catalog_harga - ($data_cat->catalog_harga * ($data_cat->catalog_diskon / 100))), 0, ',', '.') . ',-' ?></td>
                                        <td>
                                            <button style="width: 60px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-image<?= $a; ?>" title="Lihat Flyer">Flyer</button> <button style="width: 60px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit<?= $a; ?>" title="Edit Katalog">Edit</button> <button style="width: 60px;" class="btn btn-danger btn-md" onclick="hapusCatalog(<?php echo $data_cat->id_catalog ?>)" title="Hapus Katalog">Hapus</button>
                                        </td>
                                    </tr>
                                <?php $a++;
                                } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Benefit</th>
                                    <th>Materi</th>
                                    <th>Harga Asli</th>
                                    <th>Diskon</th>
                                    <th>Harga Diskon</th>
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
                <form role="form" method="post" action="<?php echo base_url('C_admin_catalog/input_catalog'); ?>" enctype="multipart/form-data" accept-charset="utf-8">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Input Data Katalog</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_katalog">Nama Katalog *</label>
                            <input class="form-control" type="text" id="nama_katalog" name="nama_katalog" placeholder="Masukkan Nama Pelatihan/Katalog" required>
                        </div>
                        <div class="form-group">
                            <label for="penghargaan">Benefit *</label>
                            <input class="form-control" type="text" id="penghargaan" name="penghargaan" placeholder="Contoh: Sertifikat" required>
                        </div>
                        <div class="form-group">
                            <label for="materi">Materi Yang Didapat *</label>
                            <input class="form-control" type="text" id="materi" name="materi" placeholder="Contoh: Video Pelatihan" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga Asli (Rp)*</label>
                            <input class="form-control" type="number" id="harga" name="harga" placeholder="Masukkan Harga Katalog/Pelatihan" required min="0">
                        </div>
                        <div class="form-group">
                            <label for="diskon">Diskon (%) *</label>
                            <input class="form-control" type="number" id="diskon" name="diskon" placeholder="Masukkan Harga Katalog/Pelatihan" required min="0" max="100" maxlength="3">
                        </div>
                        <div class="form-group">
                            <label for="link">Link Google Form *</label>
                            <input class="form-control" type="text" id="link" name="link" placeholder="Masukkan Link Google Form" required>
                        </div>
                        <div class="form-group">
                            <label for="flyer">Flyer Katalog *</label>
                            <input class="form-control" type="file" id="flyer" name="flyer" required accept="image/*">
                            <small>* Ukuran file maksimal 1 MB</small>
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
    foreach ($catalog as $data) { ?>
        <div class="modal fade" id="modal-edit<?= $y++; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" method="post" action="<?php echo base_url('C_admin_catalog/update_catalog/' . $data->id_catalog); ?>" enctype="multipart/form-data" accept-charset="utf-8">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Data Katalog</h4>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_katalog">Nama Katalog *</label>
                                <input class="form-control" type="text" id="nama_katalog" name="nama_katalog" placeholder="Masukkan Nama Pelatihan/Katalog" required value="<?php echo $data->catalog_title ?>">
                            </div>
                            <div class="form-group">
                                <label for="penghargaan">Benefit *</label>
                                <input class="form-control" type="text" id="penghargaan" name="penghargaan" placeholder="Contoh: Sertifikat" required value="<?php echo $data->catalog_penghargaan ?>">
                            </div>
                            <div class="form-group">
                                <label for="materi">Materi Yang Didapat *</label>
                                <input class="form-control" type="text" id="materi" name="materi" placeholder="Contoh: Video Pelatihan" required value="<?php echo  $data->catalog_pelajaran ?>">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga Asli (Rp)*</label>
                                <input class="form-control" type="number" id="harga" name="harga" placeholder="Masukkan Harga Katalog/Pelatihan" required min="0" value="<?php echo $data->catalog_harga; ?>">
                            </div>
                            <div class="form-group">
                                <label for="diskon">Diskon (%) *</label>
                                <input class="form-control" type="number" id="diskon" name="diskon" placeholder="Masukkan Harga Katalog/Pelatihan" required min="0" max="100" maxlength="3" value="<?php echo $data->catalog_diskon; ?>">
                            </div>
                            <div class="form-group">
                                <label for="link">Link Google Form *</label>
                                <input class="form-control" type="text" id="link" name="link" placeholder="Masukkan Link Google Form" required value="<?php echo $data->catalog_link ?>">
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
    <?php $y++;
    }
    ?>
    <!-- End Modal Edit -->

    <!-- Modal Show Flyer -->
    <?php
    $z = 1;
    foreach ($catalog as $data) { ?>
        <div class="modal fade" id="modal-image<?= $z++; ?>">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Flyer Katalog</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <img src="<?php echo base_url($data->catalog_flyer_url); ?>" alt="Flyer Katalog" style="width: 100%;">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php $z++;
    }
    ?>
    <!-- End Modal Show Flyer -->
</div>
<!-- /.content-wrapper -->