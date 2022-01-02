<?php

namespace Database\Factories;

use App\Models\Detail_Penjadwalan_Sidang;
use Illuminate\Database\Eloquent\Factories\Factory;

class Detail_Penjadwalan_SidangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Detail_Penjadwalan_Sidang::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_sidang'         => mt_rand(1,10),
            'id_daftar_sidang'  => mt_rand(1,10),
            'tgl_sidang'        => $this->faker->date(now()),
            'ruang_sidang'      => $this->faker->sentence(1),
            'jam_sidang'        => $this->faker->time(now()),
        ];
    }
}
