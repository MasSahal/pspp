<?= $this->extend('admin/template_admin') ?>
<?= $this->section('content') ?>







<!-- Page Heading -->


<div class="card shadow mb-4">
    <div class="card-header py-3">

        <h2 class="text-center">Data Siswa</h2>

        <!-- <a href="<?= base_url('insert_sws') ?>" class="btn btn-primary">Tambah Data Siswa</a> -->
        <button type="button" data-toggle="modal" data-target="#tambah" class="btn btn-primary">Tambah Data Siswa</button>

    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Siswa</h6>
        </div>
        <form class="form-inline ml-3 mt-3">
            <div class="input-group text-right input-group-sm">
                <input class="form-control  mr-sm-2 form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar my-2 my-sm-0" type="submit">
                        <i class="fas fa-search"></i>
                    </button>

                </div>
            </div>
        </form>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
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
                                <td><?= $s['nisn'] ?></td>
                                <td><?= $s['nis'] ?></td>
                                <td><?= $s['nama'] ?></td>
                                <td><?= $s['nama_kelas'] . ' - ' . $s['kompetensi_keahlian'] ?></td>
                                <td><?= $s['alamat'] ?></td>
                                <td><?= $s['no_telp'] ?></td>
                                <td>
                                    <a href="" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('/datasiswa/' . $s['nisn'] . '/delete') ?>" onclick="return confirm('Yakin hapus data tahun <?= $s['nis'] ?>?')" class="btn btn-danger ml-3"><i class="fas fa-trash-alt"></i></a>
                                    <a href="<?= base_url('/datasiswa/' . $s['nisn'] . '/bayar') ?>" onclick="return confirm('Anda akan dialihkan ke halaman profile <?= $s['nama'] ?>?')" class="btn btn-danger ml-3"><i class="fas fa-dollar-sign"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>


                </table>
            </div>
            <!-- /.container-fluid -->

        </div>

        <!-- Modal -->
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="<?= base_url('insert_siswa') ?>">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">

                                    <div class="form-group">
                                        <label for="nisn">NISN </label>
                                        <input type="text" name="nisn" class="form-control" placeholder="Enter NISN" id="nisn">
                                    </div>

                                    <div class="form-group">
                                        <label for="">NIS </label>
                                        <input type="number" name="nis" class="form-control" placeholder="Enter NIS" id="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="">Nama </label>
                                        <input type="text" name="nama" class="form-control" placeholder="Enter Nama" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">No. Telp </label>
                                        <input type="number" name="telepon" class="form-control" placeholder="Enter No telp" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kelas">Pilih Kelas</label>
                                <select class="form-control" name="kelas" id="kelas">
                                    <?php foreach ($kelas as $k) {; ?>
                                        <option value="<?= $k->id_kelas; ?>"><?= $k->nama_kelas . " - " . $k->kompetensi_keahlian ?></option>
                                    <?php }; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat </label>
                                <textarea class="form-control" name="alamat" id="" cols="20" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<?= $this->endsection('content') ?>