<?php
namespace App\Exports;

use App\Models\PeminjamanAlat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PeminjamanAlatExport implements FromCollection, WithHeadings
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
        return PeminjamanAlat::whereBetween('jam_pinjam', [$this->tanggalawal, $this->tanggalakhir])->get();
    }

    public function headings(): array
    {
        return [
            'No', 'Nama Alat', 'NIM', 'Prodi', 'Jumlah Pinjam', 'Nama Peminjam', 'Jam Pinjam', 'Jam Kembali', 'No HP', 'Status'
        ];
    }

    public function map($peminjamanAlat): array
    {
        return [
            $peminjamanAlat->id, // Assuming this is the unique identifier
            $peminjamanAlat->nama_alat,
            $peminjamanAlat->nim,
            $peminjamanAlat->prodi,
            $peminjamanAlat->jumlah_pinjam,
            $peminjamanAlat->nama_peminjam,
            $peminjamanAlat->jam_pinjam,
            $peminjamanAlat->jam_kembali,
            $peminjamanAlat->no_hp,
            ucfirst($peminjamanAlat->status),
        ];
    }
}
