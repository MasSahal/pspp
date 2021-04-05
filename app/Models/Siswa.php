<?php

namespace App\Models;

use CodeIgniter\Model;

class Siswa extends Model
{

    protected $table = 'siswa';

    protected $primaryKey = 'nisn';
    protected $allowedFields = [
        'nisn',
        'nis',
        'nama',
        'id_kelas',
        'alamat',
        'no_telp',
        'id_spp'
    ];
    protected $returnType = 'object';


    public function get_siswa_kelas()
    {
        return $this->db->table('siswa')
            ->join('kelas', 'siswa.id_kelas=kelas.id_kelas')
            ->get()->getResultArray();
    }

    public function get_siswa_kelas_id($nisn)
    {
        return $this->db->table('siswa')
            ->join('kelas', 'siswa.id_kelas=kelas.id_kelas')
            ->where('siswa.nisn', $nisn)
            ->get()->getRowObject();
    }

    public function getSiswa()
    {
        $this->db->table($this->table);
        $this->select('*');
        $this->join('kelas', 'siswa.id_kelas=kelas.id_kelas');
        $this->join('spp', 'siswa.id_spp=spp.id_spp');
        $this->orderBy('nisn', 'ASC');
        return $this->get()->getResultObject();
    }

    // public function cek_kelas()
    // {
    //     // $this->db->table($this->table);
    //     // $this->select('siswa.id_kelas, kelas.id_kelas');
    //     // $this->from($this->table);
    //     // $this->join('kelas', 'siswa.id_kelas = kelas.id_kelas');

    //     $this->query('SELECT nama_kelas FROM kelas INNER JOIN siswa ON kelas.id_kelas = siswa.id_kelas');
    //     return $this->get()->getResultObject();
    // }
}
