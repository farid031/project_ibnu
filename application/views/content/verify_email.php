<div class="about" style="background-color: #E3EBE8;">
    <div class="container" align="center" style="background-color: #E3EBE8;">
        <div class=" col-lg-8">
            <h2>Certificate Validation</h2><br />
            <div align="center">
                <i style="color: green;" class="fas fa-check-circle fa-5x"></i><br /><br />
                <h2><b><?php echo $cert[0]->user_name; ?></b></h2>
                <h2><b><?php echo $cert[0]->jns_cert_name; ?></b></h2>
                <h3><?php echo $cert[0]->cert_no; ?></h3>
                <h3><?php echo 'Certificate Issued on ' . date('d M Y', strtotime($cert[0]->cert_created_at)) ?></h3>
                <h3><?php echo 'Validated on ' . date('d M Y') ?></h3>
            </div>
        </div>
    </div>
</div>