<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id';
    protected $allowedFields = ['judul', 'penulis', 'penerbit', 'tahun', 'sinopsis', 'cover'];

    public function search($keyword)
    {
        return $this->like('judul', $keyword)
                    ->orLike('penulis', $keyword);
    }
}
