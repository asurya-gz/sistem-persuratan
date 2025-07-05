<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratKeteranganKematian extends Model
{
    use HasFactory;

    protected $table = 'surat_keterangan_kematian';

    protected $fillable = [
        'surats_id',
        'nama',
        'nik',
        'pekerjaan',
        'jenis_kelamin',
        'alamat',
        'tanggal_kematian',
        'waktu_kematian',
        'penyebab_kematian',
        'umur',
        'tempat_kematian',
        'nama_pelapor',
        'hubungan_dengan_meninggal',
        'no_telp',
        'email',
    ];

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surats_id');
    }
}
