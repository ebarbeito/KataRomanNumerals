<?php

namespace KataRomanNumerals\Test;

use KataRomanNumerals\Roman;

class RomanTest extends \PHPUnit_Framework_TestCase
{
    public function test_1_should_be_I()
    {
        $this->assertEquals('I', Roman::of(1));
    }
}
