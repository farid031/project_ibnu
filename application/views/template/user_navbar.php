<body>
    <!-- Top Bar Start -->
    <div class="top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-12">
                    <div class="logo">
                        <!-- <a href="index.html">
                                <h1>Auto<span>Wash</span></h1>
                                <img src="<?php echo base_url('assets/img/logo_en.png') ?>" alt="Logo">
                            </a> -->
                        <table width="130%">
                            <tr>
                                <td width="14%">
                                    <a href="<?php echo site_url('C_landing_page') ?>"><img src="<?php echo base_url('assets/img/logo_en.png') ?>" alt="Logo"></a>
                                </td>
                                <td>
                                    <h2 style="font-weight: 800; color: #E81C2E; font-style: italic;">Engineer <span style="color: black;">Nusantara</span></h2>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 d-none d-lg-block">
                    <div class="row">
                        <div class="col-3">
                            <div class="top-bar-item">
                                <div class="top-bar-icon">
                                    <i class="far fa-clock"></i>
                                </div>
                                <div class="top-bar-text">
                                    <h3>Opening Hour</h3>
                                    <p>Mon - Fri, 8:00 - 9:00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="top-bar-item">
                                <div class="top-bar-icon">
                                    <i class="fa fa-phone-alt"></i>
                                </div>
                                <div class="top-bar-text">
                                    <h3>Call Us</h3>
                                    <p><a href="https://api.whatsapp.com/send?phone=6287856207709&text=Halo%2C+engineer+nusantara%2C+biasakah+Anda+membantu+permasalahan+saya%3F" target="_blank">087856207709</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="top-bar-item">
                                <div class="top-bar-icon">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="top-bar-text">
                                    <h3>Email Us</h3>
                                    <p>info@engineernusantara.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar End -->

    <!-- Nav Bar Start -->
    <div class="nav-bar">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                <a href="#" class="navbar-brand">MENU</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a href="index.html" class="nav-item nav-link active">Home</a>
                        <a href="#about" class="nav-item nav-link">My Learning</a>
                        <a href="#solution" class="nav-item nav-link">My Achievements</a>
                        <a href="price.html" class="nav-item nav-link">Catalog</a>
                    </div>
                    <div class="ml-auto">
                        <div class="dropdown">
                            <button class="dropdown-toggle" id="dropdownMenuButton" style="background-color: #FAC100; border: none;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?php echo base_url('assets/img/user2-160x160.jpg') ?>" alt="User Image" height="40%" width="40%" style="border-radius: 50%;">
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <h4 class="dropdown-item"><?php echo $_SESSION['nama'] ?></h4>
                                <a class="dropdown-item" href="#">User Setting</a>
                                <a class="dropdown-item" href="<?php echo base_url('C_login/logout') ?>">Sign Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Nav Bar End -->