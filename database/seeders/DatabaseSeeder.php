<?php

namespace Database\Seeders;

use App\Models\Bimbingan;
use App\Models\Detail_Penjadwalan_Sidang;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\PAA;
use App\Models\Pendaftaran_Sidang;
use App\Models\Penjadwalan_Sidang;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
        Nilai::factory(10)->create();
        Role::factory(10)->create();
        Penjadwalan_Sidang::factory(10)->create();
        PAA::factory(1)->create();
        Dosen::factory(10)->create();
        Mahasiswa::factory(10)->create();
        Bimbingan::factory(10)->create();
        Pendaftaran_Sidang::factory(10)->create();
        Detail_Penjadwalan_Sidang::factory(10)->create();
    }
}
