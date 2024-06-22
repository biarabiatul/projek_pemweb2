<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanAlat extends Model
{
    use HasFactory;

    protected $table = 'peminjaman_alat';

    protected $fillable = [
        'alat_id', 'nama_peminjam', 'nim', 'prodi', 'jumlah_pinjam', 'keperluan', 'jam_pinjam', 'jam_kembali', 'no_hp', 'ruangan_id', 'status'
    ];

    public function ruangan()
    {
        return $this->belongsTo(RuanganModel::class, 'ruangan_id', 'id');
    }

    public function alat()
    {
        return $this->belongsTo(AlatModel::class, 'alat_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
