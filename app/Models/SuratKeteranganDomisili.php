<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratKeteranganDomisili extends Model
{
    use HasFactory;

    protected $table = 'surat_keterangan_domisili';

    protected $fillable = [
        'surats_id',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'status_perkawinan',
        'warga_negara',
        'pekerjaan', // kolom tambahan
        'alamat',
        'no_telp',
        'email',
    ];

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surats_id');
    }
}
