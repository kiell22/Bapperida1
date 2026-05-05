<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratKeluarModel extends Model
{
    protected $table         = 'surat_keluar';
    protected $primaryKey    = 'id_surat_keluar';
    protected $returnType    = 'array';
    protected $useTimestamps = false;

    protected $allowedFields = [
        'nomor_agenda',
        'nomor_surat',
        'tanggal_surat',
        'tujuan_surat',
        'perihal',
        'id_kategori',
        'id_status',
        'sifat_surat',
        'file_surat',
        'keterangan',
        'dibuat_oleh'
    ];
}