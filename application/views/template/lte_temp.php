<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= APP_NAME ?></title>
    <link rel="icon" href="<?= base_url('assets/' . FAV_ICON) ?>">
    <?php require_once 'lte_temp_assets.php' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img  src="<?= base_url("assets/loading.gif") ?>" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="<?= base_url("lte/") ?>#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <?= ucwords( $this->session->userdata('username') )?>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Password</a>
                        <a class="dropdown-item" href="<?=base_url('logout')?>">Logout</a>
                    </div>
                </li>


            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url("lte/") ?>index3.html" class="brand-link">
                <img src="<?= base_url("assets/" . APP_ICON) ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"><?= APP_NAME ?></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url("assets/" . USER_EMPTY) ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= ucwords( $this->session->userdata('username'))?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- <li class="nav-item">
                            <a href="<?= base_url('home') ?>" class="nav-link">
                                <i class="fas fa-tachometer-alt"></i>
                                <p>Beranda</p>
                            </a>
                        </li> -->
                        <?php foreach ($menu_sidebar as $row) { ?>
                            <?php
                             $is_open = '  ';
                             $treeview = '  ';
                            if (isset($row['child'])) {
                               
                                $is_child_active = check_child(uri_segment2(1), $row['child']);
                                if ($is_child_active) {
                                    $is_open = ' menu-is-opening menu-open ';
                                    $treeview = ' style="display: block;" ';
                                }
                            }
                            ?>
                            <li class="nav-item <?= $is_open ?>">
                                <?php
                                $url = '#';
                                if (isset($row['child'])) {
                                    $url = '#';
                                } else {
                                    $url = base_url($row['url']);
                                }
                                $is_active = '';
                                if (uri_segment2(1) == trim($row['url'], '/')) {
                                    $is_active = ' active ';
                                }
                                ?>
                                <a href="<?= $url ?>" class="nav-link <?= $is_active ?>">
                                    <i class="<?= $row['icon'] ?>"></i>
                                    <p>
                                        <?= $row['name']  ?>
                                        <?php if (isset($row['child'])) { ?>
                                            <i class="right fas fa-angle-left"></i>
                                        <?php } ?>
                                    </p>
                                </a>
                                <?php if (isset($row['child'])) { ?>
                                    <ul class="nav nav-treeview <?= $treeview ?>">
                                        <?php foreach ($row['child']  as $row2) { ?>
                                            <li class="nav-item">
                                                <?php
                                                $is_active = '';
                                                if (uri_segment2(1) == trim($row2['url'], '/')) {
                                                    $is_active = ' active ';
                                                }
                                                ?>
                                                <a href="<?= base_url($row2['url']) ?>" class="nav-link <?= $is_active ?>">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p><?= $row2['name'] ?></p>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <?php

        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $title_page ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <!-- <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url("lte/") ?>#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol> -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?php if (isset($content)) echo $content ?>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Template by <a href="https://adminlte.io/themes/v3/">AdminLTE.io</a>.</strong>

            <div class="float-right d-none d-sm-inline-block">
                <!-- <b>Version</b> 3.1.0 -->
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script src="<?= base_url("lte/") ?>dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url("lte/") ?>dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="<?= base_url("lte/") ?>dist/js/pages/dashboard.js"></script> -->
    <script>
  $(document).ready(function() {


    <?php if ( strlen( $this->session->flashdata('error_message')) > 0) { ?>

      toastr.error('<?= $this->session->flashdata('error_message') ?>','Maaf');

    <?php } ?>

  });
</script>
</body>

</html>