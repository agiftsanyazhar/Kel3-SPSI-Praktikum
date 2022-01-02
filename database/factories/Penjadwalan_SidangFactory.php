<?php

namespace Database\Factories;

use App\Models\Penjadwalan_Sidang;
use Illuminate\Database\Eloquent\Factories\Factory;

class Penjadwalan_SidangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Penjadwalan_Sidang::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_nilai'          => mt_rand(1,10),
            'dosen_penguji1'    => $this->faker->name(),
            'dosen_penguji2'    => $this->faker->name(),
            'dosen_penguji3'    => $this->faker->name(),
            'created_at'        => $this->faker->date(now()),
            'updated_at'        => $this->faker->date(now()),
        ];
    }
}
