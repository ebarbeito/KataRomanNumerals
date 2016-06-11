<?php

namespace KataRomanNumerals\Test;

use KataRomanNumerals\Roman;

class RomanTest extends \PHPUnit_Framework_TestCase
{
    public function test_1_should_be_I()
    {
        $this->assertEquals('I', Roman::of(1));
    }

    public function test_5_should_be_V()
    {
        $this->assertEquals('V', Roman::of(5));
    }

    public function test_10_should_be_X()
    {
        $this->assertEquals('X', Roman::of(10));
    }
}
