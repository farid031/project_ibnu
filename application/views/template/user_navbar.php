<body>
    <!-- Nav Bar Start -->
    <div class="nav-bar">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                <a href="#" class="navbar-brand">MENU</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <a href="<?php echo site_url('C_landing_page') ?>"><img src="<?php echo base_url('assets/img/logo_en.png') ?>" alt="Logo" width="70px" height="70px" style="border: 1px solid black; border-radius: 50%;"></a>&nbsp;&nbsp;&nbsp;
                    <h2><b>ENGINEER</b> <span style="color: black;">NUSANTARA</span></h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="navbar-nav mr-auto">
                        <a href="<?php echo base_url('C_user_beranda') ?>" class="nav-item nav-link active">Home</a>
                        <a href="<?php echo base_url('C_user_my_learning') ?>" class="nav-item nav-link" class="nav-item nav-link">My Learning</a>
                        <a href="<?php echo base_url('C_user_my_achievements') ?>" class="nav-item nav-link">My Achievements</a>
                        <a href="<?php echo base_url('C_catalog') ?>" class="nav-item nav-link">Catalog</a>
                    </div>&nbsp;&nbsp;&nbsp;
                    <div class="ml-auto">
                        <div class="dropdown">
                            <button class="dropdown-toggle" id="dropdownMenuButton" style="background-color: #FAC100; border: none;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?php echo base_url('assets/img/avatar/' . $user[0]->user_avatar) ?>" alt="User Image" height="70px" width="70px" style="border-radius: 50%;">
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <h4 class="dropdown-item"><?php echo $_SESSION['nama'] ?></h4>
                                <a class="dropdown-item" href="<?php echo base_url('C_user_setting') ?>">User Setting</a>
                                <a class="dropdown-item" href="<?php echo base_url('C_login/logout') ?>">Sign Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Nav Bar End -->