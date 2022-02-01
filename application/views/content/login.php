<div id="about" class="about" style="background-color: #E3EBE8;">
    <div class="container" align="center" style="background-color: #E3EBE8;">
        <div class=" col-lg-4" style="border: 3px solid #FAC100; padding: 20px; border-radius: 3%; background-color: white;">
            <?php if (!empty($this->session->flashdata('failed'))) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    </button>
                    <?php echo $this->session->flashdata('failed'); ?>
                </div>
            <?php } ?>
            <h2>Login</h2><br />
            <div align="left">
                <form enctype="multipart/form-data" action="<?php echo base_url('C_login/login?>') ?>" method="POST">
                    <small>Email</small><br />
                    <input type="text" class=" form-control" name="email" placeholder="Email" width="50%"><br />
                    <small>Password</small><br />
                    <input type="password" class="form-control" name="pass" placeholder="Password" width="50%"><br />
                    <div align="right">
                        <input type="submit" value="Login" name="submit" class="btn" style="color: black; background-color: #FAC100; border: 1px solid black;">
                    </div>
                </form><br />
                <div align="center">
                    Don't hane an account? Please <a href="<?php echo base_url('C_register') ?>">signup now</a>
                </div>
            </div>
        </div>
    </div>
</div>