<?= $this->extend('admin/template_admin') ?>
<?= $this->section('konten') ?>


<div class="row">
    <div class="col-md-12">

        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Kompetensi Keahlian</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($kelas as $k) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $k->nama_kelas ?></td>
                                    <td><?= $k->kompetensi_keahlian ?></td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#edit_<?= $k->id_kelas; ?>" class="btn btn-sm btn-warning ml-3"><i class="fas fa-pencil-alt"></i></button>
                                        <a href="<?= base_url('admin/kelas/' . $k->id_kelas . '/delete') ?>" onclick="return confirm('Yakin hapus data  <?= $k->nama_kelas ?>?')" class="btn btn-sm btn-danger ml-3"><i class="fas fa-trash-alt"></i></a>

                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="edit_<?= $k->id_kelas; ?>" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="newMenuModalLabel">Edit Data Kelas</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <!-- form edit -->
                                            <form method="post" action="<?= base_url('admin/kelas/edit') ?>">
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label class="small mb-1" for="kelas">Nama Kelas</label>
                                                        <input class="form-control py-4" id="kelas" name="kelas" type="text" placeholder="Masukan Nama Kelas" value="<?= $k->nama_kelas; ?>" />
                                                        <input id="id_kelas" name="id_kelas" type="hidden" value="<?= $k->id_kelas; ?>" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="small mb-1" for="jurusan">Kompetensi Keahlian</label>
                                                        <input class="form-control py-4" id="jurusan" name="jurusan" type="text" placeholder="Masukan Nama Jurusan" value="<?= $k->kompetensi_keahlian; ?>" />
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </tbody>

                    </table>
                </div>
                <!-- /.container-fluid -->

            </div>
            <div class="card-footer">
                <button type="button" data-toggle="modal" data-target="#tambah" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</button>
            </div>
            <!-- End of Main Content -->

            <!-- Modal -->
            <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newMenuModalLabel">Tambah Data Kelas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- form tambah -->
                        <form method="post" action="<?= base_url('admin/kelas/insert') ?>">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label class="small mb-1" for="kelas">Nama Kelas</label>
                                    <input class="form-control py-4" id="kelas" name="kelas" type="text" placeholder="Masukan Nama Kelas" value="" />
                                </div>

                                <div class="form-group">
                                    <label class="small mb-1" for="jurusan">Kompetensi Keahlian</label>
                                    <input class="form-control py-4" id="jurusan" name="jurusan" type="text" placeholder="Masukan Nama Jurusan" value="" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endsection() ?>