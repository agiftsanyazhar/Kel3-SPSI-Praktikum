<?php

namespace Database\Factories;

use App\Models\Nilai;
use Illuminate\Database\Eloquent\Factories\Factory;

class NilaiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Nilai::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nilai_presentasi'              => mt_rand(1,100)/10,
            'nilai_buku_proposal'           => mt_rand(1,100)/10,
            'nilai_ide_inovasi_proposal'    => mt_rand(1,100)/10,
            'total_nilai'                   => mt_rand(1,100)/10,
            'created_at'                    => $this->faker->date(now()),
            'updated_at'                    => $this->faker->date(now()),
        ];
    }
}
