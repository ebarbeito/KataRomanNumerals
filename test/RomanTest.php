<?php

namespace KataRomanNumerals\Test;

use KataRomanNumerals\Roman;

class RomanTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test cases.
     *
     * @var array
     */
    private $cases;

    protected function setUp()
    {
        $filepath = sprintf('%s/cases.json', __DIR__);
        $data = @file_get_contents($filepath);

        $this->cases = (false !== $data)
          ? json_decode($data)
          : [];
    }

    public function test_arabic_to_roman()
    {
        foreach ($this->cases as $symbol => $number) {
            $this->assertEquals($symbol, Roman::of($number));
        }
    }
}
