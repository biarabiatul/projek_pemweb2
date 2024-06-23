<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatModel extends Model
{
    use HasFactory;

    protected $table = 'alat';
    protected $fillable = ['nama_alat', 'stok', 'deskripsi'];

    public function peminjamans()
    {
        return $this->hasMany(PeminjamanAlat::class, 'alat_id', 'id');
    }
}
