<div id="about" class="about" style="background-color: #E3EBE8;">
    <div class="container" align="center" style="background-color: #E3EBE8;">
        <div class=" col-lg-4" style="border: 3px solid #FAC100; padding: 20px; border-radius: 3%; background-color: white;">
            <h2>Register</h2><br />
            <h9>Get your free acces to be a professional engineer</h9>
            <div align="left">
                <?php if (!empty($this->session->flashdata('failed'))) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        </button>
                        <?php echo $this->session->flashdata('failed'); ?>
                    </div>
                <?php } ?>
                <form enctype="multipart/form-data" action="<?php echo base_url('C_register/saveData') ?>" method="POST">
                    <small>Full name *</small><br />
                    <input type="text" class=" form-control" name="nama" placeholder="Enter your full name" width="50%"><br />
                    <small>Company / School*</small><br />
                    <input type="text" class="form-control" name="company" placeholder="Enter your company / school" width="50%"><br />
                    <small>Email *</small><br />
                    <input type="text" class=" form-control" name="email" placeholder="Enter your email" width="50%"><br />
                    <small>Address *</small><br />
                    <input type="text" class="form-control" name="address" placeholder="Enter your address" width="50%"><br />
                    <small>Password *</small><br />
                    <input type="password" class=" form-control" name="pass" placeholder="Enter your password" width="50%"><br />
                    <small>Retype Password *</small><br />
                    <input type="password" class="form-control" name="repass" placeholder="Retype your password" width="50%"><br />
                    <div align="right">
                        <input type="submit" value="Register" name="submit" class="btn" style="color: black; background-color: #FAC100; border: 1px solid black;">
                    </div>
                </form><br />
                <div align="center">
                    Already have an account? <a href="<?php echo base_url('C_login') ?>">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>