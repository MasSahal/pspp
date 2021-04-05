<?php

namespace App\Controllers;

class Admin extends BaseController
{
	private $modelPetugas,
		$session,
		$modelSiswa,
		$modelSpp,
		$modelKelas,
		$modelPembayaran,
		$db;

	public function __construct()
	{
		$this->modelPetugas = new \App\Models\Petugas();
		$this->modelSiswa = new \App\Models\Siswa();
		$this->modelSpp = new \App\Models\Spp();
		$this->modelPembayaran = new \App\Models\Pembayaran();
		$this->modelKelas = new \App\Models\Kelas();
		$this->session = \Config\Services::session();
		$this->db = \Config\Database::connect();
	}
	public function index()
	{
		$riwayat = $this->modelPembayaran->orderBy('tgl_bayar', 'asc')->first();
		$siswa = $this->modelSiswa->where('nisn', $riwayat->nisn)->first();
		$jml_siswa = $this->modelSiswa->countAll();
		$jml_ruang = $this->modelKelas->countAll();
		$jml_transaksi = $this->modelPembayaran->countAll();

		$data = ([
			'riwayat' => $riwayat,
			'siswa' => $siswa,
			'jml_siswa' => $jml_siswa,
			'jml_ruang' => $jml_ruang,
			'jml_transaksi' => $jml_transaksi,
		]);
		// dd($data);

		return view('admin/home', $data);
	}



	public function ddds()
	{
		$nisn = $this->request->getGet('nisn');

		//jika di pilih siswa
		if (isset($nisn)) {
			$siswa = $this->getSiswaKelas($nisn);
			// if ($siswa == null) {
			// 	return redirect()->to('pembayaran');
			// }
		} else {
			$siswa = $this->getSiswaKelas();
		}

		$data = ([
			'pembayaran' => $this->modelPembayaran->findAll(),
			'siswa' => $siswa
		]);
		return view('admin/pembayaran', $data);
	}

	public function pembayaran()
	{
		$data['siswa'] = $this->modelSiswa->getSiswa();
		return view('admin/data-siswa-spp', $data);
	}

	public function detail_spp($nisn)
	{
		$data_spp = $this->modelPembayaran->getPembayaran($nisn);
		$spp = $this->modelSpp->findAll();
		$siswa = $this->modelSiswa->get_siswa_kelas_id($nisn);
		$data = ([
			'siswa' => $siswa,
			'spp' => $spp,
			'data_spp' => $data_spp
		]);
		return view('admin/detail-spp', $data);
	}

	public function bayar_spp()
	{
		$id_petugas = $this->request->getPost('id_petugas');
		$nisn = $this->request->getPost('nisn');
		$id_spp = $this->request->getPost('id_spp');

		$spp = $this->modelSpp->where('id_spp', $id_spp)->first();

		//cek apakah spp sudah di bayar
		$cek_spp = $this->modelPembayaran->where('nisn', $nisn)->where('bln_dibayar', $spp->bulan)->where('thn_dibayar', $spp->tahun)->first();

		if (!$cek_spp) {
			$data = ([
				'id_petugas' => $id_petugas,
				'nisn' => $nisn,
				'tgl_bayar' => date('Y-m-d H:i:s'),
				'bln_dibayar' => $spp->bulan,
				'thn_dibayar' => $spp->tahun,
				'id_spp' => $spp->id_spp,
				'jumlah_bayar' => $spp->nominal
			]);

			$add = $this->modelPembayaran->insert($data);
			if ($add) {
				$this->session->setFlashdata("msg_suc", "Berhasil membayar SPP bulan " . $spp->bulan . " Tahun " . $spp->tahun);
				return redirect()->to(previous_url());
			} else {
				$this->session->setFlashdata("msg_err", "Gagal membayar SPP bulan " . $spp->bulan . " Tahun " . $spp->tahun);
				return redirect()->to(previous_url());
			}

			//
		} else {
			$this->session->setFlashdata("msg_war", "SPP bulan " . $spp->bulan . " Tahun " . $spp->tahun . " telah dibayar");
			return redirect()->to(previous_url());
		}
	}

	public function print_spp($nisn, $id_pembayaran)
	{
		$data['data'] = $this->modelPembayaran->getPembayaran($nisn, $id_pembayaran);
		$data['kelas'] = $this->modelKelas->findAll();
		// dd($data);
		return view('admin/print-spp', $data);
	}

	//kelola  kelas
	public function siswa()
	{

		$siswa = $this->modelSiswa->get_siswa_kelas();
		$kelas = $this->modelKelas->findAll();
		$spp = $this->modelSpp->findAll();
		$data = ([
			'siswa' => $siswa,
			'kelas' => $kelas,
			'spp' => $spp
		]);
		return view('admin/data-siswa', $data);
	}

	public function insert_siswa()
	{
		$nisn = $this->request->getPost('nisn');
		$cek_nisn = $this->modelSiswa->where('nisn', $nisn)->first();
		if (!$cek_nisn) {
			$nis = $this->request->getPost('nis');
			$nama = $this->request->getPost('nama');
			$id_kelas = $this->request->getPost('kelas');
			$alamat = $this->request->getPost('alamat');
			$no_telp = $this->request->getPost('telepon');
			$id_spp = $this->request->getPost('id_spp');

			$data = ([
				"nisn"		=> $nisn,
				"nis"		=> $nis,
				"nama"		=> $nama,
				"id_kelas"	=> $id_kelas,
				"alamat"	=> $alamat,
				"no_telp"	=> $no_telp,
				"id_spp"	=> $id_spp
			]);

			$this->modelSiswa->insert($data);
			$this->session->setFlashdata("msg_suc", "Berhasil tambah siswa");
			return redirect()->to(base_url('/admin/siswa'));

			//
		} else {
			$this->session->setFlashdata("msg_err", "Gagal tambah siswa, NISN telah digunakan");
			return redirect()->to(base_url('/admin/siswa'));
		}
	}

	public function edit_siswa()
	{
		$nisn = $this->request->getPost('nisn');
		$nis = $this->request->getPost('nis');
		$nama = $this->request->getPost('nama');
		$id_kelas = $this->request->getPost('kelas');
		$alamat = $this->request->getPost('alamat');
		$no_telp = $this->request->getPost('telepon');
		$id_spp = $this->request->getPost('id_spp');

		$data = ([
			"nisn"		=> $nisn,
			"nis"		=> $nis,
			"nama"		=> $nama,
			"id_kelas"	=> $id_kelas,
			"alamat"	=> $alamat,
			"no_telp"	=> $no_telp,
			"id_spp"	=> $id_spp
		]);

		$this->modelSiswa->update($nisn, $data);
		$this->session->setFlashdata("msg_suc", "Berhasil edit siswa");
		return redirect()->to(base_url('/admin/siswa'));
	}

	public function delete_siswa($nisn)
	{

		$del = $this->modelSiswa->delete($nisn);
		if ($del) {
			$this->session->setFlashdata("msg_suc", "Berhasil hapus siswa");
			return redirect()->to(base_url('/admin/siswa'));
		} else {
			$this->session->setFlashdata("msg_err", "Gagal hapus siswa");
			return redirect()->to(base_url('/admin/siswa'));
		}
	}


	//kelola  kelas
	public function kelas()
	{
		$kelas = $this->modelKelas->findAll();
		$data = ([
			'kelas' => $kelas,
		]);
		return view('admin/kelas', $data);
	}

	public function insert_kelas()
	{
		$nama_kelas = $this->request->getPost('kelas');
		$kompetensi_keahlian = $this->request->getPost('jurusan');

		$data = ([
			"nama_kelas"		=> $nama_kelas,
			"kompetensi_keahlian"	=> $kompetensi_keahlian
		]);

		$add = $this->modelKelas->insert($data);
		if ($add) {
			$this->session->setFlashdata("msg_suc", "Berhasil tambah kelas");
			return redirect()->to(base_url('/admin/kelas'));
		} else {
			$this->session->setFlashdata("msg_err", "Gagal tambah kelas");
			return redirect()->to(base_url('/admin/kelas'));
		}
	}

	public function edit_kelas()
	{
		$id_kelas = $this->request->getPost('id_kelas');
		$nama_kelas = $this->request->getPost('kelas');
		$kompetensi_keahlian = $this->request->getPost('jurusan');

		$data = ([
			"nama_kelas"		=> $nama_kelas,
			"kompetensi_keahlian"	=> $kompetensi_keahlian
		]);

		$add = $this->modelKelas->update($id_kelas, $data);
		if ($add) {
			$this->session->setFlashdata("msg_suc", "Berhasil edit kelas");
			return redirect()->to(base_url('/admin/kelas'));
		} else {
			$this->session->setFlashdata("msg_err", "Gagal edit kelas");
			return redirect()->to(base_url('/admin/kelas'));
		}
	}

	public function delete_kelas($id_kelas)
	{

		$cek = $this->modelSiswa->where('id_kelas', $id_kelas)->first();

		//jika tidak ada kelas yg di pake
		if (!$cek) {
			$del = $this->modelKelas->delete($id_kelas);
			if ($del) {
				$this->session->setFlashdata("msg_suc", "Berhasil hapus kelas");
				return redirect()->to(base_url('/admin/kelas'));
			} else {
				$this->session->setFlashdata("msg_err", "Gagal hapus kelas");
				return redirect()->to(base_url('/admin/kelas'));
			}
		} else {
			$this->session->setFlashdata("msg_war", "Kelas sedang digunakan");
			return redirect()->to(base_url('/admin/kelas'));
		}
	}


	//kelola  data spp
	public function entri_spp()
	{
		$spp = $this->modelSpp->orderBy("tahun", "asc")->findAll();
		$data = ([
			'spp' => $spp
		]);
		return view('admin/entri-spp', $data);
	}

	public function insert_entri_spp()
	{
		$bulan = $this->request->getPost('bulan');
		$tahun = $this->request->getPost('tahun');
		$nominal = $this->request->getPost('nominal');

		$data = ([
			"tahun" => $tahun,
			"bulan" => $bulan,
			"nominal" => $nominal
		]);

		// dd($data);
		$add = $this->modelSpp->insert($data);

		if ($add) {
			$this->session->setFlashdata("msg_suc", "Berhasil tambah entri spp");
			return redirect()->to(base_url('/admin/entri-spp'));
		} else {
			$this->session->setFlashdata("msg_err", "Gagal tambah entri spp");
			return redirect()->to(base_url('/admin/entri-spp'));
		}
	}

	public function edit_entri_spp()
	{
		$id_spp = $this->request->getPost('id_spp');
		$bulan = $this->request->getPost('bulan');
		$tahun = $this->request->getPost('tahun');
		$nominal = $this->request->getPost('nominal');

		$data = ([
			"tahun" => $tahun,
			"bulan" => $bulan,
			"nominal" => $nominal
		]);

		$add = $this->modelSpp->update($id_spp, $data);

		if ($add) {
			$this->session->setFlashdata("msg_suc", "Berhasil edit entri spp");
			return redirect()->to(base_url('/admin/entri-spp'));
		} else {
			$this->session->setFlashdata("msg_err", "Gagal edit entri spp");
			return redirect()->to(base_url('/admin/entri-spp'));
		}
	}

	public function delete_entri_spp($id_spp)
	{

		$cek = $this->modelPembayaran->where('id_spp', $id_spp)->first();

		//jika tidak ada spp sedang di pake
		if (!$cek) {
			$del = $this->modelSpp->delete($id_spp);
			if ($del) {
				$this->session->setFlashdata("msg_suc", "Berhasil hapus entri spp");
				return redirect()->to(base_url('/admin/entri-spp'));
			} else {
				$this->session->setFlashdata("msg_err", "Gagal hapus entri spp");
				return redirect()->to(base_url('/admin/entri-spp'));
			}
		} else {
			$this->session->setFlashdata("msg_war", "Entri Spp sedang digunakan");
			return redirect()->to(base_url('/admin/entri-spp'));
		}
	}


	//data admin dan petugas

	public function data_admin()
	{
		$data['admin'] = $this->modelPetugas->findAll();
		return view('admin/data-admin', $data);
	}

	public function insert_admin()
	{
		$nama_petugas = $this->request->getPost('nama');
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$level = $this->request->getPost('level');

		$data = ([
			"nama_petugas"    => $nama_petugas,
			"username"  => $username,
			"password"  => password_hash($password, PASSWORD_BCRYPT),
			"level" => $level
		]);

		$add = $this->modelPetugas->insert($data);
		if ($add) {
			$this->session->setFlashdata("msg_suc", "Berhasil tambah " . $level);
			return redirect()->to(base_url('/admin/administrator'));
		} else {
			$this->session->setFlashdata("msg_err", "Gagal tambah " . $level);
			return redirect()->to(base_url('/admin/administrator'));
		}
	}

	public function edit_admin()
	{
		$nama_petugas = $this->request->getPost('nama');
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$level = $this->request->getPost('level');
		$id_petugas = $this->request->getPost('id_petugas');

		$data = ([
			"nama_petugas"    => $nama_petugas,
			"username"  => $username,
			"password"  => password_hash($password, PASSWORD_BCRYPT),
			"level" => $level
		]);

		$add = $this->modelPetugas->update($id_petugas, $data);
		if ($add) {
			$this->session->setFlashdata("msg_suc", "Berhasil mengubah " . $level);
			return redirect()->to(base_url('/admin/administrator'));
		} else {
			$this->session->setFlashdata("msg_err", "Gagal mengubah " . $level);
			return redirect()->to(base_url('/admin/administrator'));
		}
	}

	public function delete_petugas($id_petugas)
	{
		$del = $this->modelTbpetugas->delete($id_petugas);
		if ($del) {
			$this->session->setFlashdata("msg_suc", "Berhasil hapus admin/petugas");
			return redirect()->to(base_url('/admin/administrator'));
		} else {
			$this->session->setFlashdata("msg_err", "Gagal hapus admin/petugas");
			return redirect()->to(base_url('/admin/administrator'));
		}
	}
}
