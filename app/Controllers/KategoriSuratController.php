<?php

namespace App\Controllers;

use App\Models\KategoriSuratModel;

class KategoriSuratController extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriSuratModel();

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
            'title'      => 'Data Kategori Surat',
            'pageTitle'  => 'Data Kategori Surat',
            'kategori'   => $this->kategoriModel->orderBy('id_kategori', 'DESC')->findAll()
        ];

        return view('kategori_surat/index', $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Tambah Kategori Surat',
            'pageTitle' => 'Tambah Kategori Surat'
        ];

        return view('kategori_surat/create', $data);
    }

    public function store()
    {
        $this->kategoriModel->save([
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan'    => $this->request->getPost('keterangan')
        ]);

        return redirect()->to('/kategori-surat')->with('success', 'Kategori surat berhasil ditambahkan');
    }

    public function edit($id = null)
    {
        $kategori = $this->kategoriModel->find($id);

        if (!$kategori) {
            return redirect()->to('/kategori-surat')->with('error', 'Data kategori tidak ditemukan');
        }

        $data = [
            'title'     => 'Edit Kategori Surat',
            'pageTitle' => 'Edit Kategori Surat',
            'kategori'  => $kategori
        ];

        return view('kategori_surat/edit', $data);
    }

    public function update($id = null)
    {
        $kategori = $this->kategoriModel->find($id);

        if (!$kategori) {
            return redirect()->to('/kategori-surat')->with('error', 'Data kategori tidak ditemukan');
        }

        $this->kategoriModel->update($id, [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan'    => $this->request->getPost('keterangan')
        ]);

        return redirect()->to('/kategori-surat')->with('success', 'Kategori surat berhasil diupdate');
    }

    public function delete($id = null)
    {
        $kategori = $this->kategoriModel->find($id);

        if (!$kategori) {
            return redirect()->to('/kategori-surat')->with('error', 'Data kategori tidak ditemukan');
        }

        $this->kategoriModel->delete($id);

        return redirect()->to('/kategori-surat')->with('success', 'Kategori surat berhasil dihapus');
    }
}