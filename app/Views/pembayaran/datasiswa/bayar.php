<?= $this->extend('admin/template_admin') ?>
<?= $this->section('content') ?>



<div class="card shadow ">
    <div class="card-header ">
        <h3 class="text-center">Profile Siswa</h3>
        <p></p>
        <hr>
        <table class="table table-sm table-borderless">

            <tr>
                <th>NISN</th>
                <td>:</td>
                <td><?= $siswa->nisn ?></td>
            </tr>

            <tr>
                <th>NIS</th>
                <td>:</td>
                <td><?= $siswa->nis ?></td>

            </tr>
            <tr>
                <th>Nama</th>
                <td>:</td>
                <td><?= $siswa->nama ?></td>

            </tr>
            <tr>
                <th>Kelas</th>
                <td>:</td>
                <td><?= $siswa->nama_kelas . '-' . $siswa->kompetensi_keahlian ?></td>

            </tr>
            <tr>
                <th>Alamat</th>
                <td>:</td>
                <td><?= $siswa->alamat ?></td>

            </tr>
            <tr>
                <th>No Telpon</th>
                <td>:</td>
                <td><?= $siswa->no_telp ?></td>

            </tr>
        </table>


        <?= $this->endsection('content') ?>