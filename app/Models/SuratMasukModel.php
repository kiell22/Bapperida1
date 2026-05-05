<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratMasukModel extends Model
{
    protected $table            = 'surat_masuk';
    protected $primaryKey       = 'id_surat_masuk';
    protected $returnType       = 'array';
    protected $useTimestamps    = false;

    protected $allowedFields    = [
        'nomor_agenda',
        'nomor_surat',
        'tanggal_surat',
        'tanggal_diterima',
        'asal_surat',
        'perihal',
        'id_kategori',
        'id_status',
        'sifat_surat',
        'file_surat',
        'keterangan',
        'dibuat_oleh'
    ];
}