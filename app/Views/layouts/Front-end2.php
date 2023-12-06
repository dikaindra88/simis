<div class="wrapper">

    <!-- Preloader
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="img/RDG.png" alt="" height="60" width="60">
    </div> -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark border-bottom-0">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->

            <li class="nav-item">

                <a class="nav-link" data-widget="navbar-search" href="#" role="button">

                    <i class="fas fa-user"></i> Hai.. <?php if (session()->get('id_depart') == 1) {
                                                            echo $users[0]['nama_personnel'];
                                                        } elseif (session()->get('id_depart') == 2) {
                                                            echo $users[1]['nama_personnel'];
                                                        } else {
                                                            echo $users[2]['nama_personnel'];
                                                        }  ?>
                </a>

            </li>
            <!-- Messages Dropdown Menu -->
            <li class="nav-item">
                <a class="nav-link" href="logout2" role="button"><i class="fas fa-sign-out-alt"></i> Keluar</a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php if (session()->get('status') == 'personnel') { ?>
        <aside class="main-sidebar sidebar-light-dark elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link bg-dark">
                <img src="<?= base_url('img/ATS.png') ?>" alt="ATS Logo" class="brand-image img-circle elevation-3">
                <span class="brand-text color-danger font-weight-2" style="font-size: 10.5pt;color:#F3CB51;">PT. AVIA TEHNIK SOLUSINDO</span>

            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('dist/img/avatar5.png') ?>" class="img-rounded elevation-2 mt-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php if (session()->get('id_depart') == 1) {
                                                        echo $users[0]['nama_personnel'];
                                                    } elseif (session()->get('id_depart') == 2) {
                                                        echo $users[1]['nama_personnel'];
                                                    } else {
                                                        echo $users[2]['nama_personnel'];
                                                    }  ?><br><small><?php if (session()->get('id_depart') == 1) {
                                                                        echo $users[0]['departement'];
                                                                    } elseif (session()->get('id_depart') == 2) {
                                                                        echo $users[1]['departement'];
                                                                    } else {
                                                                        echo $users[2]['departement'];
                                                                    }  ?></small> </a>

                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="/Dashboard-personnel" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Dashboard-personnel') {
                                                                                echo "active";
                                                                            } ?>">
                                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                                <p>
                                    Request Sparepart
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
            <?php } ?>

            <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->