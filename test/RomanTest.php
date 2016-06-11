<?php

namespace KataRomanNumerals\Test;

use KataRomanNumerals\Roman;

class RomanTest extends \PHPUnit_Framework_TestCase
{
    public function test_arabic_to_roman()
    {
        $data = file_get_contents(sprintf('%s/cases.json', __DIR__));

        foreach (json_decode($data) as $symbol => $number) {
            $this->assertEquals($symbol, Roman::of($number));
        }
    }
}
