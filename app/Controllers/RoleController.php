<?php

namespace App\Controllers;

use App\Models\RoleModel;

class RoleController extends BaseController
{
    protected $roleModel;

    public function __construct()
    {
        $this->roleModel = new RoleModel();
        if (!session()->get('logged_in') || session()->get('nama_role') !== 'admin') {
        exit('Akses ditolak. Hanya admin yang boleh membuka halaman ini.');
    }
    }

    public function index()
    {
        $data['roles'] = $this->roleModel->findAll();
        return view('roles/index', $data);
    }

    public function create()
    {
        return view('roles/create');
    }

    public function store()
    {
        $this->roleModel->save([
            'nama_role' => $this->request->getPost('nama_role')
        ]);

        return redirect()->to('/roles')->with('success', 'Data role berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['role'] = $this->roleModel->find($id);
        return view('roles/edit', $data);
    }

    public function update($id)
    {
        $this->roleModel->update($id, [
            'nama_role' => $this->request->getPost('nama_role')
        ]);

        return redirect()->to('/roles')->with('success', 'Data role berhasil diupdate');
    }

    public function delete($id)
    {
        $this->roleModel->delete($id);
        return redirect()->to('/roles')->with('success', 'Data role berhasil dihapus');
    }
}