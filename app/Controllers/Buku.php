<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        if (!session()->get('isLoggedIn')) {
            header('Location: ' . base_url('/auth/login'));
            exit;
        }

        $this->bukuModel = new BukuModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $buku = $this->bukuModel->search($keyword)->paginate(4);
        } else {
            $buku = $this->bukuModel->paginate(4);
        }

        $data = [
            'title' => 'Daftar Buku',
            'buku'  => $buku,
            'pager' => $this->bukuModel->pager
        ];

        return view('buku/index', $data);
    }

    public function create()
    {
        return view('buku/create');
    }

    public function store()
    {
        $file = $this->request->getFile('cover');
        $coverName = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $coverName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/', $coverName);
        }

        $this->bukuModel->save([
            'judul'    => $this->request->getPost('judul'),
            'penulis'  => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun'    => $this->request->getPost('tahun'),
            'sinopsis' => $this->request->getPost('sinopsis'),
            'cover'    => $coverName,
        ]);

        return redirect()->to('/buku');
    }

    public function edit($id)
    {
        $data['buku'] = $this->bukuModel->find($id);

        if (!$data['buku']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Buku tidak ditemukan');
        }

        return view('buku/edit', $data);
    }

    public function update($id)
    {
        $buku = $this->bukuModel->find($id);

        if (!$buku) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Buku tidak ditemukan');
        }

        $data = [
            'judul'    => $this->request->getPost('judul'),
            'penulis'  => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun'    => $this->request->getPost('tahun'),
            'sinopsis' => $this->request->getPost('sinopsis'),
        ];

        // Upload Cover Baru
        $file = $this->request->getFile('cover');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/', $newName);

            // Hapus Cover Lama
            if (!empty($buku['cover'])) {
                $oldPath = FCPATH . 'uploads/' . $buku['cover'];
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $data['cover'] = $newName;
        }

        $this->bukuModel->update($id, $data);

        return redirect()->to('/buku');
    }

    public function delete($id)
    {
        $buku = $this->bukuModel->find($id);

        if (!$buku) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Buku tidak ditemukan');
        }

        // Hapus File Cover
        if (!empty($buku['cover'])) {
            $path = FCPATH . 'uploads/' . $buku['cover'];
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $this->bukuModel->delete($id);
        return redirect()->to('/buku');
    }
}
