<?php

namespace Database\Factories;

use App\Models\Bimbingan;
use Illuminate\Database\Eloquent\Factories\Factory;

class BimbinganFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bimbingan::class;

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
            'tgl_konsultasi'    => $this->faker->date(now()),
            'materi_konsultasi' => $this->faker->sentence(5),
            'status_bimbingan'  => $this->faker->sentence(2),
            'bukti_bimbingan'   => $this->faker->sentence(3),
            'created_at'        => $this->faker->date(now()),
            'updated_at'        => $this->faker->date(now()),
        ];
    }
}
