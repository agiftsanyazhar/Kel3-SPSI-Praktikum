<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $table    = 'roles';
    protected $guarded  = ['id'];

    public function paa()
    {
        return $this->hasMany(PAA::class, 'nip', 'id');
    }

    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'nid', 'id');
    }
    
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'nim', 'id');
    }
}
