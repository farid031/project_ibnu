<div id="about" class="about" style="background-color: #E3EBE8;">
    <div class="container" style="background-color: #E3EBE8;">
        <div class="row">
            <div align="center" style="padding: 20px; background-color: #FAC100; width: 30%; border-radius: 5%;">
                <img src="<?php echo base_url('assets/img/avatar/' . $user[0]->user_avatar) ?>" alt="User Image" height="200px" width="200px" style="border-radius: 50%;"><br />
                <p style="font-weight: bold; font-size: 40px;"><?php echo $user[0]->user_name ?></p>
                <div class="row" align="center" style="padding-left: 20px;">
                    <div align="center" class="level"><?php echo ($user[0]->user_is_registered == '0' ? 'Pemula' : 'Pemula') ?></div>
                    <div align="center" class="badges"><?php echo ($user[0]->user_is_registered == '0' ? 0 : 100) ?></div>
                    <div align="center" class="certificate"><?php echo ($user[0]->user_is_registered == '0' ? 0 : 100) ?></div>
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $a = 1;
                        foreach ($cert as $data) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data->jns_cert_name; ?></td>
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
                            <th>Action</th>
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
foreach ($cert as $data) {
    $cert_name = str_replace('certificate', 'qrcode', $data->cert_file_url);
    $cert_name_2 = str_replace('pdf', 'png', $cert_name);
?>


    <div class="modal fade" id="modal-detail<?= $y++; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sertificate QR Code</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- <embed src="<?php echo base_url('/file_sertifikat') . '/' . $data->cert_file_url ?>" frameborder="0" width="100%" height="400px"> -->
                    <img src="<?php echo base_url('assets/img/qrcode/' . $cert_name_2) ?>" alt="QR Code" width="150px" height="150px" align="center"/><br/>
                    <small>You can use this QR Code to provide a quick reference to a web-page where information about the Certicate is displayed.<br/>For example, you could put this QR Code on your CV or business card.</small>
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