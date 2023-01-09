<div class="wrapper">

    <!-- Preloader
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="img/RDG.png" alt="" height="60" width="60">
    </div> -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-light border-bottom-0">
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

            </li>
            <li class="nav-item">

                <a class="nav-link" data-widget="navbar-search" href="#" role="button">

                    <i class="fas fa-user"></i> Hai.. <?php if (session()->get('status') == 'admin') {
                                                            echo $user[0]['name'];
                                                        } else {
                                                            echo $user[1]['name'];
                                                        }  ?>
                </a>

            </li>

            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="" data-toggle="dropdown" href="#">
                    <img src="<?= base_url('dist/img/avatar5.png') ?>" alt="Admin" class="img-rounded" width="40" height="40" style="border: 2px solid #FFF;background:#FFF;">
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="<?= base_url('dist/img/avatar5.png') ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    <?php if (session()->get('status') == 'admin') {
                                        echo $user[0]['name'];
                                    } else {
                                        echo $user[1]['name'];
                                    }  ?>

                                </h3>
                                <?php if (session()->get('name') == True) { ?>
                                    <p class="text-sm text-success"><i class="fas fa-circle mr-1"></i> Active</p>
                                <?php } else { ?>
                                    <p class="text-sm text-danger"><i class="fas fa-circle mr-1"></i> Deactive</p>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>

                    <a href="logout" class="dropdown-item dropdown-footer bg-danger">Logout</a>
                </div>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php if (session()->get('status') == 'admin') { ?>
        <aside class="main-sidebar sidebar-light-navy elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link bg-light">
                <img src="<?= base_url('img/RDG.png') ?>" alt="RDG Logo" class="brand-image elevation-2">

            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('dist/img/avatar5.png') ?>" class="img-rounded elevation-2" style="border: 2px solid #0d6efd;background:#FFF;" alt="User Image">
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
                        <li class="nav-header">INVENTORY SPAREPART</li>
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
                                    Manage Sparepart
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/Data-in" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Data-in') {
                                                                            echo "active";
                                                                        } ?>">
                                        <i class="far fa-arrow-alt-circle-down nav-icon"></i>
                                        <p>Sparepart Incoming</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Data-out" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Data-out') {
                                                                            echo "active";
                                                                        } ?>">
                                        <i class="far fa-arrow-alt-circle-up nav-icon"></i>
                                        <p>Sparepart Outgoing</p>
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
                        <li class="nav-item <?php if (current_url(true)->getSegment('2') == 'Serviceable') {
                                                echo "menu-open";
                                            } ?><?php if (current_url(true)->getSegment('2') == 'Serviceable-search') {
                                                    echo "menu-open";
                                                } ?><?php if (current_url(true)->getSegment('2') == 'Unserviceable') {
                                                        echo "menu-open";
                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Unserviceable-search') {
                                                            echo "menu-open";
                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Flameable') {
                                                                echo "menu-open";
                                                            } ?><?php if (current_url(true)->getSegment('2') == 'Flameable-search') {
                                                                    echo "menu-open";
                                                                } ?><?php if (current_url(true)->getSegment('2') == 'New') {
                                                                        echo "menu-open";
                                                                    } ?><?php if (current_url(true)->getSegment('2') == 'New-search') {
                                                                            echo "menu-open";
                                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Inspected') {
                                                                                echo "menu-open";
                                                                            } ?><?php if (current_url(true)->getSegment('2') == 'Inspected-search') {
                                                                                    echo "menu-open";
                                                                                } ?><?php if (current_url(true)->getSegment('2') == 'Repair') {
                                                                                        echo "menu-open";
                                                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Repair-search') {
                                                                                            echo "menu-open";
                                                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Overhauled') {
                                                                                                echo "menu-open";
                                                                                            } ?><?php if (current_url(true)->getSegment('2') == 'Overhauled-search') {
                                                                                                    echo "menu-open";
                                                                                                } ?><?php if (current_url(true)->getSegment('2') == 'N_W') {
                                                                                                        echo "menu-open";
                                                                                                    } ?><?php if (current_url(true)->getSegment('2') == 'N_W-search') {
                                                                                                            echo "menu-open";
                                                                                                        } ?>">
                            <a href="#" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Serviceable') {
                                                            echo "active";
                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Serviceable-search') {
                                                                echo "active";
                                                            } ?><?php if (current_url(true)->getSegment('2') == 'Unserviceable') {
                                                                    echo "active";
                                                                } ?><?php if (current_url(true)->getSegment('2') == 'Unserviceable-search') {
                                                                        echo "active";
                                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Flameable') {
                                                                            echo "active";
                                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Flameable-search') {
                                                                                echo "active";
                                                                            } ?><?php if (current_url(true)->getSegment('2') == 'New') {
                                                                                    echo "active";
                                                                                } ?><?php if (current_url(true)->getSegment('2') == 'New-search') {
                                                                                        echo "active";
                                                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Inspected') {
                                                                                            echo "active";
                                                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Inspected-search') {
                                                                                                echo "active";
                                                                                            } ?><?php if (current_url(true)->getSegment('2') == 'Repair') {
                                                                                                    echo "active";
                                                                                                } ?><?php if (current_url(true)->getSegment('2') == 'Repair-search') {
                                                                                                        echo "active";
                                                                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Overhauled') {
                                                                                                            echo "active";
                                                                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Overhauled-search') {
                                                                                                                echo "active";
                                                                                                            } ?><?php if (current_url(true)->getSegment('2') == 'N_W') {
                                                                                                                    echo "active";
                                                                                                                } ?><?php if (current_url(true)->getSegment('2') == 'N_W-search') {
                                                                                                                        echo "active";
                                                                                                                    } ?>">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    Sparepart Condition
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/Serviceable" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Serviceable') {
                                                                                echo "active";
                                                                            } ?><?php if (current_url(true)->getSegment('2') == 'Serviceable-search') {
                                                                                    echo "active";
                                                                                } ?>">
                                        <i class="fas fa-wrench nav-icon"></i>
                                        <p>Serviceable</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Unserviceable" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Unserviceable') {
                                                                                    echo "active";
                                                                                } ?><?php if (current_url(true)->getSegment('2') == 'Unserviceable-search') {
                                                                                        echo "active";
                                                                                    } ?>">
                                        <i class="fas fa-ban nav-icon"></i>
                                        <p>Unserviceable</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Flameable" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Flameable') {
                                                                                echo "active";
                                                                            } ?><?php if (current_url(true)->getSegment('2') == 'Flameable-search') {
                                                                                    echo "active";
                                                                                } ?>">
                                        <i class="fas fa-fire nav-icon"></i>
                                        <p>Flameable</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/New" class="nav-link <?php if (current_url(true)->getSegment('2') == 'New') {
                                                                        echo "active";
                                                                    } ?><?php if (current_url(true)->getSegment('2') == 'New-search') {
                                                                            echo "active";
                                                                        } ?>">
                                        <i class="fab fa-neos nav-icon"></i>
                                        <p>New</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Inspected" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Inspected') {
                                                                                echo "active";
                                                                            } ?><?php if (current_url(true)->getSegment('2') == 'Inspected-search') {
                                                                                    echo "active";
                                                                                } ?>">
                                        <i class="fas fa-spell-check nav-icon"></i>
                                        <p>Inspected/Tested</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Repair" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Repair') {
                                                                            echo "active";
                                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Repair-search') {
                                                                                echo "active";
                                                                            } ?>">
                                        <i class="fas fa-cogs nav-icon"></i>
                                        <p>Repair</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Overhauled" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Overhauled') {
                                                                                echo "active";
                                                                            } ?><?php if (current_url(true)->getSegment('2') == 'Overhauled-search') {
                                                                                    echo "active";
                                                                                } ?>">
                                        <i class="fas fa-chart-pie nav-icon"></i>
                                        <p>Overhaul</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/N_W" class="nav-link <?php if (current_url(true)->getSegment('2') == 'N_W') {
                                                                        echo "active";
                                                                    } ?><?php if (current_url(true)->getSegment('2') == 'N_W-search') {
                                                                            echo "active";
                                                                        } ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>N/W</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?php if (current_url(true)->getSegment('2') == 'Sparepart') {
                                                echo "menu-open";
                                            } ?><?php if (current_url(true)->getSegment('2') == 'Location') {
                                                    echo "menu-open";
                                                } ?><?php if (current_url(true)->getSegment('2') == 'Oum') {
                                                        echo "menu-open";
                                                    } ?>
                                            <?php if (current_url(true)->getSegment('2') == 'Orders') {
                                                echo "menu-open";
                                            } ?><?php if (current_url(true)->getSegment('2') == 'Conditions') {
                                                    echo "menu-open";
                                                } ?><?php if (current_url(true)->getSegment('2') == 'Acregist') {
                                                        echo "menu-open";
                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Givento') {
                                                            echo "menu-open";
                                                        } ?>">
                            <a href="#" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Sparepart') {
                                                            echo "active";
                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Location') {
                                                                echo "active";
                                                            } ?><?php if (current_url(true)->getSegment('2') == 'Oum') {
                                                                    echo "active";
                                                                } ?>
                                            <?php if (current_url(true)->getSegment('2') == 'Orders') {
                                                echo "active";
                                            } ?><?php if (current_url(true)->getSegment('2') == 'Conditions') {
                                                    echo "active";
                                                } ?><?php if (current_url(true)->getSegment('2') == 'Acregist') {
                                                        echo "active";
                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Givento') {
                                                            echo "active";
                                                        } ?>">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Manage List
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
                                    <a href="/Location" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Location') {
                                                                            echo "active";
                                                                        } ?>">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>
                                            List Location
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Oum" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Oum') {
                                                                        echo "active";
                                                                    } ?>">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>
                                            List Oum
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Orders" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Orders') {
                                                                            echo "active";
                                                                        } ?>">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>
                                            List PO / RO
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Conditions" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Conditions') {
                                                                                echo "active";
                                                                            } ?>">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>
                                            List Condition
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Acregist" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Acregist') {
                                                                            echo "active";
                                                                        } ?>">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>
                                            List A/C Registration
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Givento" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Givento') {
                                                                            echo "active";
                                                                        } ?>">
                                        <i class="nav-icon far fa-circle"></i>
                                        <p>
                                            List Given To
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item <?php if (current_url(true)->getSegment('2') == 'Report-incoming') {
                                                echo "menu-open";
                                            } ?><?php if (current_url(true)->getSegment('2') == 'Report-search') {
                                                    echo "menu-open";
                                                } ?><?php if (current_url(true)->getSegment('2') == 'Report-Search') {
                                                        echo "menu-open";
                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Report-outgoing') {
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
                                                                    } ?>">
                                <i class="nav-icon fas fa-folder-open"></i>
                                <p>
                                    Report Data
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
                                        <p>Sparepart Incoming</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Report-outgoing" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Report-outgoing') {
                                                                                    echo "active";
                                                                                } ?><?php if (current_url(true)->getSegment('2') == 'Report-Search') {
                                                                                        echo "active";
                                                                                    } ?>">
                                        <i class="far fa-arrow-alt-circle-up nav-icon"></i>
                                        <p>Sparepart Outgoing</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-header">COMPANY DOCUMENT</li>
                        <li class="nav-item">
                            <a href="/Manual" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Manual') {
                                                                    echo "active";
                                                                } ?>">
                                <i class="nav-icon fas fa-swatchbook"></i>
                                <p>
                                    Manage Manual
                                </p>
                            </a>
                        </li>
                        <li class="nav-item <?php if (current_url(true)->getSegment('2') == 'PK-YGR') {
                                                echo "menu-open";
                                            } ?><?php if (current_url(true)->getSegment('2') == 'PK-YGK') {
                                                    echo "menu-open";
                                                } ?><?php if (current_url(true)->getSegment('2') == 'PK-RDA') {
                                                        echo "menu-open";
                                                    } ?><?php if (current_url(true)->getSegment('2') == 'PK-RDG') {
                                                            echo "menu-open";
                                                        } ?>">
                            <a href="#" class="nav-link <?php if (current_url(true)->getSegment('2') == 'PK-YGR') {
                                                            echo "active";
                                                        } ?><?php if (current_url(true)->getSegment('2') == 'PK-YGK') {
                                                                echo "active";
                                                            } ?><?php if (current_url(true)->getSegment('2') == 'PK-RDA') {
                                                                    echo "active";
                                                                } ?><?php if (current_url(true)->getSegment('2') == 'PK-RDG') {
                                                                        echo "active";
                                                                    } ?>">
                                <i class="nav-icon fas fa-plane"></i>
                                <p>
                                    List Doc Onboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/PK-YGR" class="nav-link <?php if (current_url(true)->getSegment('2') == 'PK-YGR') {
                                                                            echo "active";
                                                                        } ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>PK-YGR</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/PK-YGK" class="nav-link <?php if (current_url(true)->getSegment('2') == 'PK-YGK') {
                                                                            echo "active";
                                                                        } ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>PK-YGK</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/PK-RDA" class="nav-link <?php if (current_url(true)->getSegment('2') == 'PK-RDA') {
                                                                            echo "active";
                                                                        } ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>PK-RDA</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/PK-RDG" class="nav-link <?php if (current_url(true)->getSegment('2') == 'PK-RDG') {
                                                                            echo "active";
                                                                        } ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>PK-RDG</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/Personnel" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Personnel') {
                                                                        echo "active";
                                                                    } ?>">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    Data Personnel
                                </p>
                            </a>
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
            <?php if (session()->get('status') == 'staff') { ?>
                <aside class="main-sidebar sidebar-light-navy elevation-4">
                    <!-- Brand Logo -->
                    <a href="index3.html" class="brand-link bg-light">
                        <img src="<?= base_url('img/RDG.png') ?>" alt="RDG Logo" class="brand-image elevation-2">

                    </a>

                    <!-- Sidebar -->
                    <div class="sidebar">
                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                <img src="<?= base_url('dist/img/avatar5.png') ?>" class="img-rounded elevation-2" style="border: 2px solid #0d6efd;background:#FFF;" alt="User Image">
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
                                            Manage Sparepart
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/Data-in" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Data-in') {
                                                                                    echo "active";
                                                                                } ?>">
                                                <i class="far fa-arrow-alt-circle-down nav-icon"></i>
                                                <p>Sparepart Incoming</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/Data-out" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Data-out') {
                                                                                    echo "active";
                                                                                } ?>">
                                                <i class="far fa-arrow-alt-circle-up nav-icon"></i>
                                                <p>Sparepart Outgoing</p>
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
                                <li class="nav-item <?php if (current_url(true)->getSegment('2') == 'Serviceable') {
                                                        echo "menu-open";
                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Serviceable-search') {
                                                            echo "menu-open";
                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Unserviceable') {
                                                                echo "menu-open";
                                                            } ?><?php if (current_url(true)->getSegment('2') == 'Unserviceable-search') {
                                                                    echo "menu-open";
                                                                } ?><?php if (current_url(true)->getSegment('2') == 'Flameable') {
                                                                        echo "menu-open";
                                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Flameable-search') {
                                                                            echo "menu-open";
                                                                        } ?><?php if (current_url(true)->getSegment('2') == 'New') {
                                                                                echo "menu-open";
                                                                            } ?><?php if (current_url(true)->getSegment('2') == 'New-search') {
                                                                                    echo "menu-open";
                                                                                } ?><?php if (current_url(true)->getSegment('2') == 'Inspected') {
                                                                                        echo "menu-open";
                                                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Inspected-search') {
                                                                                            echo "menu-open";
                                                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Repair') {
                                                                                                echo "menu-open";
                                                                                            } ?><?php if (current_url(true)->getSegment('2') == 'Repair-search') {
                                                                                                    echo "menu-open";
                                                                                                } ?><?php if (current_url(true)->getSegment('2') == 'Overhauled') {
                                                                                                        echo "menu-open";
                                                                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Overhauled-search') {
                                                                                                            echo "menu-open";
                                                                                                        } ?><?php if (current_url(true)->getSegment('2') == 'N_W') {
                                                                                                                echo "menu-open";
                                                                                                            } ?><?php if (current_url(true)->getSegment('2') == 'N_W-search') {
                                                                                                                    echo "menu-open";
                                                                                                                } ?>">
                                    <a href="#" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Serviceable') {
                                                                    echo "active";
                                                                } ?><?php if (current_url(true)->getSegment('2') == 'Serviceable-search') {
                                                                        echo "active";
                                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Unserviceable') {
                                                                            echo "active";
                                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Unserviceable-search') {
                                                                                echo "active";
                                                                            } ?><?php if (current_url(true)->getSegment('2') == 'Flameable') {
                                                                                    echo "active";
                                                                                } ?><?php if (current_url(true)->getSegment('2') == 'Flameable-search') {
                                                                                        echo "active";
                                                                                    } ?><?php if (current_url(true)->getSegment('2') == 'New') {
                                                                                            echo "active";
                                                                                        } ?><?php if (current_url(true)->getSegment('2') == 'New-search') {
                                                                                                echo "active";
                                                                                            } ?><?php if (current_url(true)->getSegment('2') == 'Inspected') {
                                                                                                    echo "active";
                                                                                                } ?><?php if (current_url(true)->getSegment('2') == 'Inspected-search') {
                                                                                                        echo "active";
                                                                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Repair') {
                                                                                                            echo "active";
                                                                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Repair-search') {
                                                                                                                echo "active";
                                                                                                            } ?><?php if (current_url(true)->getSegment('2') == 'Overhauled') {
                                                                                                                    echo "active";
                                                                                                                } ?><?php if (current_url(true)->getSegment('2') == 'Overhauled-search') {
                                                                                                                        echo "active";
                                                                                                                    } ?><?php if (current_url(true)->getSegment('2') == 'N_W') {
                                                                                                                            echo "active";
                                                                                                                        } ?><?php if (current_url(true)->getSegment('2') == 'N_W-search') {
                                                                                                                                echo "active";
                                                                                                                            } ?>">
                                        <i class="nav-icon fas fa-clipboard-list"></i>
                                        <p>
                                            Sparepart Condition
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/Serviceable" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Serviceable') {
                                                                                        echo "active";
                                                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Serviceable-search') {
                                                                                            echo "active";
                                                                                        } ?>">
                                                <i class="fas fa-wrench nav-icon"></i>
                                                <p>Serviceable</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/Unserviceable" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Unserviceable') {
                                                                                            echo "active";
                                                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Unserviceable-search') {
                                                                                                echo "active";
                                                                                            } ?>">
                                                <i class="fas fa-ban nav-icon"></i>
                                                <p>Unserviceable</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/Flameable" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Flameable') {
                                                                                        echo "active";
                                                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Flameable-search') {
                                                                                            echo "active";
                                                                                        } ?>">
                                                <i class="fas fa-fire nav-icon"></i>
                                                <p>Flameable</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/New" class="nav-link <?php if (current_url(true)->getSegment('2') == 'New') {
                                                                                echo "active";
                                                                            } ?><?php if (current_url(true)->getSegment('2') == 'New-search') {
                                                                                    echo "active";
                                                                                } ?>">
                                                <i class="fab fa-neos nav-icon"></i>
                                                <p>New</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/Inspected" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Inspected') {
                                                                                        echo "active";
                                                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Inspected-search') {
                                                                                            echo "active";
                                                                                        } ?>">
                                                <i class="fas fa-spell-check nav-icon"></i>
                                                <p>Inspected/Tested</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/Repair" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Repair') {
                                                                                    echo "active";
                                                                                } ?><?php if (current_url(true)->getSegment('2') == 'Repair-search') {
                                                                                        echo "active";
                                                                                    } ?>">
                                                <i class="fas fa-cogs nav-icon"></i>
                                                <p>Repair</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/Overhauled" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Overhauled') {
                                                                                        echo "active";
                                                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Overhauled-search') {
                                                                                            echo "active";
                                                                                        } ?>">
                                                <i class="fas fa-chart-pie nav-icon"></i>
                                                <p>Overhaul</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/N_W" class="nav-link <?php if (current_url(true)->getSegment('2') == 'N_W') {
                                                                                echo "active";
                                                                            } ?><?php if (current_url(true)->getSegment('2') == 'N_W-search') {
                                                                                    echo "active";
                                                                                } ?>">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>N/W</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item <?php if (current_url(true)->getSegment('2') == 'Sparepart') {
                                                        echo "menu-open";
                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Location') {
                                                            echo "menu-open";
                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Oum') {
                                                                echo "menu-open";
                                                            } ?>
                                            <?php if (current_url(true)->getSegment('2') == 'Orders') {
                                                echo "menu-open";
                                            } ?><?php if (current_url(true)->getSegment('2') == 'Conditions') {
                                                    echo "menu-open";
                                                } ?><?php if (current_url(true)->getSegment('2') == 'Acregist') {
                                                        echo "menu-open";
                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Givento') {
                                                            echo "menu-open";
                                                        } ?>">
                                    <a href="#" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Sparepart') {
                                                                    echo "active";
                                                                } ?><?php if (current_url(true)->getSegment('2') == 'Location') {
                                                                        echo "active";
                                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Oum') {
                                                                            echo "active";
                                                                        } ?>
                                            <?php if (current_url(true)->getSegment('2') == 'Orders') {
                                                echo "active";
                                            } ?><?php if (current_url(true)->getSegment('2') == 'Conditions') {
                                                    echo "active";
                                                } ?><?php if (current_url(true)->getSegment('2') == 'Acregist') {
                                                        echo "active";
                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Givento') {
                                                            echo "active";
                                                        } ?>">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>
                                            Manage List
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
                                            <a href="/Location" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Location') {
                                                                                    echo "active";
                                                                                } ?>">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>
                                                    List Location
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/Oum" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Oum') {
                                                                                echo "active";
                                                                            } ?>">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>
                                                    List Oum
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/Orders" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Orders') {
                                                                                    echo "active";
                                                                                } ?>">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>
                                                    List PO / RO
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/Conditions" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Conditions') {
                                                                                        echo "active";
                                                                                    } ?>">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>
                                                    List Condition
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/Acregist" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Acregist') {
                                                                                    echo "active";
                                                                                } ?>">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>
                                                    List A/C Registration
                                                </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/Givento" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Givento') {
                                                                                    echo "active";
                                                                                } ?>">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>
                                                    List Given To
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item <?php if (current_url(true)->getSegment('2') == 'Report-incoming') {
                                                        echo "menu-open";
                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Report-search') {
                                                            echo "menu-open";
                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Report-Search') {
                                                                echo "menu-open";
                                                            } ?><?php if (current_url(true)->getSegment('2') == 'Invent-outgoing') {
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
                                                                            } ?>">
                                        <i class="nav-icon fas fa-folder-open"></i>
                                        <p>
                                            Report Data
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
                                                <p>Sparepart Incoming</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/Report-outgoing" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Report-outgoing') {
                                                                                            echo "active";
                                                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Report-Search') {
                                                                                                echo "active";
                                                                                            } ?>">
                                                <i class="far fa-arrow-alt-circle-up nav-icon"></i>
                                                <p>Sparepart Outgoing</p>
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

                            </ul>
                        </nav>
                    <?php } ?>
                    <!-- /.sidebar-menu -->
                    </div>
                    <!-- /.sidebar -->
                </aside>

                <!-- Content Wrapper. Contains page content -->