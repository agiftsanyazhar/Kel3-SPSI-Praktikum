<?php

namespace Database\Factories;

use App\Models\Pendaftaran_Sidang;
use Illuminate\Database\Eloquent\Factories\Factory;

class Pendaftaran_SidangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pendaftaran_Sidang::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nid'               => mt_rand(1,10),
            'nim'               => mt_rand(1,10),
            'tgl_daftar_sidang' => $this->faker->date(now()),
            'aktif'             => $this->faker->boolean(),
            'proposal'          => $this->faker->sentence(5),
            'khs'               => $this->faker->sentence(5),
            'toefl'             => $this->faker->sentence(5),
            'created_at'        => $this->faker->date(now()),
            'updated_at'        => $this->faker->date(now()),
        ];
    }
}
