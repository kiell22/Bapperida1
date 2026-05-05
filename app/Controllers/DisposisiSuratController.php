<?php

namespace App\Controllers;

use App\Models\DisposisiSuratModel;
use App\Models\SuratMasukModel;

class DisposisiSuratController extends BaseController
{
    protected $disposisiModel;
    protected $suratMasukModel;

    public function __construct()
    {
        $this->disposisiModel  = new DisposisiSuratModel();
        $this->suratMasukModel = new SuratMasukModel();

        if (!session()->get('logged_in')) {
            redirect()->to('/login')->send();
            exit;
        }
    }

    private function onlyAdmin()
    {
        if (session()->get('nama_role') !== 'admin') {
            return redirect()->to('/disposisi-surat')->with('error', 'Akses ditolak. Hanya admin yang dapat mengelola data.');
        }
        return null;
    }

    public function index()
    {
        $data = [
            'title'     => 'Data Disposisi Surat',
            'pageTitle' => 'Data Disposisi Surat',
            'disposisi' => $this->disposisiModel
                ->select('disposisi_surat.*, surat_masuk.nomor_surat, surat_masuk.asal_surat, surat_masuk.perihal, users.nama_lengkap')
                ->join('surat_masuk', 'surat_masuk.id_surat_masuk = disposisi_surat.id_surat_masuk')
                ->join('users', 'users.id_user = disposisi_surat.dibuat_oleh')
                ->orderBy('disposisi_surat.id_disposisi', 'DESC')
                ->findAll()
        ];

        return view('disposisi_surat/index', $data);
    }

    public function create()
    {
        if ($redirect = $this->onlyAdmin()) return $redirect;

        $data = [
            'title'      => 'Tambah Disposisi Surat',
            'pageTitle'  => 'Tambah Disposisi Surat',
            'suratMasuk' => $this->suratMasukModel->orderBy('id_surat_masuk', 'DESC')->findAll()
        ];

        return view('disposisi_surat/create', $data);
    }

    public function store()
    {
        if ($redirect = $this->onlyAdmin()) return $redirect;

        $this->disposisiModel->save([
            'id_surat_masuk'    => $this->request->getPost('id_surat_masuk'),
            'tanggal_disposisi' => $this->request->getPost('tanggal_disposisi'),
            'tujuan_disposisi'  => $this->request->getPost('tujuan_disposisi'),
            'isi_disposisi'     => $this->request->getPost('isi_disposisi'),
            'sifat_disposisi'   => $this->request->getPost('sifat_disposisi'),
            'status_disposisi'  => $this->request->getPost('status_disposisi'),
            'dibuat_oleh'       => session()->get('id_user'),
        ]);

        return redirect()->to('/disposisi-surat')->with('success', 'Data disposisi surat berhasil ditambahkan');
    }

    public function edit($id = null)
    {
        if ($redirect = $this->onlyAdmin()) return $redirect;

        $disposisi = $this->disposisiModel->find($id);

        if (!$disposisi) {
            return redirect()->to('/disposisi-surat')->with('error', 'Data disposisi tidak ditemukan');
        }

        $data = [
            'title'      => 'Edit Disposisi Surat',
            'pageTitle'  => 'Edit Disposisi Surat',
            'disposisi'  => $disposisi,
            'suratMasuk' => $this->suratMasukModel->orderBy('id_surat_masuk', 'DESC')->findAll()
        ];

        return view('disposisi_surat/edit', $data);
    }

    public function update($id = null)
    {
        if ($redirect = $this->onlyAdmin()) return $redirect;

        $disposisi = $this->disposisiModel->find($id);

        if (!$disposisi) {
            return redirect()->to('/disposisi-surat')->with('error', 'Data disposisi tidak ditemukan');
        }

        $this->disposisiModel->update($id, [
            'id_surat_masuk'    => $this->request->getPost('id_surat_masuk'),
            'tanggal_disposisi' => $this->request->getPost('tanggal_disposisi'),
            'tujuan_disposisi'  => $this->request->getPost('tujuan_disposisi'),
            'isi_disposisi'     => $this->request->getPost('isi_disposisi'),
            'sifat_disposisi'   => $this->request->getPost('sifat_disposisi'),
            'status_disposisi'  => $this->request->getPost('status_disposisi'),
        ]);

        return redirect()->to('/disposisi-surat')->with('success', 'Data disposisi surat berhasil diupdate');
    }

    public function delete($id = null)
    {
        if ($redirect = $this->onlyAdmin()) return $redirect;

        $disposisi = $this->disposisiModel->find($id);

        if (!$disposisi) {
            return redirect()->to('/disposisi-surat')->with('error', 'Data disposisi tidak ditemukan');
        }

        $this->disposisiModel->delete($id);

        return redirect()->to('/disposisi-surat')->with('success', 'Data disposisi surat berhasil dihapus');
    }
}