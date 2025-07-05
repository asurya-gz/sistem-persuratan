<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratKeteranganUsaha extends Model
{
    use HasFactory;

    protected $table = 'surat_keterangan_usaha';

    protected $fillable = [
        'surats_id',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'status_perkawinan',
        'warga_negara',
        'nama_usaha',
        'omset',
        'penanggung_jawab',
        'jenis_usaha',
        'pekerjaan',
        'alamat_usaha',
        'alamat',
        'no_telp',
        'email',
    ];

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surats_id');
    }
}
