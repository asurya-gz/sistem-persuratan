<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratKeteranganKehilangan extends Model
{
    use HasFactory;

    protected $table = 'surat_keterangan_kehilangan';

    protected $fillable = [
        'surats_id',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'warga_negara',
        'alamat',
        'jenis_kehilangan',
        'no_telp',
        'email',
    ];

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surats_id');
    }
}
