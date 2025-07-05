<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratPenghasilanOrangTua extends Model
{
    use HasFactory;

    protected $table = 'surat_penghasilan_orangtua';

    protected $fillable = [
        'surats_id',
        'nik',
        'nama_orangtua',
        'tempat_lahir_orangtua',
        'tanggal_lahir_orangtua',
        'jenis_kelamin_orangtua',
        'pekerjaan_orangtua',
        'alamat_orangtua',
        'nama_anak',
        'tempat_lahir_anak',
        'tanggal_lahir_anak',
        'jenis_kelamin_anak',
        'pekerjaan_anak',
        'alamat_anak',
        'jumlah_penghasilan',
        'no_telp',
        'email',
    ];

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surats_id');
    }
}
