<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuanganModel extends Model
{
    use HasFactory;
    protected $table = 'ruangan';
    protected $fillable = ['nama_ruangan', 'kapasitas', 'lokasi', 'deskripsi', 'thumbnail'];
    
}
