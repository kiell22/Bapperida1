<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['form', 'url']);
    }

    public function login()
    {
        if (session()->get('logged_in')) {
            if (session()->get('nama_role') == 'admin') {
                return redirect()->to('/dashboard/admin');
            } elseif (session()->get('nama_role') == 'pegawai') {
                return redirect()->to('/dashboard/pegawai');
            }
        }

        return view('auth/login');
    }

    public function processLogin()
    {
        $username = $this->request->getPost('username');
        $password = md5($this->request->getPost('password'));

        $user = $this->userModel
            ->select('users.*, roles.nama_role')
            ->join('roles', 'roles.id_role = users.id_role')
            ->where('users.username', $username)
            ->where('users.password', $password)
            ->where('users.status_aktif', 'aktif')
            ->first();

        if ($user) {
            $sessionData = [
                'id_user'      => $user['id_user'],
                'nip'          => $user['nip'],
                'nama_lengkap' => $user['nama_lengkap'],
                'username'     => $user['username'],
                'email'        => $user['email'],
                'jabatan'      => $user['jabatan'],
                'id_role'      => $user['id_role'],
                'nama_role'    => $user['nama_role'],
                'logged_in'    => true
            ];

            session()->set($sessionData);

            if ($user['nama_role'] == 'admin') {
                return redirect()->to('/dashboard/admin')->with('success', 'Login berhasil sebagai Admin');
            } elseif ($user['nama_role'] == 'pegawai') {
                return redirect()->to('/dashboard/pegawai')->with('success', 'Login berhasil sebagai Pegawai');
            } else {
                return redirect()->to('/login')->with('error', 'Role tidak dikenali');
            }
        } else {
            return redirect()->to('/login')->with('error', 'Username atau password salah, atau akun tidak aktif');
        }
    }

    public function adminDashboard()
{
    if (!session()->get('logged_in') || session()->get('nama_role') !== 'admin') {
        return redirect()->to('/login')->with('error', 'Akses ditolak');
    }

    $db = \Config\Database::connect();

    $data = [
        'title'             => 'Dashboard Admin',
        'pageTitle'         => 'Dashboard Admin',
        'totalRole'         => $db->table('roles')->countAllResults(),
        'totalUser'         => $db->table('users')->countAllResults(),
        'totalKategori'     => $db->table('kategori_surat')->countAllResults(),
        'totalStatus'       => $db->table('status_surat')->countAllResults(),
        'totalSuratMasuk'   => $db->table('surat_masuk')->countAllResults(),
        'totalSuratKeluar'  => $db->table('surat_keluar')->countAllResults(),
        'totalDisposisi'    => $db->table('disposisi_surat')->countAllResults(),
    ];

    return view('dashboard/admin', $data);
}

    public function pegawaiDashboard()
{
    if (!session()->get('logged_in') || session()->get('nama_role') !== 'pegawai') {
        return redirect()->to('/login')->with('error', 'Akses ditolak');
    }

    $db = \Config\Database::connect();

    $data = [
        'title'            => 'Dashboard Pegawai',
        'pageTitle'        => 'Dashboard Pegawai',
        'totalSuratMasuk'  => $db->table('surat_masuk')->countAllResults(),
        'totalSuratKeluar' => $db->table('surat_keluar')->countAllResults(),
        'totalDisposisi'   => $db->table('disposisi_surat')->countAllResults(),
    ];

    return view('dashboard/pegawai', $data);
}

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Logout berhasil');
    }
}