<?php
// App\Http\Controllers\RomanNumeralController.php

namespace App\Http\Controllers;

use App\Http\Resources\RomanNumeralResource;
use App\Models\RomanNumeral;
use App\Services\RomanNumeralService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RomanNumeralController extends Controller
{
    protected RomanNumeralService $romanNumeralService;

    public function __construct(RomanNumeralService $romanNumeralService)
    {
        $this->romanNumeralService = $romanNumeralService;
    }

    public function convert(Request $request): RomanNumeralResource
    {
        $validatedData = $request->validate([
            'number' => 'required|integer|min:1|max:3999',
        ]);

        $number = $validatedData['number'];
        $romanNumeral = $this->romanNumeralService->convertToRomanNumeral($number);

        $romanNumeralModel = RomanNumeral::create([
            'integer_value' => $number,
            'roman_numeral' => $romanNumeral,
        ]);

        return new RomanNumeralResource($romanNumeralModel);
    }

    public function recentConversions(): AnonymousResourceCollection
    {
        $recentConversions = $this->romanNumeralService->getRecentConversions();

        return RomanNumeralResource::collection($recentConversions);
    }

    public function topConversions(): AnonymousResourceCollection
    {
        $topConversions = $this->romanNumeralService->getTopConversions();

        return RomanNumeralResource::collection($topConversions);
    }
}
