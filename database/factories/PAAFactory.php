<?php

namespace Database\Factories;

use App\Models\PAA;
use Illuminate\Database\Eloquent\Factories\Factory;

class PAAFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PAA::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_paa'          => 'Zulfa Lutfiah',
            'alamat_paa'        => 'Ds. Pahlawan No. 441, Denpasar 65555, Sulsel',
            'hp'                => '+628'.mt_rand(1111111111,9999999999),
            'email'             => 'paa@gmail.com',
            'password'          => 'password',
        ];
    }
}
