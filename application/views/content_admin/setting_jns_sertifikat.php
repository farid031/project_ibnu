<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Jenis Sertifikat
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Jenis Sertifikat</h3><br />
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-input" title="tambah data sertifikat"><i class="fas fa-plus"></i> Jenis Sertifikat</button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="jns_sertifikat" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Sertifikat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $a = 1;
                                foreach ($jns_sertifikat as $data_sert) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data_sert->jns_cert_name; ?></td>
                                        <td>
                                            <button style="width: 60px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit<?= $a++; ?>">Edit</button> <button style="width: 60px;" class="btn btn-danger btn-md" onclick="hapusJnsSertifikat(<?php echo $data_sert->id_jns_cert ?>)">Hapus</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Sertifikat</th>
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
                <form role="form" method="post" action="<?php echo base_url('C_admin_setting_jns_sertifikat/input_sertifikat'); ?>" enctype="multipart/form-data" accept-charset="utf-8">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Input Data Sertifikat</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_sertifikat">Nama Sertifikat</label>
                            <input class="form-control" type="text" id="nama_sertifikat" name="nama_sertifikat" placeholder="Masukkan Nama Sertifikat" required>
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
    foreach ($jns_sertifikat as $data) { ?>
        <div class="modal fade" id="modal-edit<?= $y++; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" method="post" action="<?php echo base_url('C_admin_setting_jns_sertifikat/update_sertifikat/' . $data->id_jns_cert); ?>" enctype="multipart/form-data" accept-charset="utf-8">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Jenis Sertifikat</h4>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_sertifikat">Nama Sertifikat</label>
                                <input class="form-control" type="text" id="nama_sertifikat" name="nama_sertifikat" placeholder="Masukkan Nama Sertifikat" value="<?php echo $data->jns_cert_name ?>">
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
    <?php $a++;
    }
    ?>
    <!-- End Modal Edit -->
</div>
<!-- /.content-wrapper -->