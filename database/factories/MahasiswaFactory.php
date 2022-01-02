<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mahasiswa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_mahasiswa'    => $this->faker->name(),
            'alamat_mahasiswa'  => $this->faker->address(),
            'hp'                => '+628'.mt_rand(1111111111,9999999999),
            'email'             => $this->faker->unique()->safeEmail(),
            'password'          => $this->faker->password(8,32),
            'prodi'             => 'Sistem Informasi',
            'created_at'        => $this->faker->date(now()),
            'updated_at'        => $this->faker->date(now()),
        ];
    }
}
