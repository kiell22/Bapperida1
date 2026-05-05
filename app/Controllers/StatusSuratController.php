<?php

namespace App\Controllers;

use App\Models\StatusSuratModel;

class StatusSuratController extends BaseController
{
    protected $statusModel;

    public function __construct()
    {
        $this->statusModel = new StatusSuratModel();

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
        $data = [
            'title'     => 'Data Status Surat',
            'pageTitle' => 'Data Status Surat',
            'status'    => $this->statusModel->orderBy('id_status', 'DESC')->findAll()
        ];

        return view('status_surat/index', $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Tambah Status Surat',
            'pageTitle' => 'Tambah Status Surat'
        ];

        return view('status_surat/create', $data);
    }

    public function store()
    {
        $this->statusModel->save([
            'nama_status' => $this->request->getPost('nama_status'),
            'keterangan'  => $this->request->getPost('keterangan')
        ]);

        return redirect()->to('/status-surat')->with('success', 'Status surat berhasil ditambahkan');
    }

    public function edit($id = null)
    {
        $status = $this->statusModel->find($id);

        if (!$status) {
            return redirect()->to('/status-surat')->with('error', 'Data status tidak ditemukan');
        }

        $data = [
            'title'     => 'Edit Status Surat',
            'pageTitle' => 'Edit Status Surat',
            'status'    => $status
        ];

        return view('status_surat/edit', $data);
    }

    public function update($id = null)
    {
        $status = $this->statusModel->find($id);

        if (!$status) {
            return redirect()->to('/status-surat')->with('error', 'Data status tidak ditemukan');
        }

        $this->statusModel->update($id, [
            'nama_status' => $this->request->getPost('nama_status'),
            'keterangan'  => $this->request->getPost('keterangan')
        ]);

        return redirect()->to('/status-surat')->with('success', 'Status surat berhasil diupdate');
    }

    public function delete($id = null)
    {
        $status = $this->statusModel->find($id);

        if (!$status) {
            return redirect()->to('/status-surat')->with('error', 'Data status tidak ditemukan');
        }

        $this->statusModel->delete($id);

        return redirect()->to('/status-surat')->with('success', 'Status surat berhasil dihapus');
    }
}