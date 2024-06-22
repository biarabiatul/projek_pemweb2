<?php

namespace App\Models;

use App\Http\Controllers\PeminjamanAlatController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatModel extends Model
{
    use HasFactory;
    protected $table = 'alat';
    protected $fillable = ['nama_alat', 'stok', 'deskripsi'];

    public function peminjaman()
    {
        return $this->hasMany(PeminjamanAlatController::class, 'alat_id', 'id');
    }
}
