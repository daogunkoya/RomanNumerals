<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RomanNumeral extends Model
{
    protected $fillable = ['integer_value', 'roman_numeral'];

    public function scopeMostFrequentlyConverted($query)
    {
        return $query->select('integer_value')
                     ->groupBy('integer_value')
                     ->orderByRaw('COUNT(*) DESC')
                     ->limit(10)
                     ->get();
    }

    public function scopeRecentlyConverted($query)
    {
        return $query->orderBy('created_at', 'desc')
                     ->limit(10)
                     ->get();
    }
}
