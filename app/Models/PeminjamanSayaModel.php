<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanSayaModel extends Model
{
    protected $table = 'ruangan'; // Nama tabel di database
    // Kolom-kolom yang boleh diisi
    protected $fillable = ['nama', 'jumlah', 'kegiatan', 'waktu_mulai', 'waktu_selesai'];
}
