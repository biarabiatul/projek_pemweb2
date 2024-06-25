<?php

namespace App\Exports;

use App\Models\PeminjamanRuangan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PeminjamanRuanganExport implements FromCollection, WithHeadings
{
    protected $tanggalawal;
    protected $tanggalakhir;

    public function __construct($tanggalawal, $tanggalakhir)
    {
        $this->tanggalawal = $tanggalawal;
        $this->tanggalakhir = $tanggalakhir;
    }

    public function collection()
    {
        return PeminjamanRuangan::whereBetween('waktu_mulai', [$this->tanggalawal, $this->tanggalakhir])->get();
    }

    public function headings(): array
    {
        return [
            'No', 'Nama', 'Jumlah', 'Kegiatan', 'Waktu Mulai', 'Waktu Selesai', 'Status'
        ];
    }

    public function map($peminjamanRuangan): array
    {
        return [
            $peminjamanRuangan->id, // Assuming this is the unique identifier
            $peminjamanRuangan->nama_peminjam,
            $peminjamanRuangan->jumlah_peserta,
            $peminjamanRuangan->nama_kegiatan,
            $peminjamanRuangan->waktu_mulai,
            $peminjamanRuangan->waktu_selesai,
            $peminjamanRuangan->nama_ruangan,
            ucfirst($peminjamanRuangan->status),
        ];
    }
}
