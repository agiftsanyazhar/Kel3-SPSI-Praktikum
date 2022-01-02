<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dosen extends Model
{
    use HasFactory;

    protected $table    = 'dosens';
    protected $guarded  = ['id'];

    public function bimbingan()
    {
        return $this->hasMany(Bimbingan::class, 'nid', 'id');
    }

    public function pendaftaranSidang()
    {
        return $this->hasMany(Pendaftaran_Sidang::class, 'nid', 'id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'nid');
    }
}
