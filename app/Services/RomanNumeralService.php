<?php
// App\Services\RomanNumeralService.php

namespace App\Services;

use App\Models\RomanNumeral;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class RomanNumeralService
{
    private array $numeralMap = [
        1000 => 'M', 900 => 'CM', 500 => 'D', 400 => 'CD',
        100 => 'C', 90 => 'XC', 50 => 'L', 40 => 'XL',
        10 => 'X', 9 => 'IX', 5 => 'V', 4 => 'IV', 1 => 'I',
        2 => 'II', 3 => 'III'
    ];

    public function convertToRomanNumeral(int $number): string
    {
        $romanNumeral = '';

        foreach ($this->numeralMap as $integer => $numeral) {
            while ($number >= $integer) {
                $romanNumeral .= $numeral;
                $number -= $integer;
            }
        }

        return $romanNumeral;
    }

    public function getRecentConversions(int $count = 10): Collection
    {
        return RomanNumeral::orderBy('created_at', 'desc')->take($count)->get();
    }

    public function getTopConversions(int $count = 10): Collection
    {
        return RomanNumeral::select('integer_value', 'roman_numeral', DB::raw('count(*) as count', 'created_at', 'updated_at'))
            ->groupBy('integer_value', 'roman_numeral')
            ->orderBy('count', 'desc')
            ->take($count)
            ->get();
    }


    
}
