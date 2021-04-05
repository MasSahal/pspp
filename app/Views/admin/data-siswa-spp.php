<?= $this->extend('admin/template_admin') ?>
<?= $this->section('konten') ?>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pembayaran SPP</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>No Telp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($siswa as $s) {

                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $s->nisn ?></td>
                            <td><?= $s->nama ?></td>
                            <td><?= $s->nama_kelas . ' - ' . $s->kompetensi_keahlian ?></td>
                            <td><?= $s->no_telp ?></td>
                            <td>
                                <a href="<?= base_url('/admin/pembayaran/' . $s->nisn . '/detail') ?>" class="btn btn-sm btn-info">Lihat Tagihan SPP</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>


            </table>
        </div>
    </div>
</div>

<?= $this->endsection('content') ?>