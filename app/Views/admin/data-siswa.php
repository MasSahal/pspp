<?= $this->extend('admin/template_admin') ?>
<?= $this->section('konten') ?>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
    </div>
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
                                <button type="button" data-toggle="modal" data-target="#edit_<?= $s['nisn'] ?>" class="btn btn-sm btn-warning ml-3"><i class="fas fa-pencil-alt"></i></button>
                                <a href="<?= base_url('/admin/siswa/' . $s['nisn'] . '/delete') ?>" onclick="return confirm('Yakin hapus data tahun <?= $s['nis'] ?>?')" class="btn btn-danger ml-3"><i class="fas fa-trash-alt"></i></a>
                                <!-- <a href="<?= base_url('/admin/siswa/' . $s['nisn'] . '/bayar') ?>" onclick="return confirm('Anda akan dialihkan ke halaman profile <?= $s['nama'] ?>?')" class="btn btn-danger ml-3"><i class="fas fa-dollar-sign"></i></a> -->
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="edit_<?= $s['nisn'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Data Siswa</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        value="<?= $s['nisn'] ?>"
                                    </div>
                                    <form method="post" action="<?= base_url('admin/siswa/insert') ?>">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">

                                                    <div class="form-group">
                                                        <label for="nisn">NISN </label>
                                                        <input type="number" class="form-control" name="nisn" value="<?= $s['nisn'] ?>" id="nisn" disabled>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">NIS </label>
                                                        <input type="number" name="nis" class="form-control" value="<?= $s['nis'] ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="kelas">Pilih Kelas</label>
                                                        <select class="form-control" name="kelas" id="kelas">
                                                            <?php foreach ($kelas as $k) {; ?>
                                                                <option value="<?= $k->id_kelas; ?>" <?= ($k->id_kelas == $s['id_kelas']) ? "selected" : ""; ?>><?= $k->nama_kelas . " - " . $k->kompetensi_keahlian ?></option>
                                                            <?php }; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Nama </label>
                                                        <input type="text" name="nama" class="form-control" placeholder="Enter Nama" id="" value="<?= $s['nama'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">No. Telp </label>
                                                        <input type="number" name="telepon" class="form-control" placeholder="Enter No telp" id="" value="<?= $s['no_telp'] ?>">
                                                    </div>

                                                    <!-- <div class="form-group">
                                                        <label for="id_spp">Pilih Tahun Spp</label>
                                                        <select class="form-control" name="id_spp" id="id_spp">
                                                            <?php foreach ($spp as $sp) {; ?>
                                                                <option value="<?= $sp->id_spp; ?>">Rp<?= number_format($sp->nominal, 2) . "/bln di Tahun " . $sp->tahun ?></option>
                                                            <?php }; ?>
                                                        </select>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat </label>
                                                <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
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
                    <?php } ?>
                </tbody>


            </table>
        </div>
    </div>
    <div class="card-footer">
        <button type="button" data-toggle="modal" data-target="#tambah" class="btn btn-sm btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('admin/siswa/insert') ?>">
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

                            <div class="form-group">
                                <label for="kelas">Pilih Kelas</label>
                                <select class="form-control" name="kelas" id="kelas">
                                    <?php foreach ($kelas as $k) {; ?>
                                        <option value="<?= $k->id_kelas; ?>"><?= $k->nama_kelas . " - " . $k->kompetensi_keahlian ?></option>
                                    <?php }; ?>
                                </select>
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

                            <div class="form-group">
                                <label for="id_spp">Pilih Tahun Spp</label>
                                <select class="form-control" name="id_spp" id="id_spp">
                                    <?php foreach ($spp as $sp) {; ?>
                                        <option value="<?= $sp->id_spp; ?>">Rp<?= number_format($sp->nominal, 2) . "/bln di Tahun " . $sp->tahun ?></option>
                                    <?php }; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat </label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
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

<?= $this->endsection('content') ?>