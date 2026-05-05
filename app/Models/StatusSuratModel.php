<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusSuratModel extends Model
{
    protected $table         = 'status_surat';
    protected $primaryKey    = 'id_status';
    protected $returnType    = 'array';
    protected $allowedFields = ['nama_status', 'keterangan'];
    protected $useTimestamps = false;
}