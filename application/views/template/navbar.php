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
                        <a href="<?php echo base_url('C_landing_page') ?>" class="nav-item nav-link active">Home</a>
                        <a href="<?php echo base_url('C_landing_page/') . '#about' ?>" class="nav-item nav-link">About</a>
                        <a href="#solution" class="nav-item nav-link">Solution</a>
                        <!-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Training</a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item" data-toggle="dropdown">Ansys</a>
                                <a href="#" class="dropdown-item" data-toggle="dropdown">Sketchup</a>
                                <a href="#" class="dropdown-item" data-toggle="dropdown">Inventor</a>
                                <a href="#" class="dropdown-item" data-toggle="dropdown">Solidworks</a>
                                <a href="#" class="dropdown-item" data-toggle="dropdown">Autocad</a>
                                <a href="#" class="dropdown-item" data-toggle="dropdown">Mastercam</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Project</a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item" data-toggle="dropdown">CAD Modeling</a>
                                <a href="#" class="dropdown-item" data-toggle="dropdown">Analysis</a>
                                <a href="#" class="dropdown-item" data-toggle="dropdown">Rendering</a>
                                <a href="#" class="dropdown-item" data-toggle="dropdown">Architecture</a>
                                <a href="#" class="dropdown-item" data-toggle="dropdown">Marketing Tools</a>
                            </div>
                        </div> -->
                        <a href="price.html" class="nav-item nav-link">Article</a>
                        <a href="<?php echo base_url('C_validation') ?>" class="nav-item nav-link">EN Certification</a>
                    </div>
                    <div class="ml-auto">
                        <a class="btn btn-custom" href="<?php echo base_url('C_login') ?>">Register/Login</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Nav Bar End -->