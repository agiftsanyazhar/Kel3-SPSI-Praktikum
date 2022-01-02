<?php

namespace Database\Factories;

use App\Models\Dosen;
use Illuminate\Database\Eloquent\Factories\Factory;

class DosenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dosen::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_dosen'        => $this->faker->name(),
            'alamat_dosen'      => $this->faker->address(),
            'hp'                => '+628'.mt_rand(1111111111,9999999999),
            'email'             => $this->faker->unique()->safeEmail(),
            'password'          => $this->faker->password(8,32),
            'created_at'        => $this->faker->date(now()),
            'updated_at'        => $this->faker->date(now()),
        ];
    }
}
