<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>EN</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url('assets/template_admin/dist/img/user2-160x160.jpg') ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $this->session->userdata('nama') ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo base_url('assets/template_admin/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">

                                    <p>
                                        <?php echo $this->session->userdata('nama') ?> - Admin
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">

                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url('C_login/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo base_url('assets/template_admin/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $this->session->userdata('nama') ?></p>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="<?php echo base_url('C_admin_beranda') ?>">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fas fa-cogs"></i>
                            <span>Setting Landing Page</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url('C_admin_statistik') ?>"><i class="fa fa-circle-o"></i> Setting Statistik</a></li>
                            <li><a href="<?php echo base_url('C_admin_banner') ?>"><i class="fa fa-circle-o"></i> Setting Banner</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url('C_admin_setting_beranda') ?>">
                            <i class="fas fa-cogs"></i>
                            <span>Beranda User</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('C_admin_learning') ?>">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Learning</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fas fa-certificate"></i>
                            <span>Sertifikat</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url('C_admin_sertifikat') ?>"><i class="fa fa-circle-o"></i> Upload Sertifikat</a></li>
                            <li><a href="<?php echo base_url('C_admin_setting_jns_sertifikat') ?>"><i class="fa fa-circle-o"></i> Jenis Sertifikat</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url('C_admin_catalog') ?>" target="_self">
                            <i class="fas fa-book"></i>
                            <span>Katalog</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('C_admin_setting_user') ?>" target="_self">
                            <i class="fas fa-user-cog"></i>
                            <span>Peserta</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>