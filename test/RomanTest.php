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

    public function test_number_to_roman()
    {
        foreach ($this->cases as $symbol => $value) {
            $this->assertEquals($symbol, Roman::of($value));
        }
    }

    public function test_60_should_be_LX()
    {
        $this->assertEquals('LX', Roman::of(60));
    }

    public function test_90_should_be_LX()
    {
        $this->assertEquals('XC', Roman::of(90));
    }

    public function test_400_should_be_CD()
    {
        $this->assertEquals('CD', Roman::of(400));
    }

    public function test_900_should_be_CM()
    {
        $this->assertEquals('CM', Roman::of(900));
    }
}
