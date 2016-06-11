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

    public function test_2_should_be_II()
    {
        $this->assertEquals('II', Roman::of(2));
    }

    public function test_3_should_be_III()
    {
        $this->assertEquals('III', Roman::of(3));
    }

    public function test_4_should_be_IV()
    {
        $this->assertEquals('IV', Roman::of(4));
    }

    public function test_6_should_be_VI()
    {
        $this->assertEquals('VI', Roman::of(6));
    }
}
