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

    public function test_list_should_be_created_with_variadic_numerals()
    {
        $l1 = new Numerals();

        $l2 = new Numerals(
          Numeral::of('I', 1)
        );

        $l3 = new Numerals(
          Numeral::of('I', 1),
          Numeral::of('II', 2),
          Numeral::of('III', 3)
        );

        $this->assertEquals(0, $l1->count());
        $this->assertEquals(1, $l2->count());
        $this->assertEquals(3, $l3->count());
    }
}
