<?php

namespace App\Controllers;

use App\Models\SuratMasukModel;
use App\Models\KategoriSuratModel;
use App\Models\StatusSuratModel;

class SuratMasukController extends BaseController
{
    protected $suratMasukModel;
    protected $kategoriModel;
    protected $statusModel;

    public function __construct()
    {
        $this->suratMasukModel = new SuratMasukModel();
        $this->kategoriModel   = new KategoriSuratModel();
        $this->statusModel     = new StatusSuratModel();

        if (!session()->get('logged_in')) {
            redirect()->to('/login')->send();
            exit;
        }
    }

    private function onlyAdmin()
    {
        if (session()->get('nama_role') !== 'admin') {
            return redirect()->to('/surat-masuk')->with('error', 'Akses ditolak. Hanya admin yang dapat mengelola data.');
        }
        return null;
    }

    public function index()
    {
        $data = [
            'title'      => 'Data Surat Masuk',
            'pageTitle'  => 'Data Surat Masuk',
            'suratMasuk' => $this->suratMasukModel
                ->select('surat_masuk.*, kategori_surat.nama_kategori, status_surat.nama_status, users.nama_lengkap')
                ->join('kategori_surat', 'kategori_surat.id_kategori = surat_masuk.id_kategori', 'left')
                ->join('status_surat', 'status_surat.id_status = surat_masuk.id_status', 'left')
                ->join('users', 'users.id_user = surat_masuk.dibuat_oleh')
                ->orderBy('surat_masuk.id_surat_masuk', 'DESC')
                ->findAll()
        ];

        return view('surat_masuk/index', $data);
    }

    public function create()
    {
        if ($redirect = $this->onlyAdmin()) return $redirect;

        $data = [
            'title'     => 'Tambah Surat Masuk',
            'pageTitle' => 'Tambah Surat Masuk',
            'kategori'  => $this->kategoriModel->findAll(),
            'status'    => $this->statusModel->findAll(),
        ];

        return view('surat_masuk/create', $data);
    }

    public function store()
    {
        if ($redirect = $this->onlyAdmin()) return $redirect;

        $this->suratMasukModel->save([
            'nomor_agenda'     => $this->request->getPost('nomor_agenda'),
            'nomor_surat'      => $this->request->getPost('nomor_surat'),
            'tanggal_surat'    => $this->request->getPost('tanggal_surat'),
            'tanggal_diterima' => $this->request->getPost('tanggal_diterima'),
            'asal_surat'       => $this->request->getPost('asal_surat'),
            'perihal'          => $this->request->getPost('perihal'),
            'id_kategori'      => $this->request->getPost('id_kategori'),
            'id_status'        => $this->request->getPost('id_status'),
            'sifat_surat'      => $this->request->getPost('sifat_surat'),
            'file_surat'       => $this->request->getPost('file_surat'),
            'keterangan'       => $this->request->getPost('keterangan'),
            'dibuat_oleh'      => session()->get('id_user'),
        ]);

        return redirect()->to('/surat-masuk')->with('success', 'Data surat masuk berhasil ditambahkan');
    }

    public function edit($id = null)
    {
        if ($redirect = $this->onlyAdmin()) return $redirect;

        $surat = $this->suratMasukModel->find($id);

        if (!$surat) {
            return redirect()->to('/surat-masuk')->with('error', 'Data surat masuk tidak ditemukan');
        }

        $data = [
            'title'     => 'Edit Surat Masuk',
            'pageTitle' => 'Edit Surat Masuk',
            'surat'     => $surat,
            'kategori'  => $this->kategoriModel->findAll(),
            'status'    => $this->statusModel->findAll(),
        ];

        return view('surat_masuk/edit', $data);
    }

    public function update($id = null)
    {
        if ($redirect = $this->onlyAdmin()) return $redirect;

        $surat = $this->suratMasukModel->find($id);

        if (!$surat) {
            return redirect()->to('/surat-masuk')->with('error', 'Data surat masuk tidak ditemukan');
        }

        $this->suratMasukModel->update($id, [
            'nomor_agenda'     => $this->request->getPost('nomor_agenda'),
            'nomor_surat'      => $this->request->getPost('nomor_surat'),
            'tanggal_surat'    => $this->request->getPost('tanggal_surat'),
            'tanggal_diterima' => $this->request->getPost('tanggal_diterima'),
            'asal_surat'       => $this->request->getPost('asal_surat'),
            'perihal'          => $this->request->getPost('perihal'),
            'id_kategori'      => $this->request->getPost('id_kategori'),
            'id_status'        => $this->request->getPost('id_status'),
            'sifat_surat'      => $this->request->getPost('sifat_surat'),
            'file_surat'       => $this->request->getPost('file_surat'),
            'keterangan'       => $this->request->getPost('keterangan'),
        ]);

        return redirect()->to('/surat-masuk')->with('success', 'Data surat masuk berhasil diupdate');
    }

    public function delete($id = null)
    {
        if ($redirect = $this->onlyAdmin()) return $redirect;

        $surat = $this->suratMasukModel->find($id);

        if (!$surat) {
            return redirect()->to('/surat-masuk')->with('error', 'Data surat masuk tidak ditemukan');
        }

        $this->suratMasukModel->delete($id);

        return redirect()->to('/surat-masuk')->with('success', 'Data surat masuk berhasil dihapus');
    }
}