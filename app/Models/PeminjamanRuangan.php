<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanRuangan extends Model
{
    use HasFactory;

    protected $table = 'peminjaman_ruangan';

    protected $fillable = [
        'nama_peminjam',
        'jumlah_peserta',
        'nama_kegiatan',
        'waktu_mulai',
        'waktu_selesai',
    ];

    public function ruangan()
    {
        return $this->belongsTo(RuanganModel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
