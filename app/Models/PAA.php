<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PAA extends Model
{
    use HasFactory;

    protected $table    = 'paas';
    protected $guarded  = ['id'];

    public function bimbingan()
    {
        return $this->hasMany(Bimbingan::class, 'nip', 'id');
    }

    public function pendaftaranSidang()
    {
        return $this->hasMany(Pendaftaran_Sidang::class, 'nip', 'id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'nip');
    }
}
