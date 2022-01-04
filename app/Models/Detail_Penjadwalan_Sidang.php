<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Penjadwalan_Sidang extends Model
{
    use HasFactory;

    protected $table    = 'detail__penjadwalan__sidangs';
    protected $guarded  = ['id'];

    public function pendaftaranSidang()
    {
        return $this->belongsTo(Pendaftaran_Sidang::class, 'id_daftar_sidang', 'id');
    }

    public function penjadwalanSidang()
    {
        return $this->belongsTo(Penjadwalan_Sidang::class, 'id_sidang', 'id');
    }
}
