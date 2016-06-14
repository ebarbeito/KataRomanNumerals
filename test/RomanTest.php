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

    public function test_19_should_be_XIX()
    {
        $this->assertEquals('XIX', Roman::of(19));
    }

    public function test_20_should_be_XX()
    {
        $this->assertEquals('XX', Roman::of(20));
    }

    public function test_24_should_be_XXIV()
    {
        $this->assertEquals('XXIV', Roman::of(24));
    }

    public function test_29_should_be_XXIX()
    {
        $this->assertEquals('XXIX', Roman::of(29));
    }

    public function test_30_should_be_XXX()
    {
        $this->assertEquals('XXX', Roman::of(30));
    }

    public function test_34_should_be_XXX()
    {
        $this->assertEquals('XXXIV', Roman::of(34));
    }

    public function test_39_should_be_XXXIX()
    {
        $this->assertEquals('XXXIX', Roman::of(39));
    }

    public function test_40_should_be_XL()
    {
        $this->assertEquals('XL', Roman::of(40));
    }
}
