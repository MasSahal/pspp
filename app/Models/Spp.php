<?php

namespace App\Models;

use CodeIgniter\Model;

class Spp extends Model
{

    protected $table = 'spp';

    protected $primaryKey = 'id_spp';
    protected $allowedFields = [
        'tahun',
        'bulan',
        'nominal'
    ];
    protected $returnType = 'object';
}
