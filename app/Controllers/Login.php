<?php

namespace App\Controllers;

use CodeIgniter\Database\Config;

class Login extends BaseController
{

	private $modelPetugas,
		$session,
		$modelSiswa,
		$modelSpp,
		$modelKelas,
		$modelPembayaran,
		$db,
		$modelTbpetugas;

	public function __construct()
	{
		$this->modelPetugas = new \App\Models\Petugas();
		$this->modelTbpetugas = new \App\Models\Tbpetugas();
		$this->modelSiswa = new \App\Models\Siswa();
		$this->modelSpp = new \App\Models\Spp();
		$this->modelPembayaran = new \App\Models\Pembayaran();
		$this->modelKelas = new \App\Models\Kelas();
		$this->session = \Config\Services::session();
		$this->db = \Config\Database::connect();
	}

	public function index()
	{
		return view('login');
	}

	public function login_admin()
	{
		return view('login_admin');
	}



	public function auth_admin()
	{
		$username = $this->request->getPost("username");
		$password = $this->request->getPost("password");

		$cek_data = $this->modelPetugas->where("username", $username)->first();
		if ($cek_data) {

			// cek password
			if (password_verify($password, $cek_data->password)) {

				//cek role login
				if ($cek_data->level == "admin") {
					$data = ([
						'id_petugas' => $cek_data->id_petugas,
						'username' => $cek_data->username,
						'nama_petugas' => $cek_data->nama_petugas,
						'log-in' => TRUE
					]);
					$this->session->set($data);
					return redirect()->to(base_url('/admin/home'));

					//
				} else {
					$data = ([
						'id_petugas' => $cek_data->id_petugas,
						'username' => $cek_data->username,
						'nama_petugas' => $cek_data->nama_petugas,
						'log-in' => TRUE
					]);
					$this->session->set($data);
					return redirect()->to(base_url('/petugas/home'));
				}

				// 
			} else {
				$this->session->setFlashdata("msg", "<script>alert('password salah')</script>");
				return redirect()->to(base_url('/'));
			}

			// 
		} else {
			$this->session->setFlashdata("msg", "<script>alert('username salah')</script>");
			return redirect()->to(base_url('/'));
		}
	}

	public function auth_siswa()
	{
		$nisn = $this->request->getPost('nisn');

		$cek = $this->modelSiswa->where('nisn', $nisn)->first();
		if ($cek) {
			$data = ([
				'nisn' => $cek->nisn,
				'nama' => $cek->nama,
				'log-in' => TRUE
			]);
			$this->session->set($data);
			return redirect()->to(base_url('siswa/home'));
		} else {
			$this->session->setFlashdata("msg_err", "NISN tidak ditemukan");
			return redirect()->to(base_url());
		}
	}


	//halaman siswa
	public function home_siswa()
	{
		if (isset($this->session->nisn)) {

			$data['data_spp'] = $this->modelPembayaran->getPembayaran($this->session->nisn);
			$data['siswa'] = $this->modelSiswa->get_siswa_kelas_id($this->session->nisn);
			// dd($data);

			return view('siswa/home', $data);

			//
		} else {
			$this->session->setFlashdata("msg_err", "Silahkan Login!");
			return redirect()->to(base_url());
		}
	}


	//halaman petugas
	public function home_petugas()
	{
		$riwayat = $this->modelPembayaran->orderBy('tgl_bayar', 'asc')->first();
		$siswa = $this->modelSiswa->where('nisn', $riwayat->nisn)->first();

		$data = ([
			'riwayat' => $riwayat,
			'siswa' => $siswa
		]);
		return view('petugas/home', $data);
	}


	public function pembayaran()
	{
		$data['siswa'] = $this->modelSiswa->getSiswa();
		return view('petugas/data-siswa-spp', $data);
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
		return view('petugas/detail-spp', $data);
	}

	public function print_spp($nisn, $id_pembayaran)
	{
		$data['data'] = $this->modelPembayaran->getPembayaran($nisn, $id_pembayaran);
		$data['kelas'] = $this->modelKelas->findAll();
		// dd($data);
		return view('admin/print-spp', $data);
	}
	//logout
	public function logout()
	{
		session()->destroy();
		return redirect()->to(base_url());
	}
}
