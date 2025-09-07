<?php
namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password'];

    // Cari admin berdasarkan username
    public function getByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
}
