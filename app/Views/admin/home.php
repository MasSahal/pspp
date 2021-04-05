<?= $this->extend('admin/template_admin'); ?>

<?= $this->section('konten'); ?>
<!-- info umum di dashboard -->
<div class="row mb-3">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-6">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Pembayaran Terakhir</div>
                        <!-- <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $riwayat->tgl_bayar; ?></div> -->
                        <table class="table table-sm table-borderless">
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td><?= $siswa->nama; ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Bayar</th>
                                <td>:</td>
                                <td><?= $riwayat->tgl_bayar; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-6">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Data Singkat</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        <table class="table table-sm table-borderless">
                            <tr>
                                <th>Ruangan</th>
                                <td>:</td>
                                <td><?= $jml_ruang; ?></td>
                            </tr>
                            <tr>
                                <th>Total Transaksi</th>
                                <td>:</td>
                                <td><?= $jml_transaksi; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card shadow border-left-warning ">
            <div class="card-header">
                <h1 class="display-3">Hi, <?= session()->nama_petugas; ?></h1>
                <p class="lead">Selamat datang di aplikasi pembayaran spp</p>
                <!-- <hr class="my-2"> -->
                <p class="lead">
                    <a class="btn btn-info" href="<?= base_url('/admin/pembayaran') ?>" role="button">Info Selengkapnya</a>
                </p>
            </div>
        </div>

    </div>
</div>
<?= $this->endsection('konten'); ?>