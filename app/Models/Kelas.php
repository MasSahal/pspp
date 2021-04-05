<?php

namespace App\Models;

use CodeIgniter\Model;

class Kelas extends Model
{

    protected $table = 'kelas';

    protected $primaryKey = "id_kelas";

    protected $allowedFields = [
        'nama_kelas',
        'kompetensi_keahlian'
    ];

    protected $returnType = 'object';
}
