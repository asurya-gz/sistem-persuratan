<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sktm extends Model
{
    use HasFactory;

    protected $table = 'sktms';

    protected $fillable = [
        'surats_id',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'status_perkawinan',
        'warga_negara',
        'pekerjaan', // kolom baru
        'alamat',
        'no_telp',
        'email',
    ];

    /**
     * Relasi ke Surat
     */
    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surats_id');
    }
}
