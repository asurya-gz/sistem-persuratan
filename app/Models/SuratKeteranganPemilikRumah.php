<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratKeteranganPemilikRumah extends Model
{
    use HasFactory;

    protected $table = 'surat_keterangan_pemilik_rumah';

    protected $fillable = [
        'surats_id',
        'nik',
        'status_perkawinan',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'warga_negara',
        'pekerjaan',
        'alamat',
        'no_telp',
        'email',
    ];

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surats_id');
    }
}
