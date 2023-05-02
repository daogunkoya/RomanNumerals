<?php

namespace Database\Factories;

use App\Models\RomanNumeral;
use Illuminate\Database\Eloquent\Factories\Factory;

class RomanNumeralFactory extends Factory
{
    protected $model = RomanNumeral::class;

    public function definition()
    {
        return [
            'integer_value' => $this->faker->numberBetween(1, 3999),
            'roman_numeral' => $this->faker->word,
        ];
    }
}
