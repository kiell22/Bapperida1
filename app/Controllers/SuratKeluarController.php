<?php

namespace App\Controllers;

use App\Models\SuratKeluarModel;
use App\Models\KategoriSuratModel;
use App\Models\StatusSuratModel;

class SuratKeluarController extends BaseController
{
    protected $suratKeluarModel;
    protected $kategoriModel;
    protected $statusModel;

    public function __construct()
    {
        $this->suratKeluarModel = new SuratKeluarModel();
        $this->kategoriModel    = new KategoriSuratModel();
        $this->statusModel      = new StatusSuratModel();

        if (!session()->get('logged_in')) {
            redirect()->to('/login')->send();
            exit;
        }
    }

    private function onlyAdmin()
    {
        if (session()->get('nama_role') !== 'admin') {
            return redirect()->to('/surat-keluar')->with('error', 'Akses ditolak. Hanya admin yang dapat mengelola data.');
        }
        return null;
    }

    public function index()
    {
        $data = [
            'title'       => 'Data Surat Keluar',
            'pageTitle'   => 'Data Surat Keluar',
            'suratKeluar' => $this->suratKeluarModel
                ->select('surat_keluar.*, kategori_surat.nama_kategori, status_surat.nama_status, users.nama_lengkap')
                ->join('kategori_surat', 'kategori_surat.id_kategori = surat_keluar.id_kategori', 'left')
                ->join('status_surat', 'status_surat.id_status = surat_keluar.id_status', 'left')
                ->join('users', 'users.id_user = surat_keluar.dibuat_oleh')
                ->orderBy('surat_keluar.id_surat_keluar', 'DESC')
                ->findAll()
        ];

        return view('surat_keluar/index', $data);
    }

    public function create()
    {
        if ($redirect = $this->onlyAdmin()) return $redirect;

        $data = [
            'title'     => 'Tambah Surat Keluar',
            'pageTitle' => 'Tambah Surat Keluar',
            'kategori'  => $this->kategoriModel->findAll(),
            'status'    => $this->statusModel->findAll(),
        ];

        return view('surat_keluar/create', $data);
    }

    public function store()
    {
        if ($redirect = $this->onlyAdmin()) return $redirect;

        $this->suratKeluarModel->save([
            'nomor_agenda'  => $this->request->getPost('nomor_agenda'),
            'nomor_surat'   => $this->request->getPost('nomor_surat'),
            'tanggal_surat' => $this->request->getPost('tanggal_surat'),
            'tujuan_surat'  => $this->request->getPost('tujuan_surat'),
            'perihal'       => $this->request->getPost('perihal'),
            'id_kategori'   => $this->request->getPost('id_kategori'),
            'id_status'     => $this->request->getPost('id_status'),
            'sifat_surat'   => $this->request->getPost('sifat_surat'),
            'file_surat'    => $this->request->getPost('file_surat'),
            'keterangan'    => $this->request->getPost('keterangan'),
            'dibuat_oleh'   => session()->get('id_user'),
        ]);

        return redirect()->to('/surat-keluar')->with('success', 'Data surat keluar berhasil ditambahkan');
    }

    public function edit($id = null)
    {
        if ($redirect = $this->onlyAdmin()) return $redirect;

        $surat = $this->suratKeluarModel->find($id);

        if (!$surat) {
            return redirect()->to('/surat-keluar')->with('error', 'Data surat keluar tidak ditemukan');
        }

        $data = [
            'title'     => 'Edit Surat Keluar',
            'pageTitle' => 'Edit Surat Keluar',
            'surat'     => $surat,
            'kategori'  => $this->kategoriModel->findAll(),
            'status'    => $this->statusModel->findAll(),
        ];

        return view('surat_keluar/edit', $data);
    }

    public function update($id = null)
    {
        if ($redirect = $this->onlyAdmin()) return $redirect;

        $surat = $this->suratKeluarModel->find($id);

        if (!$surat) {
            return redirect()->to('/surat-keluar')->with('error', 'Data surat keluar tidak ditemukan');
        }

        $this->suratKeluarModel->update($id, [
            'nomor_agenda'  => $this->request->getPost('nomor_agenda'),
            'nomor_surat'   => $this->request->getPost('nomor_surat'),
            'tanggal_surat' => $this->request->getPost('tanggal_surat'),
            'tujuan_surat'  => $this->request->getPost('tujuan_surat'),
            'perihal'       => $this->request->getPost('perihal'),
            'id_kategori'   => $this->request->getPost('id_kategori'),
            'id_status'     => $this->request->getPost('id_status'),
            'sifat_surat'   => $this->request->getPost('sifat_surat'),
            'file_surat'    => $this->request->getPost('file_surat'),
            'keterangan'    => $this->request->getPost('keterangan'),
        ]);

        return redirect()->to('/surat-keluar')->with('success', 'Data surat keluar berhasil diupdate');
    }

    public function delete($id = null)
    {
        if ($redirect = $this->onlyAdmin()) return $redirect;

        $surat = $this->suratKeluarModel->find($id);

        if (!$surat) {
            return redirect()->to('/surat-keluar')->with('error', 'Data surat keluar tidak ditemukan');
        }

        $this->suratKeluarModel->delete($id);

        return redirect()->to('/surat-keluar')->with('success', 'Data surat keluar berhasil dihapus');
    }
}