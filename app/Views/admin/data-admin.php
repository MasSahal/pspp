<?= $this->extend('admin/template_admin') ?>
<?= $this->section('konten') ?>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Admin dan Petugas</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($admin as $a) {

                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $a->nama_petugas ?></td>
                            <td><?= $a->username ?></td>
                            <td><?= $a->level ?></td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#edit_<?= $a->id_petugas ?>" class="btn btn-sm btn-warning ml-3"><i class="fas fa-pencil-alt"></i></button>
                                <a href="<?= base_url('/admin/administrator/' . $a->id_petugas . '/delete') ?>" onclick="return confirm('Yakin hapus data <?= $a->level . ' ' . $a->nama_petugas ?>?')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="edit_<?= $a->id_petugas ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit <?= $a->level; ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                    </div>
                                    <form method="post" action="<?= base_url('admin/administrator/edit') ?>">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Nama </label>
                                                <input type="text" name="nama" class="form-control" value="<?= $a->nama_petugas ?>">
                                                <input type="hidden" class="form-control" name="id_petugas" value="<?= $a->id_petugas ?>">
                                                <input type="hidden" class="form-control" name="level" value="<?= $a->level ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Username </label>
                                                <input type="text" name="username" class="form-control" value="<?= $a->username ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password </label>
                                                <input type="password" name="password" class="form-control" value="<?= $a->password ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-success">Simpan</button>
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('admin/administrator/insert') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama </label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="username">Username </label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password </label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="level">Pilih Level Akun</label>
                        <select class="form-control" name="level" id="level">
                            <option value="petugas">Petugas</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endsection('content') ?>