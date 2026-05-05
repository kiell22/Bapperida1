<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriSuratModel extends Model
{
    protected $table         = 'kategori_surat';
    protected $primaryKey    = 'id_kategori';
    protected $returnType    = 'array';
    protected $allowedFields = ['nama_kategori', 'keterangan'];
    protected $useTimestamps = false;
}