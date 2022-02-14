<div id="about" class="about" style="background-color: #E3EBE8;">
    <div class="container" style="background-color: #E3EBE8;">
        <div class="row">
            <div align="center" style="padding: 20px; background-color: #FAC100; width: 30%; border-radius: 5%;">
                <img src="<?php echo base_url('assets/img/avatar/' . $user[0]->user_avatar) ?>" alt="User Image" height="200px" width="200px" style="border-radius: 50%;"><br />
                <p style="font-weight: bold; font-size: 40px;"><?php echo $user[0]->user_name ?></p>
                <div>
                    <table cellpadding="5">
                        <tr>
                            <td style="font-size: 20px; font-weight: bold;">Pemula</td>
                            <td style="font-size: 20px; font-weight: bold;">100</td>
                            <td style="font-size: 20px; font-weight: bold;">100</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="box" style="padding: 20px; background-color: #E3EBE8; width: 70%;">
                <table id="tbl_my_achievments" class="table table-bordered table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Certificate Name</th>
                            <th>Certificate ID</th>
                            <th>Issued On</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $a = 1;
                        foreach ($cert as $data) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data->cert_name; ?></td>
                                <td><?php echo $data->cert_no; ?></td>
                                <td><?php echo $data->cert_created_at; ?></td>
                                <td>
                                    <button style="width: 40px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-detail<?= $a++; ?>" title="Detail Certificate">
                                        <i class="fas fa-info-circle"></i>
                                    </button><br />
                                    <a href="<?php echo base_url('/file_sertifikat') . '/' . $data->cert_file_url ?>" target="_blank">
                                        <button style="width: 40px;" type="button" class="btn btn-warning" title="Download this certificate">
                                            <i class="fas fa-download"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Certificate Name</th>
                            <th>Certificate ID</th>
                            <th>Issued On</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail -->
<!-- Edit -->
<?php
$y = 1;
foreach ($cert as $data) { ?>


    <div class="modal fade" id="modal-detail<?= $y++; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Wisata</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <embed src="<?php echo base_url('/file_sertifikat') . '/' . $data->cert_file_url ?>" frameborder="0" width="100%" height="400px">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php $a++;
}
?>
<!-- End Modal Detail -->