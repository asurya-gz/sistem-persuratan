<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SuratPenghasilanOrangTua;


class Surat extends Model
{
    use HasFactory;

    protected $table = 'surats';

    protected $fillable = [
        'user_id',
        'jenis_surat',
        'tujuan',
        'keterangan',
        'status',
    ];

    /**
     * Default values
     */
    protected $attributes = [
        'status' => 'diajukan',
    ];

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

public function skck() { return $this->hasOne(Skck::class, 'surats_id'); }
public function sktm() { return $this->hasOne(Sktm::class, 'surats_id'); }
public function suratKeteranganDomisili() { return $this->hasOne(SuratKeteranganDomisili::class, 'surats_id'); }
public function suratKeteranganKehilangan() { return $this->hasOne(SuratKeteranganKehilangan::class, 'surats_id'); }
public function suratKeteranganKematian() { return $this->hasOne(SuratKeteranganKematian::class, 'surats_id'); }
public function suratKeteranganMauMenikah() { return $this->hasOne(SuratKeteranganMauMenikah::class, 'surats_id'); }
public function suratKeteranganPemilikRumah() { return $this->hasOne(SuratKeteranganPemilikRumah::class, 'surats_id'); }
public function suratKeteranganUsaha() { return $this->hasOne(SuratKeteranganUsaha::class, 'surats_id'); }
public function suratPenghasilanOrangTua() { return $this->hasOne(SuratPenghasilanOrangTua::class, 'surats_id'); }
public function suratSudahMenikah() { return $this->hasOne(SuratSudahMenikah::class, 'surats_id'); }

}
