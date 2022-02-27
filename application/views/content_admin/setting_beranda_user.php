<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pengaturan Halaman Beranda User
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
                    <form role="form" enctype="multipart/form-data" method="POST" action="<?php echo base_url('C_admin_setting_beranda/update_beranda') ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputTagline">Tagline *</label>
                                <input type="text" class="form-control" id="inputTagline" placeholder="Masukkan Tagline" name="tagline" required value="<?php echo $beranda[0]->beranda_tagline ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputKataMutiara">Kata Mutiara *</label>
                                <input type="text" class="form-control" id="inputKataMutiara" name="kata_mutiara" placeholder="Masukkan kata mutiara" required value="<?php echo $beranda[0]->beranda_kata_mutiara ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputSumberMutiara">Sumber Kata Mutiara</label>
                                <input type="text" class="form-control" id="inputSumberMutiara" name="sumber_kata_mutiara" placeholder="contoh: Imam syafi'i, Albert Enstein" required value="<?php echo $beranda[0]->beranda_sumber_kata_mutiara ?>">
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