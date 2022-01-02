<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table    = 'nilais';
    protected $guarded  = ['id'];

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_nilai', 'id');
    }
}
