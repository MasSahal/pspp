<?= $this->extend('petugas/template_petugas') ?>
<?= $this->section('content') ?>



<h1>Insert Siswa</h1>
<p></p>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <form method="post" action="<?= base_url('insert_siswa') ?>">
          <div class="form-group">
            <label for="nisn">NISN </label>
            <input type="text" name="nisn" class="form-control" placeholder="Enter NISN" id="nisn">
          </div>
          <div class="form-group">
            <label for="">NIS </label>
            <input type="number" name="nis" class="form-control" placeholder="Enter NIS" id="">
          </div>
          <div class="form-group">
            <label for="">Nama </label>
            <input type="text" name="nama" class="form-control" placeholder="Enter Nama" id="">
          </div>
          <div class="form-group">
            <label for="kelas">Kelas</label>
            <select class="form-control" name="kelas" id="kelas">
              <?php foreach ($kelas as $k) {; ?>
                <option vlaue="<?= $k['nama_kelas']; ?>"><?= $s['nama_kelas'] . " - " . $s['kompetensi_keahlian'] ?></option>
              <?php }; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">No. Telp </label>
            <input type="number" name="telpon" class="form-control" placeholder="Enter No telp" id="">
          </div>
          <div class="form-group">
            <label for="">Alamat </label>
            <textarea class="form-control" name="alamat" id="" cols="20" rows="5"></textarea>
          </div>

          <button class="btn btn-primary">Submit</button>
          <div class="text-right">
            <a class="btn btn-outline-danger mr-2" href="javascript:window.history.go(-1);">
              Kembali </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>




<?= $this->endsection('content') ?>