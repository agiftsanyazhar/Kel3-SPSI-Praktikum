<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjadwalan_Sidang extends Model
{
    use HasFactory;

    protected $table    = 'penjadwalan__sidangs';
    protected $guarded  = ['id'];

    public function detailPenjadwalanSidang()
    {
        return $this->hasMany(Detail_Penjadwalan_Sidang::class, 'id_sidang');
    }

    public function nilai()
    {
        return $this->belongsTo(Nilai::class, 'id_sidang');
    }
}
