<?php

namespace KataRomanNumerals\Test;

use KataRomanNumerals\Numeral;
use KataRomanNumerals\Numerals;

class NumeralsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Numerals
     */
    private $list;

    /**
     * @inheritDoc
     */
    protected function setUp()
    {
        $this->list = new Numerals();
    }

    public function test_numeral_XLII_should_be_added_to_list()
    {
        $this->list->add($this->aNumeral());

        $this->assertEquals(1, count($this->list));
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

    public function test_list_should_be_array_access()
    {
        $numeral = $this->aNumeral();
        $this->list[] = $numeral;

        $this->assertEquals(1, $this->list->count());

        $this->assertTrue(true === isset($this->list[0]));

        $this->assertSame($numeral, $this->list[0]);

        unset($this->list[0]);

        $this->assertEquals(0, count($this->list));
    }

    /**
     * @return Numeral
     */
    protected function aNumeral()
    {
        return Numeral::of('I', 1);
    }
}
