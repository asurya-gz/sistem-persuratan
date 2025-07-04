<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class resident extends Model
{
    protected $table ='residents';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function complaints() {
        return $this->hasMany(Complaint::class);
    }
}
