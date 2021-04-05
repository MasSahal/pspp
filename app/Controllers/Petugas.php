<?php

namespace App\Controllers;

class Petugas extends BaseController
{
	public function index()
	{
		return view('petugas/template_petugas');
	}


	private $modelPetugas,
		$session,
		$modelSiswa,
		$modelSpp,
		$modelKelas,
		$db,
		$modelTbpetugas;

	public function __construct()
	{
		$this->modelPetugas = new \App\Models\Petugas();
		$this->modelTbpetugas = new \App\Models\Tbpetugas();
		$this->modelSiswa = new \App\Models\Siswa();
		$this->modelSpp = new \App\Models\Spp();
		$this->modelKelas = new \App\Models\Kelas();
		$this->session = \Config\Services::session();
		$this->db = \Config\Database::connect();
	}

	public function datasiswa()

	{

		$siswa = $this->modelSiswa->get_siswa_kelas();
		$kelas = $this->modelKelas->findAll();
		$data = ([
			'siswa' => $siswa,
			'kelas' => $kelas

		]);
		return view('/petugas/datasiswa/datasiswa', $data);
	}


	public function insert_siswa()
	{
		$nisn = $this->request->getPost('nisn');
		$nis = $this->request->getPost('nis');
		$nama = $this->request->getPost('nama');
		$id_kelas = $this->request->getPost('kelas');
		$alamat = $this->request->getPost('alamat');
		$no_telp = $this->request->getPost('telepon');
		$id_spp = 22 . time() . rand(10, 99);

		$data = ([
			"nisn"		=> $nisn,
			"nis"		=> $nis,
			"nama"		=> $nama,
			"id_kelas"	=> $id_kelas,
			"alamat"	=> $alamat,
			"no_telp"	=> $no_telp,
			"id_spp"	=> $id_spp
		]);
		// dd($data);
		$this->modelSiswa->insert($data);
		// $this->modelSpp->insert(['id_spp' => $id_spp]);
		return redirect()->to(base_url('/petugas/datasiswa'));
	}

	public function delete_siswa($id_siswa)
	{

		$this->modelSiswa->delete($id_siswa);
		return redirect()->to(base_url('/petugas/datasiswa'));
	}


	//data untuk mencari siswa berdasarkan nisn
	public function cari($nisn, $idbayar = null)
	{
		if (isset($idbayar)) {

			$bayar = $this->db->query("SELECT * FROM tb_pembayaran
            JOIN tb_siswa ON tb_siswa.nisn = tb_pembayaran.nisn
            JOIN tb_kelas ON tb_kelas.id_kelas = tb_siswa.id_kelas
            JOIN tb_spp ON tb_spp.id_spp = tb_pembayaran.id_spp
            JOIN tb_petugas ON tb_petugas.id_petugas = tb_pembayaran.id_petugas
            WHERE tb_pembayaran.id_pembayaran='$idbayar' ");

			$datapembayaran = $bayar->getResultObject();

			return $datapembayaran;
		} else {

			if ($nisn != "") {
				if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'petugas') {

					$bayar = $this->db->query("SELECT * FROM tb_pembayaran
                    JOIN siswa ON siswa.nisn = pembayaran.nisn
                    JOIN kelas ON kelas.id_kelas = siswa.id_kelas
                    JOIN spp ON spp.id_spp = pembayaran.id_spp
                    WHERE pembayaran.nisn='$nisn'");
				} else {
					$bayar = $this->db->query("SELECT * FROM tb_pembayaran
                    JOIN siswa ON siswa.nisn = pembayaran.nisn
                    JOIN kelas ON kelas.id_kelas = siswa.id_kelas
                    JOIN spp ON spp.id_spp = pembayaran.id_spp
                    JOIN petugas ON petugas.id_petugas = pembayaran.id_petugas
                    WHERE pembayaran.nisn='$nisn'");
				}

				$datapembayaran = [];
				while ($p = $bayar->getResultObject()) {
					$datapembayaran[] = $p;
				}

				return $datapembayaran;
			}
			return false;
		}
	}

	public function cari_p()
	{
		$datapembayaran = $pembayaran->cari($_GET['nisn']);
		$datasiswa = $siswa->cari($_GET['nisn']);
		return view('admin/cari_p');
	}
}
