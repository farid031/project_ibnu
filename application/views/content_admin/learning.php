<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Software
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Software</h3><br />
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-input" title="tambah data software"><i class="fas fa-plus"></i> Software</button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="jns_sertifikat" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Software</th>
                                    <th>Jumlah Materi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $a = 1;
                                foreach ($learn_title as $data_learn) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data_learn->learn_title_desc; ?></td>
                                        <td><?php echo $data_learn->jml_header; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('C_admin_learning_header/index/' . $data_learn->id_learn_title) ?>" target="_blank"><button type="button" class="btn btn-primary" title="Lihat Data Software"><i class="fas fa-info"></i></button></a> <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit<?= $a; ?>" title="Edit Data Software"><i class="fas fa-pen"></i></button> <button class="btn btn-danger btn-md" onclick="hapusLearningTitle(<?php echo $data_learn->id_learn_title ?>)" title="Hapus Data Software"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                <?php $a++;
                                } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Software</th>
                                    <th>Jumlah Materi</th>
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
                <form role="form" method="post" action="<?php echo base_url('C_admin_learning/input_learn_title'); ?>" enctype="multipart/form-data" accept-charset="utf-8">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Input Data Software</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="learn_title">Nama Software *</label>
                            <input class="form-control" type="text" id="learn_title" name="learn_title" placeholder="Masukkan Nama Software" required>
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
    foreach ($learn_title as $data) { ?>
        <div class="modal fade" id="modal-edit<?= $y++; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" method="post" action="<?php echo base_url('C_admin_learning/update_learn_title/' . $data->id_learn_title); ?>" enctype="multipart/form-data" accept-charset="utf-8">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Data Software</h4>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="learn_title">Nama Software *</label>
                                <input class="form-control" type="text" id="learn_title" name="learn_title" placeholder="Masukkan Nama Software" required value="<?php echo $data->learn_title_desc ?>">
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
</div>
<!-- /.content-wrapper -->