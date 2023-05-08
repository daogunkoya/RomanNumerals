<?php

namespace Tests\Services;

use App\Models\RomanNumeral;
use App\Services\RomanNumeralService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RomanNumeralServiceTest extends TestCase
{
    use RefreshDatabase;

    protected RomanNumeralService $romanNumeralService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->romanNumeralService = app(RomanNumeralService::class);
    }

    public function testConvertToRomanNumeral(): void
    {
        $testCases = [
            1 => 'I',
            2 => 'II',
            3 => 'III',
            4 => 'IV',
            5 => 'V',
            6 => 'VI',
            7 => 'VII',
            8 => 'VIII',
            9 => 'IX',
            10 => 'X',
            11 => 'XI',
            12 => 'XII',
            13 => 'XIII',
            14 => 'XIV',
            15 => 'XV',
            16 => 'XVI',
            17 => 'XVII',
            18 => 'XVIII',
            19 => 'XIX',
            20 => 'XX',
            30 => 'XXX',
            40 => 'XL',
            50 => 'L',
            60 => 'LX',
            70 => 'LXX',
            80 => 'LXXX',
            90 => 'XC',
            100 => 'C',
            200 => 'CC',
            300 => 'CCC',
            400 => 'CD',
            500 => 'D',
            600 => 'DC',
            700 => 'DCC',
            800 => 'DCCC',
            900 => 'CM',
            1000 => 'M',
            2000 => 'MM',
            3000 => 'MMM',
            3999 => 'MMMCMXCIX',
        ];

        foreach ($testCases as $integer => $expected) {
            $result = $this->romanNumeralService->convertToRomanNumeral($integer);
            $this->assertSame($expected, $result);
        }
    }

    


    public function testGetRecentConversions()
    {
        $numeral1 = RomanNumeral::create(['integer_value' => 100, 'roman_numeral' => 'C']);
        $numeral2 = RomanNumeral::create(['integer_value' => 200, 'roman_numeral' => 'CC']);
        $numeral3 = RomanNumeral::create(['integer_value' => 300, 'roman_numeral' => 'CCC']);

        $recentConversions = $this->romanNumeralService->getRecentConversions(2);
        $this->assertEquals(2, $recentConversions->count());
        // $this->assertEquals($numeral3->id, $recentConversions->get(0)->id);
        // $this->assertEquals($numeral2->id, $recentConversions->get(1)->id);

        // $recentConversions = $this->romanNumeralService->getRecentConversions(1);
        // $this->assertEquals(1, $recentConversions->count());
        // $this->assertEquals($numeral3->id, $recentConversions->get(0)->id);
    }


    public function testGetTopConversions(): void
{
    // Create some RomanNumerals with the same integer value and count them
    RomanNumeral::create(['integer_value' => 100, 'roman_numeral' => 'C']);
    RomanNumeral::create(['integer_value' => 100, 'roman_numeral' => 'C']);
    RomanNumeral::create(['integer_value' => 100, 'roman_numeral' => 'C']);

    // Create some RomanNumerals with different integer values
    RomanNumeral::create(['integer_value' => 50, 'roman_numeral' => 'L']);
    RomanNumeral::create(['integer_value' => 10, 'roman_numeral' => 'X']);
    RomanNumeral::create(['integer_value' => 10, 'roman_numeral' => 'X']);
    RomanNumeral::create(['integer_value' => 5, 'roman_numeral' => 'V']);

    // Get the top 3 RomanNumerals by count
    $service = new RomanNumeralService();
    $topConversions = $service->getTopConversions(3);

    // Assert that the top 3 RomanNumerals are as expected
    $this->assertEquals(3, $topConversions->count());
    $this->assertEquals('C', $topConversions[0]->roman_numeral);
    $this->assertEquals(100, $topConversions[0]->integer_value);
    $this->assertEquals(3, $topConversions[0]->count);
     $this->assertEquals('X', $topConversions[1]->roman_numeral);
     $this->assertEquals(10, $topConversions[1]->integer_value);
     $this->assertEquals(2, $topConversions[1]->count);
     $this->assertEquals('L', $topConversions[2]->roman_numeral);
     $this->assertEquals(50, $topConversions[2]->integer_value);
     $this->assertEquals(1, $topConversions[2]->count);
}


    

}