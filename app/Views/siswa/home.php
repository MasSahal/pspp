<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="aplikasiinventaris">
    <meta name="author" content="Arif">
    <link rel="shortcut icon" href="<?= base_url('/public/favicon.ico') ?>" type="image/x-icon">
    <link rel="icon" href="<?= base_url('/public/favicon.ico') ?>" type="image/x-icon">

    <title>PSPP</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('/public') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('/public') ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url('/public') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-dark bg-dark topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hi, <?= session()->nama; ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('/public') ?>/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- pesan alert -->
                    <div class="row">
                        <div class="col">
                            <?php if (isset($_SESSION['msg_suc'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                                    <?= session()->msg_suc; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } elseif (isset($_SESSION['msg_err'])) { ?>
                                <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                    <?= session()->msg_err; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } elseif (isset($_SESSION['msg_war'])) { ?>
                                <div class="alert alert-warning alert-dismissible fade show mb-2" role="alert">
                                    <?= session()->msg_war; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php }; ?>
                        </div>
                    </div>

                    <!-- enstend konten -->

                    <main>
                        <div class="container">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="card shadow border-top-dark">
                                        <div class="card-header">
                                            Data Siswa
                                        </div>
                                        <div class="card-header">
                                            <table class="table table-sm table-borderless">
                                                <tr>
                                                    <th>NISN</th>
                                                    <td>:</td>
                                                    <td><?= $siswa->nisn; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>NIS</th>
                                                    <td>:</td>
                                                    <td><?= $siswa->nis; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Nama</th>
                                                    <td>:</td>
                                                    <td><?= $siswa->nama; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Kelas</th>
                                                    <td>:</td>
                                                    <td><?= $siswa->nama_kelas; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Kompetensi Keahlian</th>
                                                    <td>:</td>
                                                    <td><?= $siswa->kompetensi_keahlian; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Telepon</th>
                                                    <td>:</td>
                                                    <td><?= $siswa->no_telp; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Alamat</th>
                                                    <td>:</td>
                                                    <td><?= $siswa->alamat; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow border-top-dark">
                                        <div class="card-header">
                                            Data Pembayaran SPP
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tanggal Bayar</th>
                                                        <th>Bulan Dibayar</th>
                                                        <th>Tahun Dibayar</th>
                                                        <th>Jumlah Bayar</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 0; ?>
                                                    <?php foreach ($data_spp as $d) {; ?>
                                                        <tr>
                                                            <td><?= $no += 1; ?></td>
                                                            <td><?= $d->tgl_bayar; ?></td>
                                                            <td><?= $d->bln_dibayar; ?></td>
                                                            <td><?= $d->thn_dibayar; ?></td>
                                                            <td><?= $d->nominal; ?></td>
                                                            <td>
                                                                <span class="p-1 bg-success text-white">Dibayar</span>
                                                            </td>
                                                        </tr>
                                                    <?php }; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; P-SPP 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingin mengakhiri sesi?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">tekan logout untuk mengakhiri sesi.</div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-dark" href="<?= base_url('/siswa/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="const" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <img src="<?= base_url('/public/img/bg-construct.jpg') ?>" class="img-fluid" alt="">
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('/public') ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('/public') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('/public') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('/public') ?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('/public') ?>/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('/public') ?>/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url('/public') ?>/js/demo/chart-pie-demo.js"></script>
    <!-- Page level plugins -->
    <script src="<?= base_url('/public') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('/public') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="<?= base_url('/public') ?>/js/demo/datatables-demo.js"></script>
</body>

</html>