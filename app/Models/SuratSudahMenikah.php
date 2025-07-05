<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratSudahMenikah extends Model
{
    use HasFactory;

    protected $table = 'surat_sudah_menikah';

    protected $fillable = [
        'surats_id',
        'nama_pria',
        'nik_pria',
        'tempat_lahir_pria',
        'tanggal_lahir_pria',
        'warga_negara_pria',
        'agama_pria',
        'alamat_pria',
        'nama_wanita',
        'nik_wanita',
        'tempat_lahir_wanita',
        'tanggal_lahir_wanita',
        'warga_negara_wanita',
        'agama_wanita',
        'alamat_wanita',
        'tanggal_pernikahan',
        'alamat_pernikahan',
        'no_telp',
        'email',
    ];

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surats_id');
    }
}
