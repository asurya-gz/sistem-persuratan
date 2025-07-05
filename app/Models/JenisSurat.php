<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisSurat extends Model
{
    use HasFactory;

    protected $table = 'jenis_surats';

    protected $fillable = [
        'value',
        'name',
    ];
}
