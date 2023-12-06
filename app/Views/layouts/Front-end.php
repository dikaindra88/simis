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

                    <i class="fas fa-user"></i> Hai.. <?php if (session()->get('status') == 'admin') {
                                                            echo $user[0]['name'];
                                                        } else {
                                                            echo $user[1]['name'];
                                                        } ?>
                </a>

            </li>

            <!-- Messages Dropdown Menu -->

            <li class="nav-item">
                <a class="nav-link" href="logout" role="button"><i class="fas fa-sign-out-alt"></i> Keluar</a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php if (session()->get('status') == 'staff') { ?>
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
                        <img src="<?php if (session()->get('status') == 'admin') {
                                        echo base_url('img/' . $user[0]['foto']);
                                    } elseif (session()->get('status') == 'staff') {
                                        echo base_url('img/' . $user[1]['foto']);
                                    }
                                    ?>" class="img-rounded elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php if (session()->get('status') == 'admin') {
                                                        echo $user[0]['name'];
                                                    } else {
                                                        echo $user[1]['name'];
                                                    }  ?> </a>

                    </div>
                </div>



                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="/Dashboard" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Dashboard') {
                                                                        echo "active";
                                                                    } ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">MENGELOLA REQUEST</li>
                        <li class="nav-item">
                            <a href="/Request-sparepart" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Request-sparepart') {
                                                                                echo "active";
                                                                            } ?>">
                                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                                <p>
                                    Data Request Sparepart
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">MENGELOLA SPAREPART</li>
                        <li class="nav-item <?php if (current_url(true)->getSegment('2') == 'Data-in') {
                                                echo "menu-open";
                                            } ?><?php if (current_url(true)->getSegment('2') == 'Data-out') {
                                                    echo "menu-open";
                                                } ?>">
                            <a href="#" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Data-in') {
                                                            echo "active";
                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Data-out') {
                                                                echo "active";
                                                            } ?>">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>
                                    Mengelola Data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/Data-in" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Data-in') {
                                                                            echo "active";
                                                                        } ?>">
                                        <i class="far fa-arrow-alt-circle-down nav-icon"></i>
                                        <p>Sparepart Masuk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Data-out" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Data-out') {
                                                                            echo "active";
                                                                        } ?>">
                                        <i class="far fa-arrow-alt-circle-up nav-icon"></i>
                                        <p>Sparepart Keluar</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                <a href="./index2.html" class="nav-link">
                                    <i class="fa fa-envelope nav-icon"></i>
                                    <p>Izin</p>
                                </a>
                            </li> -->
                            </ul>
                        </li>

                        <li class="nav-header">LAPORAN</li>
                        <li class="nav-item <?php if (current_url(true)->getSegment('2') == 'Report-incoming') {
                                                echo "menu-open";
                                            } ?><?php if (current_url(true)->getSegment('2') == 'Report-search') {
                                                    echo "menu-open";
                                                } ?><?php if (current_url(true)->getSegment('2') == 'Report-Search') {
                                                        echo "menu-open";
                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Report-outgoing') {
                                                            echo "menu-open";
                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Report-Searchs') {
                                                                echo "menu-open";
                                                            } ?><?php if (current_url(true)->getSegment('2') == 'Report-stock') {
                                                                    echo "menu-open";
                                                                } ?>">
                            <a href="#" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Report-incoming') {
                                                            echo "active";
                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Report-search') {
                                                                echo "active";
                                                            } ?><?php if (current_url(true)->getSegment('2') == 'Report-Search') {
                                                                    echo "active";
                                                                } ?><?php if (current_url(true)->getSegment('2') == 'Report-outgoing') {
                                                                        echo "active";
                                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Report-Searchs') {
                                                                            echo "active";
                                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Report-stock') {
                                                                                echo "active";
                                                                            } ?>">
                                <i class="nav-icon fas fa-folder-open"></i>
                                <p>
                                    Laporan Data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/Report-incoming" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Report-incoming') {
                                                                                    echo "active";
                                                                                } ?><?php if (current_url(true)->getSegment('2') == 'Report-search') {
                                                                                        echo "active";
                                                                                    } ?>">
                                        <i class="far fa-arrow-alt-circle-down nav-icon"></i>
                                        <p>Sparepart Masuk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Report-outgoing" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Report-outgoing') {
                                                                                    echo "active";
                                                                                } ?><?php if (current_url(true)->getSegment('2') == 'Report-Search') {
                                                                                        echo "active";
                                                                                    } ?>">
                                        <i class="far fa-arrow-alt-circle-up nav-icon"></i>
                                        <p>Sparepart Keluar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Report-stock" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Report-stock') {
                                                                                echo "active";
                                                                            } ?><?php if (current_url(true)->getSegment('2') == 'Report-Searchs') {
                                                                                    echo "active";
                                                                                } ?>">
                                        <i class="fas fa-cubes nav-icon"></i>
                                        <p>Inventory Sparepart</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </nav>
            <?php } ?>

            <?php if (session()->get('status') == 'admin') { ?>
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
                                <img src="<?php if (session()->get('status') == 'admin') {
                                                echo base_url('img/' . $user[0]['foto']);
                                            } elseif (session()->get('status') == 'staff') {
                                                echo base_url('img/' . $user[1]['foto']);
                                            }
                                            ?>" class="img-rounded elevation-2" alt="User Image">
                            </div>
                            <div class="info">
                                <a href="#" class="d-block"><?php if (session()->get('status') == 'admin') {
                                                                echo $user[0]['name'];
                                                            } else {
                                                                echo $user[1]['name'];
                                                            }  ?> </a>
                            </div>
                        </div>



                        <!-- Sidebar Menu -->
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                                <li class="nav-item">
                                    <a href="/Dashboard" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Dashboard') {
                                                                                echo "active";
                                                                            } ?>">
                                        <i class="nav-icon fas fa-home"></i>
                                        <p>
                                            Dashboard
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item <?php if (current_url(true)->getSegment('2') == 'Sparepart') {
                                                        echo "menu-open";
                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Rack') {
                                                            echo "menu-open";
                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Satuan') {
                                                                echo "menu-open";
                                                            } ?>
                                            <?php if (current_url(true)->getSegment('2') == 'Kondisi') {
                                                echo "menu-open";
                                            } ?><?php if (current_url(true)->getSegment('2') == 'Personnel') {
                                                    echo "menu-open";
                                                } ?>">
                                    <a href="#" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Sparepart') {
                                                                    echo "active";
                                                                } ?><?php if (current_url(true)->getSegment('2') == 'Rack') {
                                                                        echo "active";
                                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Satuan') {
                                                                            echo "active";
                                                                        } ?>
                                            <?php if (current_url(true)->getSegment('2') == 'Kondisi') {
                                                echo "active";
                                            } ?><?php if (current_url(true)->getSegment('2') == 'Personnel') {
                                                    echo "active";
                                                } ?>">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>
                                            Mengelola List
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/Sparepart" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Sparepart') {
                                                                                        echo "active";
                                                                                    } ?>">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>
                                                    List Sparepart
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/Rack" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Rack') {
                                                                                echo "active";
                                                                            } ?>">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>
                                                    List Rak
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/Satuan" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Satuan') {
                                                                                    echo "active";
                                                                                } ?>">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>
                                                    List Satuan
                                                </p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/Kondisi" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Kondisi') {
                                                                                    echo "active";
                                                                                } ?>">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>
                                                    List Kondisi
                                                </p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/Personnel" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Personnel') {
                                                                                        echo "active";
                                                                                    } ?>">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>
                                                    List Personnel
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="/Users" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Users') {
                                                                            echo "active";
                                                                        } ?>">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>
                                            User
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