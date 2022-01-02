<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran_Sidang extends Model
{
    use HasFactory;

    protected $table    = 'pendaftaran__sidangs';
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

    public function detailPenjadwalanSidang()
    {
        return $this->hasMany(Detail_Penjadwalan_Sidang::class, 'id_daftar_sidang');
    }
}
