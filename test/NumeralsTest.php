<?php

namespace KataRomanNumerals\Test;

use KataRomanNumerals\Numeral;
use KataRomanNumerals\Numerals;

class NumeralsTest extends \PHPUnit_Framework_TestCase
{
    public function test_numeral_XLII_should_be_added_to_list()
    {
        $xlii = Numeral::of('XLII', 42);
        $list = (new Numerals())
          ->add($xlii);

        $this->assertEquals(1, $list->count());
    }
}
