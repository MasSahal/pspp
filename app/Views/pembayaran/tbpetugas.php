<?= $this->extend('admin/template_admin') ?>
<?= $this->section('content') ?>


<main>
    <div class="container-fluid">
        <!-- Page Heading -->

        <!-- Content Row -->

        <div class="card shadow mb-4">
            <h1 class="mt-4 h3 mb-0 text-gray-800 text-center">Data Petugas</h1>
            <p></p>
            <div class="row">
                <div class="col-md-6 mb-4 ml-4">
                    <a href="" data-toggle="modal" data-target="#newMenuModal" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                </div>
            </div>

            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Tabel petugas</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Petugas</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($petugas as $p) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $p->nama_petugas ?></td>
                                    <td><?= $p->username ?></td>
                                    <td><?= $p->level ?></td>
                                    <td>
                                        <a href="<?= base_url('/tbpetugas/' . $p->id_petugas . '/delete') ?>" onclick="return confirm('Yakin hapus data  <?= $p->nama_petugas ?>?')" class="btn btn-danger ml-3"><i class="fas fa-trash-alt"></i></a>

                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>

                    </table>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Modal -->
            <div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newMenuModalLabel">Tambah Data Petugas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- form tambah -->
                        <form method="post" action="<?= base_url('insert_petugas') ?>">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label class="small mb-1" for="">Nama Petugas</label>
                                    <input class="form-control py-4" id="" name="nama_petugas" type="text" placeholder="Masukan Nama Kelas" value="" />
                                </div>

                                <div class="form-group">
                                    <label class="small mb-1" for="">username</label>
                                    <input class="form-control py-4" id="" name="username" type="text" placeholder="Masukan Nama Jurusan" value="" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="">Password</label>
                                    <input class="form-control py-4" id="" name="password" type="text" placeholder="Masukan Nama Jurusan" value="" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="">Level</label>
                                    <input class="form-control py-4" id="" name="level" type="text" placeholder="Masukan Nama Jurusan" value="" />
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

            <?= $this->endsection() ?>