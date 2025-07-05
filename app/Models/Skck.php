<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skck extends Model
{
    use HasFactory;

    protected $table = 'skck';

    protected $fillable = [
        'surats_id',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
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
