<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id_user';
    protected $allowedFields    = [
        'nip',
        'nama_lengkap',
        'username',
        'password',
        'email',
        'jabatan',
        'id_role',
        'status_aktif'
    ];
    protected $useTimestamps    = false;
}