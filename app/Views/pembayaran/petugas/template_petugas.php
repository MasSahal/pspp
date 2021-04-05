<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Aplikasi Pembayaran SPP</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('public/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('public/dist/css/adminlte.min.css') ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand justify-content-between navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= base_url('/home') ?>" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= base_url('/logout') ?>" class="nav-link text-danger">Logout</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control mr-sm-2 form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar my-2 my-sm-0" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="<?= base_url('public/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Aplikasi SPP</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url('public/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a class="d-block">Petugas</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Home</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('/petugas/datasiswa') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Siswa</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('/datasiswa') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pembayaran</p>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row ">
            <div class="col-md-12">

              <?= $this->renderSection('content') ?>
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->

  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="<?= base_url('public/plugins/jquery/jquery.min.js') ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('public/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('public/dist/js/adminlte.min.js') ?>"></script>
</body>

</html>