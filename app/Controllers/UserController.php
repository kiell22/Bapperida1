<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RoleModel;

class UserController extends BaseController
{
    protected $userModel;
    protected $roleModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->roleModel = new RoleModel();

        if (!session()->get('logged_in')) {
            redirect()->to('/login')->send();
            exit;
        }

        if (session()->get('nama_role') !== 'admin') {
            redirect()->to('/login')->with('error', 'Akses ditolak. Hanya admin yang boleh membuka halaman ini.')->send();
            exit;
        }
    }

    public function index()
    {
        $data['users'] = $this->userModel
            ->select('users.*, roles.nama_role')
            ->join('roles', 'roles.id_role = users.id_role')
            ->orderBy('users.id_user', 'ASC')
            ->findAll();

        return view('users/index', $data);
    }

    public function create()
    {
        $data['roles'] = $this->roleModel->findAll();
        return view('users/create', $data);
    }

    public function store()
    {
        $this->userModel->save([
            'nip'          => $this->request->getPost('nip'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'username'     => $this->request->getPost('username'),
            'password'     => md5($this->request->getPost('password')),
            'email'        => $this->request->getPost('email'),
            'jabatan'      => $this->request->getPost('jabatan'),
            'id_role'      => $this->request->getPost('id_role'),
            'status_aktif' => $this->request->getPost('status_aktif'),
        ]);

        return redirect()->to('/users')->with('success', 'Data user berhasil ditambahkan');
    }

    public function edit($id = null)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->to('/users')->with('error', 'Data user tidak ditemukan');
        }

        $data['user']  = $user;
        $data['roles'] = $this->roleModel->findAll();

        return view('users/edit', $data);
    }

    public function update($id = null)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->to('/users')->with('error', 'Data user tidak ditemukan');
        }

        $dataUpdate = [
            'nip'          => $this->request->getPost('nip'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'username'     => $this->request->getPost('username'),
            'email'        => $this->request->getPost('email'),
            'jabatan'      => $this->request->getPost('jabatan'),
            'id_role'      => $this->request->getPost('id_role'),
            'status_aktif' => $this->request->getPost('status_aktif'),
        ];

        if ($this->request->getPost('password') != '') {
            $dataUpdate['password'] = md5($this->request->getPost('password'));
        }

        $this->userModel->update($id, $dataUpdate);

        return redirect()->to('/users')->with('success', 'Data user berhasil diupdate');
    }

    public function delete($id = null)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->to('/users')->with('error', 'Data user tidak ditemukan');
        }

        $this->userModel->delete($id);

        return redirect()->to('/users')->with('success', 'Data user berhasil dihapus');
    }
}