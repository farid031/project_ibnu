<div id="about" class="about" style="background-color: #E3EBE8;">
    <div class="container" align="center" style="background-color: #E3EBE8;">
        <div style="border: 4px solid #FAC100; padding: 20px; border-radius: 2%; background-color: white;">
            <form enctype="multipart/form-data" method="POST" action="<?php echo base_url('C_user_setting/update_profile/'. $this->session->userdata('id')) ?>">
                <img src="<?php echo base_url('assets/img/user2-160x160.jpg') ?>" alt="User Image" height="200px" width="200px" style="border-radius: 50%; border: 1px solid #000000;">
                <br /><br />
                <h1 style="font-size: 50px;"><b><?php echo $this->session->userdata('nama') ?></b></h1><br />
                <h3 style="font-size: 30px;"><?php echo $this->session->userdata('email') ?></h3><br /><br />
                <small>Company / School*</small><br />
                <input type="text" class="form-control" name="company" placeholder="Enter your company / school" width="50%" value="<?php echo (!empty($user[0]->user_company) ? $user[0]->user_company : null); ?>"><br />
                <small>Address *</small><br />
                <input type="text" class="form-control" name="address" placeholder="Enter your address" width="50%" value="<?php echo (!empty($user[0]->user_address) ? $user[0]->user_address : null); ?>"><br />
                <small>Password</small><br />
                <input type="password" class=" form-control" name="pass" placeholder="Enter your password to change your password" width="50%"><br />
                <small>Retype Password</small><br />
                <input type="password" class="form-control" name="repass" placeholder="Retype your password" width="50%">
                <br /><br />
                <div style="border: 4px solid #FAC100; padding: 20px; border-radius: 2%; background-color: #E3EBE8;">
                    <div align="left">
                        <h2>Social Media</h2>
                    </div>
                    <i class="fab fa-linkedin-in"></i> <input type="text" class=" form-control" name="linkedin" placeholder="LinkedIn" width="10%" value="<?php echo (!empty($user[0]->user_linkedin) ? $user[0]->user_linkedin : null); ?>"><br />
                    <i class="fab fa-facebook-f"></i>
                    <input type="text" class="form-control" name="facebook" placeholder="Facebook" width="10%" value="<?php echo (!empty($user[0]->user_facebook) ? $user[0]->user_facebook : null); ?>"><br />
                    <i class="fab fa-instagram"></i>
                    <input type="text" class=" form-control" name="instagram" placeholder="Instagram" width="10%" value="<?php echo (!empty($user[0]->user_instagram) ? $user[0]->user_instagram : null); ?>"><br />
                    <i class="fab fa-twitter"></i>
                    <input type="text" class="form-control" name="twitter" placeholder="Twitter" width="10%" value="<?php echo (!empty($user[0]->user_twitter) ? $user[0]->user_twitter : null); ?>"><br />
                    <i class="fab fa-youtube"></i>
                    <input type="text" class=" form-control" name="youtube" placeholder="Youtube" width="10%" value="<?php echo (!empty($user[0]->user_youtube) ? $user[0]->user_youtube : null); ?>"><br />
                </div><br />
                <div align="right">
                    <input type="submit" value="Update" name="submit" onclick="return confirm('Are You sure to update this data?')" class="btn" style="color: black; background-color: #FAC100; border: 1px solid black;">
                </div>
            </form>
        </div>
    </div>
</div>