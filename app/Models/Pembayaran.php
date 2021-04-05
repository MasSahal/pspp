<?php

namespace App\Models;

use CodeIgniter\Model;

class Pembayaran extends Model
{

    protected $table = 'pembayaran';

    protected $primaryKey = "id_pembayaran";

    protected $allowedFields = [
        'id_petugas',
        'nisn',
        'tgl_bayar',
        'bln_dibayar',
        'thn_dibayar',
        'id_spp',
        'jumlah_bayar',
    ];

    protected $returnType = 'object';

    public function getPembayaran($nisn, $id_pembayaran = false)
    {
        if ($id_pembayaran == false) {
            $this->db->table($this->table);
            $this->select('*');
            $this->join('siswa', 'pembayaran.nisn = siswa.nisn');
            $this->join('spp', 'siswa.id_spp = spp.id_spp');
            $this->where('pembayaran.nisn', $nisn);
            $this->orderBy('id_pembayaran', 'ASC');
            return $this->get()->getResultObject();
        } else {
            $this->db->table($this->table);
            $this->select('*');
            $this->join('siswa', 'pembayaran.nisn = siswa.nisn');
            $this->join('spp', 'siswa.id_spp = spp.id_spp');
            $this->where('pembayaran.nisn', $nisn);
            $this->where('pembayaran.id_pembayaran', $id_pembayaran);
            $this->orderBy('id_pembayaran', 'ASC');
            return $this->get()->getRowObject();
        }
    }
}
