<?= $this->extend('admin/template_admin'); ?>

<?= $this->section('konten'); ?>
<style>
    .spp-hover:hover {
        text-decoration: underline;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card shadow border-left-warning">
            <div class="card-body">
                <form method="get">
                    <div class="input-group  border-dark">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Masukan NISN" aria-label="Search" aria-describedby="basic-addon2" name="nisn">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text">
                                SPP Bulan
                            </label>
                        </div>
                        <select class="custom-select form-control" name="spp_bulan">

                            <option value="">Silahkan Pilih</option>
                            <option value="januari">Januari</option>
                            <option value="februari">Februari</option>
                            <option value="maret">Maret</option>
                            <option value="april">April</option>
                            <option value="mei">Mei</option>
                            <option value="juni">Juni</option>
                            <option value="juli">Juli</option>
                            <option value="agustus">Agustus</option>
                            <option value="september">September</option>
                            <option value="oktober">Oktober</option>
                            <option value="november">November</option>
                            <option value="desember">Desember</option>
                        </select>
                    </div>
                </div>
            </div>
            <?php if (isset($_GET['nisn'])) {; ?>
                <div class="card-footer">
                    <div class="row">
                        <?php for ($i = 1; $i <= 12; $i++) { ?>

                            <div class="col-md-2 mb-2">
                                <a href="<?= base_url('/admin/pembayaran?nisn') ?>" class="">
                                    <div class="card border-secondary spp-hover">
                                        <div class="card-header bg-secondary text-light">
                                            <strong>Bulan Ke <?= $i; ?></strong>
                                        </div>
                                        <div class="card-body">
                                            <span>Status : -</span>
                                            <span>Nominal : 1000</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php }; ?>
                    </div>
                </div>
            <?php }; ?>
        </div>
    </div>
</div>
<?= $this->endsection('konten'); ?>