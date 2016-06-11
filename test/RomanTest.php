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
        foreach ($this->cases as $symbol => $value) {
            $this->assertEquals($symbol, Roman::of($value));
        }
    }

    public function test_12_should_be_XII()
    {
        $this->assertEquals('XII', Roman::of(12));
    }

    public function test_13_should_be_XIII()
    {
        $this->assertEquals('XIII', Roman::of(13));
    }

    public function test_14_should_be_XIV()
    {
        $this->assertEquals('XIV', Roman::of(14));
    }

    public function test_15_should_be_XV()
    {
        $this->assertEquals('XV', Roman::of(15));
    }
}
