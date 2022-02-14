<div id="about" class="about" style="background-color: #E3EBE8;">
    <div class="container" align="center" style="background-color: #E3EBE8;">
        <div class=" col-lg-4" style="border: 3px solid #FAC100; padding: 20px; border-radius: 3%; background-color: white;">
            <h2>Enter CertificateID to Validate</h2><br />
            <div align="left">
                <form enctype="multipart/form-data" action="<?php echo base_url('C_validation/validate_cert') ?>" method="POST">
                    <input type="text" class=" form-control" name="cert_numb" placeholder="Enter Certificate ID" width="50%"><br />
                    <div align="center">
                        <input type="submit" value="Validate Certificate" name="submit" class="btn" style="color: black; background-color: #FAC100; border: 1px solid black;">
                    </div>
                </form><br />
                <div align="center">
                    Already have an account? <a href="<?php echo base_url('C_login') ?>">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>