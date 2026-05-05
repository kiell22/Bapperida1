<?php

namespace App\Models;

use CodeIgniter\Model;

class DisposisiSuratModel extends Model
{
    protected $table         = 'disposisi_surat';
    protected $primaryKey    = 'id_disposisi';
    protected $returnType    = 'array';
    protected $useTimestamps = false;

    protected $allowedFields = [
        'id_surat_masuk',
        'tanggal_disposisi',
        'tujuan_disposisi',
        'isi_disposisi',
        'sifat_disposisi',
        'status_disposisi',
        'dibuat_oleh'
    ];
}