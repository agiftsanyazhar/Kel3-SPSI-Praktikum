<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table    = 'mahasiswas';
    protected $guarded  = ['id'];

    public function bimbingan()
    {
        return $this->hasMany(Bimbingan::class, 'nim', 'id');
    }

    public function pendaftaranSidang()
    {
        return $this->hasMany(Pendaftaran_Sidang::class, 'nim', 'id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'nim');
    }
}
