<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimbingan extends Model
{
    use HasFactory;

    protected $table    = 'bimbingans';
    protected $guarded  = ['id'];

    public function paa()
    {
        return $this->belongsTo(PAA::class, 'nip', 'id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nid', 'id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'id');
    }
}
