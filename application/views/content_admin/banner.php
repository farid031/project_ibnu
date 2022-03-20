<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Banner Landing Page
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Banner Landing Page</h3><br />
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-input" title="tambah data katalog"><i class="fas fa-plus"></i> Banner</button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="jns_sertifikat" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Subjudul</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $a = 1;
                                foreach ($banner as $data_banner) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data_banner->judul_banner; ?></td>
                                        <td><?php echo $data_banner->subjudul_banner; ?></td>
                                        <td><?php echo $data_banner->desc_banner; ?></td>
                                        <td>
                                            <button style="width: 60px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-image<?= $a; ?>" title="Lihat Flyer">Flyer</button> <button style="width: 60px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit<?= $a; ?>" title="Edit Banner">Edit</button> <button style="width: 60px;" class="btn btn-danger btn-md" onclick="hapusBanner(<?php echo $data_banner->id_banner ?>)" title="Hapus Banner">Hapus</button>
                                        </td>
                                    </tr>
                                <?php $a++;
                                } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Subjudul</th>
                                    <th>Deskripsi</th>
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
                <form role="form" method="post" action="<?php echo base_url('C_admin_banner/input_banner'); ?>" enctype="multipart/form-data" accept-charset="utf-8">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Input Data Banner</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="judul_banner">Judul Banner *</label>
                            <input class="form-control" type="text" id="judul_banner" name="judul_banner" placeholder="Masukkan Nama Pelatihan/Katalog" required>
                        </div>
                        <div class="form-group">
                            <label for="subjudul_banner">Sub Judul Banner *</label>
                            <input class="form-control" type="text" id="subjudul_banner" name="subjudul_banner" placeholder="Contoh: Sertifikat" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Banner *</label>
                            <input class="form-control" type="text" id="deskripsi" name="deskripsi" placeholder="Contoh: Video Pelatihan" required>
                        </div>
                        <div class="form-group">
                            <label for="flyer">Flyer Banner *</label>
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
    foreach ($banner as $data) { ?>
        <div class="modal fade" id="modal-edit<?= $y++; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" method="post" action="<?php echo base_url('C_admin_banner/update_banner/' . $data->id_banner); ?>" enctype="multipart/form-data" accept-charset="utf-8">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Data Banner</h4>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="judul_banner">Judul Banner *</label>
                                <input class="form-control" type="text" id="judul_banner" name="judul_banner" placeholder="Masukkan Nama Pelatihan/Katalog" required value="<?php echo $data->judul_banner ?>">
                            </div>
                            <div class="form-group">
                                <label for="subjudul_banner">Subjudul Banner *</label>
                                <input class="form-control" type="text" id="subjudul_banner" name="subjudul_banner" placeholder="Contoh: Sertifikat" required value="<?php echo $data->subjudul_banner ?>">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Banner *</label>
                                <input class="form-control" type="text" id="deskripsi" name="deskripsi" placeholder="Contoh: Video Pelatihan" required value="<?php echo  $data->desc_banner ?>">
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
    foreach ($banner as $data) { ?>
        <div class="modal fade" id="modal-image<?= $z++; ?>">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Flyer Banner</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <img src="<?php echo base_url($data->img_banner_url); ?>" alt="Flyer Katalog" style="width: 100%;">
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