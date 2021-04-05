<?= $this->extend('admin/template_admin') ?>
<?= $this->section('content') ?>

<main>
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- Content Row -->
            <p></p>
            <div class=" text-center">
                <h1 class="h3 mb-0 text-gray-800 text-center">Data SPP</h1>
            </div>
            <br>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('/insert_spp') ?>" method="post">
                            <div class="form-group">
                                <label for="">Tahun </label>
                                <input type="year" name="tahun" class="form-control" placeholder="Enter tahun" id="tahun">
                            </div>
                            <div class="form-group">
                                <label for="">Nominal </label>
                                <input type="number" name="nominal" class="form-control" placeholder="Enter Nominal" id="">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <h6 class="m-0 font-weight-bold text-primary">Tabel SPP</h6>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
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
                                    <td><?= $s->tahun ?></td>
                                    <td><?= $s->nominal ?></td>
                                    <td>
                                        <a href="<?= base_url('/spp/' . $s->id_spp . '/delete') ?>" onclick="return confirm('Yakin hapus data tahun <?= $s->tahun ?>?')" class="btn btn-danger ml-3"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</main>
<?= $this->endsection() ?>