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
                        <h3 class="box-title">Data Learning</h3><br />
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-input" title="tambah data learning"><i class="fas fa-plus"></i> Learning</button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="jns_sertifikat" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Learning</th>
                                    <th>Jumlah Sub Learning</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $a = 1;
                                foreach ($learn_header as $data_learn) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data_learn->learn_head_desc; ?></td>
                                        <td><?php echo $data_learn->jml_header; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('C_admin_learning_detail/index/'. $data_learn->id_learn_head) ?>" target="_blank"><button style="width: 100px;" type="button" class="btn btn-primary" title="Lihat Data Sub Learning">Sub Learning</button></a> <button style="width: 60px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit<?= $a; ?>" title="Edit Judul Learning">Edit</button> <button style="width: 60px;" class="btn btn-danger btn-md" onclick="hapusLearningHeader(<?php echo $data_learn->id_learn_head ?>)" title="Hapus Judul Learning">Hapus</button>
                                        </td>
                                    </tr>
                                <?php $a++;
                                } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Learning</th>
                                    <th>Jumlah Sub Learning</th>
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
                <form role="form" method="post" action="<?php echo base_url('C_admin_learning_header/input_learn_header/'. $this->uri->segment(3)); ?>" enctype="multipart/form-data" accept-charset="utf-8">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Input Data Learning</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="learn_head">Nama Learning *</label>
                            <input class="form-control" type="text" id="learn_head" name="learn_head" placeholder="Masukkan Nama Learning" required>
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
    foreach ($learn_header as $data) { ?>
        <div class="modal fade" id="modal-edit<?= $y++; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" method="post" action="<?php echo base_url('C_admin_learning_header/update_learn_header/' . $data->id_learn_head.'-'.$data_learn->learn_head_id_title); ?>" enctype="multipart/form-data" accept-charset="utf-8">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Data Learning</h4>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="learn_head">Nama Learning *</label>
                                <input class="form-control" type="text" id="learn_head" name="learn_head" placeholder="Masukkan Nama Learning" required value="<?php echo $data->learn_head_desc ?>">
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