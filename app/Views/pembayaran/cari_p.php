<?= $this->extend('admin/template_admin') ?>
<?= $this->section('content') ?>

<h3>Home</h3>

<div class="card">
    <div class="row bg-p b-sd" style="justify-content: center; margin-top:1%; padding:1%">
        <div class="col-2" style="width: 70%; padding: 10px">
            <form action="" method="GET">
                <div class="form-grup">
                    <div class="row">
                        <div class="col">
                            <input class="form-kontrol" type="text" name="nisn" id="tahun" placeholder="Cari berdasakan NISN. EX : 1234xxxxxx">
                        </div>
                        <div>
                            <button style="padding: 10px;margin: 1px 0 ;font-size: 16px" class="tbl tbl-b" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row bg-p b-sd" style="margin-top :1%;padding: 1%">
        <div class="col-1">
            <h4>Informasi Siswa</h4>
        </div>
        <div class="col-2">
            <div class="row">
                <div class="col-2">
                    <h5>Nama</h5>
                    <h5>Nisn</h5>
                    <h5>Kelas / Kompetensi Keahlian</h5>
                </div>
                <div class="col">
                    <p>: <?= $datasiswa['nama'] ?></p>
                    <p>: <?= $datasiswa['nisn'] ?></p>
                    <p>: <?= $datasiswa['nama_kelas'] . " / " . $datasiswa['kompetensi_keahlian'] ?></p>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="row">
                <div class="col-3">
                    <h5>Spp /Bulan</h5>
                    <h5>Tahun Ajar</h5>
                    <h5>Keterangan</h5>
                </div>
                <div class="col">
                    <p>: Rp<?= number_format($datasiswa['nominal'], 0) ?></p>
                    <p>: <?= $datasiswa['tahun'] ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row bg-p b-sd" style="padding: 15px ;margin-top:1%;">
        <div class="col">
            <div class="row" style="justify-content: space-around">
                <?php foreach ($datapembayaran as $value) : ?>
                    <div class="col-3 b-sd" style="text-align: center; margin: 10px 0;">
                        <div class="row">
                            <div class="col-1" style="background-color: #f7f7f7">
                                <h5 style="padding:5px; display: inline-block"><?= $value['tahun'] ?></h5>
                            </div>
                            <div class="col-1" style="padding: 10px 0">
                                <p>Rp<?= number_format($value['nominal'], 0) ?></p>
                                <p><?= $value['bln_dibayar'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <?php if ($value['status'] == 'Lunas') : ?>
                                <div class="col-1 ">
                                    <div class="row" style="justify-content: space-around">
                                        <div class="col-2 bg-b" style="color: white;padding: 10px 0">
                                            <?= $value['status'] ?>
                                        </div>
                                        <div class="col-2 bg-h" style="padding: 10px 0">
                                            <!-- <a href="<?= base_url() ?>bayar/cetakriwayat.php?idbayar=<?= $value['id_pembayaran'] ?>" style="color: white">Cetak</a> -->
                                        </div>
                                    </div>
                                </div>
                            <?php elseif ($value['status'] == 'Belum Bayar') : ?>
                                <div class="col-1 bg-k " style="color: black;padding: 10px 0">
                                    <form action="" method="post">
                                        <input type="hidden" name="id_pembayaran" value="<?= $value['id_pembayaran'] ?>">
                                        <input type="hidden" name="status" value="<?= $value['status'] ?>">
                                        <input type="hidden" name="bln_dibayar" value="<?= $value['bln_dibayar'] ?>">
                                        <input type="hidden" name="nominal" value="<?= $value['nominal'] ?>">
                                        <button style="width: 100%; border:none; cursor: pointer;background-color: transparent" type="submit" name="submit" value="tambahbayar"></a><?= $value['status'] ?></button>
                                    </form>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-3" style="padding: 1%">
            <div class="row b-sd" style="padding: 15px 10px">
                <h2 style="margin-bottom: 15px">Pembayaran</h2>
                <?php if (isset($_SESSION['tambahbayar'])) : ?>
                    <div class="col-1" style="border-bottom: 1px solid #d3d3d3; padding: 10px 0">
                        <p>Rp<?= number_format($ambildatabayar['nominal'], 0) ?></p>
                        <p><?= $ambildatabayar['bulan_dibayar'] ?></p>
                        <span>SPP : <?= $value['tahun'] . ' / ' . $value['keterangan'] ?></span>
                    </div>
                    <div class="col-1" style="padding: 1%;margin-top: 10px">
                        <p style="font-weight: bold">Total : Rp<?= number_format($ambildatabayar['nominal'], 0) ?></p>
                    </div>
                <?php endif; ?>
                <div class="col-1 " style="margin-top: 15px">
                    <form action="" method="post">
                        <div class="form-grup">
                            <label for="jml_bayar">Jumlah bayar</label>
                            <input class="form-kontrol" style="width: 95%" type="number" name="jml_bayar" id="jml_bayar" placeholder="ex : 1200000">
                        </div>
                        <div class="form-grup">
                            <label for="tahun_bayar">Tahun</label>
                            <input class="form-kontrol" style="width: 95%" type="text" maxlength="4" name="tahun_bayar" id="tahun_bayar" placeholder="ex : 2020">
                        </div>
                        <?php if (isset($_SESSION['tambahbayar'])) : ?>
                            <input type="hidden" name="id_pembayaran" value="<?= $ambildatabayar['id_pembayaran'] ?>">
                            <input type="hidden" name="status" value="<?= $ambildatabayar['status'] ?>">
                            <input type="hidden" name="bulan_dibayar" value="<?= $ambildatabayar['bulan_dibayar'] ?>">
                            <input type="hidden" name="nominal" value="<?= $ambildatabayar['nominal'] ?>">
                            <div class="bg-h" style="padding:10px 0 ; margin-top: 10px">
                                <button style="width: 100%; border:none; cursor: pointer;background-color: transparent; font-size: 18px;color: white" type="submit" name="submit" value="simpan">BAYAR</button>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection('content') ?>