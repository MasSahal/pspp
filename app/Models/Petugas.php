<?php namespace App\Models;
use CodeIgniter\Model;
 
class Petugas extends Model
{

    protected $table = 'petugas';

    protected $primaryKey = "id_petugas";
    protected $allowedFields = [
            'username',
            'password',
            'nama_petugas',
            'level'
        ];  
    protected $returnType = 'object'; 
}