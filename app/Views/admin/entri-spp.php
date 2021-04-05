<?= $this->extend('admin/template_admin') ?>
<?= $this->section('konten') ?>

<card class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="h3 mb-0 text-gray-800 text-center">Data Entri SPP</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Nominal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($spp as $s) {
                    ?>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= $s->bulan ?></td>
                            <td><?= $s->tahun ?></td>
                            <td><?= $s->nominal ?></td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#edit_<?= $s->id_spp; ?>" class="btn btn-sm btn-warning ml-3"><i class="fas fa-pencil-alt"></i></button>
                                <a href="<?= base_url('admin/entri-spp/' . $s->id_spp . '/delete') ?>" onclick="return confirm('Yakin hapus data tahun <?= $s->tahun ?>?')" class="btn btn-sm btn-danger ml-3"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="edit_<?= $s->id_spp; ?>" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="newMenuModalLabel">Tambah Data Kelas</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!-- form tambah -->
                                    <form action="<?= base_url('/admin/entri-spp/edit') ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="bulan">Pilih Bulan</label>
                                                <select class="custom-select form-control" name="bulan" id="bulan">
                                                    <option>Silahkan Pilih</option>
                                                    <option value="Januari" <?= ($s->bulan == "Januari") ? "selected" : ""; ?>>Januari</option>
                                                    <option value="Februari" <?= ($s->bulan == "Februari") ? "selected" : ""; ?>>Februari</option>
                                                    <option value="Maret" <?= ($s->bulan == "Maret") ? "selected" : ""; ?>>Maret</option>
                                                    <option value="April" <?= ($s->bulan == "April") ? "selected" : ""; ?>>April</option>
                                                    <option value="Mei" <?= ($s->bulan == "Mei") ? "selected" : ""; ?>>Mei</option>
                                                    <option value="Juni" <?= ($s->bulan == "Juni") ? "selected" : ""; ?>>Juni</option>
                                                    <option value="Juli" <?= ($s->bulan == "Juli") ? "selected" : ""; ?>>Juli</option>
                                                    <option value="Agustus" <?= ($s->bulan == "Agustus") ? "selected" : ""; ?>>Agustus</option>
                                                    <option value="September" <?= ($s->bulan == "September") ? "selected" : ""; ?>>September</option>
                                                    <option value="Oktober" <?= ($s->bulan == "Oktober") ? "selected" : ""; ?>>Oktober</option>
                                                    <option value="November" <?= ($s->bulan == "November") ? "selected" : ""; ?>>November</option>
                                                    <option value="Desember" <?= ($s->bulan == "Desember") ? "selected" : ""; ?>>Desember</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="tahun">Pilih Tahun</label>
                                                <select class="form-control" name="tahun" id="tahun" required>
                                                    <?php for ($i = 2020; $i <= 2050; $i++) { ?>
                                                        <option value="<?= $i ?>" <?= ($s->tahun == $i) ? "selected" : ""; ?>><?= $i ?></option>
                                                    <?php }; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nominal">Nominal </label>
                                                <input type="number" name="nominal" class="form-control" placeholder="Enter Nominal" id="nominal" value="<?= $s->nominal; ?>">
                                                <input type="hidden" name="id_spp" value="<?= $s->id_spp; ?>">
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
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <button type="button" data-toggle="modal" data-target="#tambah" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</button>
    </div>
</card>




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
            <form action="<?= base_url('/admin/entri-spp/insert') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="bulan">Pilih Bulan</label>
                        <select class="custom-select form-control" name="bulan" id="bulan">
                            <option value="">Silahkan Pilih</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tahun">Pilih Tahun</label>
                        <select class="form-control" name="tahun" id="tahun" required>
                            <?php for ($i = 2020; $i <= 2050; $i++) { ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php }; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nominal">Nominal </label>
                        <input type="number" name="nominal" class="form-control" placeholder="Enter Nominal" id="nominal" required>
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