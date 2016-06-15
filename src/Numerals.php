<?php

namespace KataRomanNumerals;

class Numerals implements \Countable
{

    /**
     * @var Numeral[]
     */
    private $items;

    /**
     * Numerals constructor.
     *
     * @param Numeral ...$numerals
     */
    public function __construct(Numeral ...$numerals)
    {
        $this->items = array_map(function($numeral) {
            return $numeral;
        }, $numerals);
    }

    /**
     * Adds a roman numeral.
     *
     * @param Numeral $numeral
     *
     * @return Numerals
     */
    public function add(Numeral $numeral)
    {
        $this->items[] = $numeral;

        return $this;
    }

    /**
     * Returns the number of items in the list.
     *
     * @return Numeral[]
     */
    public function count()
    {
        return count($this->items);
    }
}
