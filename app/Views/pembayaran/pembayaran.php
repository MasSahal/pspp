<?= $this->extend('admin/template_admin') ?>
<?= $this->section('content') ?>

<div class="card shadow mb-4">
	<div class="card-body">
		<div class="table-responsive">
			<h2 class="text-center m-10">Pembayaran</h2>
			<div></div>

			<div class="text-danger mt-5">*Cari berdasarkan NIS</div>
			<form action="" method="get" class="col-md-8">

				<div class="row">
					<div class="col-md-8">
						<input class=" form-control" type="text" name="nis">
					</div>
					<div class="col-md-4">
						<a href="<?= base_url('/cari_p') ?>" class="btn btn-success " type="submit" name="cari" required placeholder="NISN/NIS" value="nis">Cari</a>
					</div>
				</div>
			</form>
		</div>


		<p>
		<p></p>
		</p>

		<?= $this->endsection('content') ?>