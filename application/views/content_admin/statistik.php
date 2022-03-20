<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pengaturan Statistik Landing Page
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Beranda User</h3>
                    </div>
                    <?php if (!empty($this->session->flashdata('success'))) { ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                            Pengaturan halaman beranda user berhasil disimpan.
                        </div>
                    <?php } ?>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" enctype="multipart/form-data" method="POST" action="<?php echo base_url('C_admin_statistik/update_data') ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputTotalTraining">Total Training *</label>
                                <input type="number" class="form-control" id="inputTotalTraining" placeholder="Masukkan Jumlah Total Training" name="training" required value="<?php echo $statistik[0]->landing_training ?>" min="0">
                            </div>
                            <div class="form-group">
                                <label for="inputPeserta">Total Peserta *</label>
                                <input type="number" class="form-control" id="inputPeserta" name="peserta" placeholder="Masukkan jumlah total peserta" required value="<?php echo $statistik[0]->landing_peserta ?>" min="0">
                            </div>
                            <div class="form-group">
                                <label for="inputSertifikat">Total Sertifikat</label>
                                <input type="number" class="form-control" id="inputSertifikat" name="sertifikat" placeholder="masukkan total sertifikat yang dikeluarkan" required value="<?php echo $statistik[0]->landing_sertifikat ?>" min="0">
                            </div>
                            <div class="form-group">
                                <label for="inputKepuasan">Nilai Kepuasan</label>
                                <input type="number" class="form-control" id="inputKepuasan" name="kepuasan" placeholder="masukkan nilai kepuasan" required value="<?php echo $statistik[0]->landing_kepuasan ?>" min="0" step=".01">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>