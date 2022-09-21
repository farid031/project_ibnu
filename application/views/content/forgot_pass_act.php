<div id="about" class="about" style="background-color: #E3EBE8;">
    <div class="container" align="center" style="background-color: #E3EBE8;">
        <div class=" col-lg-4" style="border: 3px solid #FAC100; padding: 20px; border-radius: 3%; background-color: white;">
            <?php if (!empty($this->session->flashdata('failed'))) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    </button>
                    <?php echo $this->session->flashdata('failed'); ?>
                </div>
            <?php } else if (!empty($this->session->flashdata('success'))) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    </button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php } ?>
            <h2>Forgot Password</h2><br />
            <div align="left">
                <form enctype="multipart/form-data" action="<?php echo base_url('C_forgot_pass/change_pass/' . $id_user) ?>" method="POST">
                    <small>Password</small><br />
                    <input type="password" class="form-control" name="pass" placeholder="Password" width="50%"><br />
                    <small>Retype Password</small><br />
                    <input type="password" class="form-control" name="repass" placeholder="Retype Password" width="50%"><br />
                    <div align="right">
                        <input type="submit" value="Change Password" name="submit" class="btn" style="color: black; background-color: #FAC100; border: 1px solid black;">
                    </div>
                </form><br />
                <div align="center">
                    <br />
                    Don't have an account? Please <a href="<?php echo base_url('C_register') ?>">signup now</a>
                </div>
            </div>
        </div>
    </div>
</div>