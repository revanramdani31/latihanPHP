<?php

namespace App\Models;
use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nim', 'nama', 'umur'];

    public function getMahasiswa()
    {
        return $this->findAll();
    }

    public function searchMahasiswa($keyword)
    {
        return $this->like('nama', $keyword)->findAll();
    }
}
