<?= $this->extend('petugas/template_petugas') ?>
<?= $this->section('konten') ?>

<div class="row mb-3">
    <div class="col-12">
        <div class="card shadow border-left-dark">
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
        <div class="card shadow border-left-success mb-3">
            <div class="card-header">
                Form Pembayaran SPP

                <h5 class="float-right">
                    <?php date_default_timezone_set('ASIA/JAKARTA');
                    echo  date('D, d M Y'); ?></h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('petugas/entri-spp/bayar-spp') ?>" method="post">
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td>
                                <label for="">Pilih Bulan Bayar</label>
                            </td>
                            <td>:</td>
                            <td>
                                <select class="form-control" name="id_spp" id="id_spp">
                                    <?php
                                    foreach ($spp as $s) {
                                    ?>
                                        <option value="<?= $s->id_spp; ?>">
                                            <?= $s->bulan; ?> - Rp. <?= $s->nominal; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" name="id_petugas" value="<?= session()->id_petugas; ?>">
                                <input type="hidden" name="nisn" value="<?= $siswa->nisn; ?>">
                            </td>
                            <td></td>
                            <td><button type="submit" class="btn btn-primary btn-block">Bayar SPP</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card shadow border-left-success">
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
                            <th>Aksi</th>
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
                                <td>
                                    <a href="<?= base_url('petugas/print/' . $siswa->nisn . "/" . $d->id_pembayaran) ?>" class="btn btn-default btn-outline-dark rounded-0 btn-sm" target="_blank"><i class="fa fa-print" aria-hidden="true"></i> Cetak</a>
                                </td>
                            </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endsection('content') ?>