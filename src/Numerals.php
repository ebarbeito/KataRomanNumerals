<?php

namespace KataRomanNumerals;

class Numerals extends \ArrayObject
{

    /**
     * Numerals constructor.
     *
     * @param Numeral|Numeral[] ...$numerals
     */
    public function __construct(Numeral ...$numerals)
    {
        parent::__construct($numerals);
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
        $this->append($numeral);

        return $this;
    }

    /**
     * Finds one roman numeral by its value.
     *
     * @param int $number
     *
     * @return Numeral
     *
     * @throws \DomainException
     */
    public function findOneByValue($number)
    {
        /** @var Numeral $numeral */
        foreach ($this->getArrayCopy() as $numeral) {
            if ($number >= $numeral->value()) {
                return $numeral;
            }
        }

        // theoretically, it does not reach here (not tested)
        throw new \DomainException(
            sprintf('Value "%d" not found in list.', $number)
        );
    }

    /**
     * Returns a new numeral list sorted in reverse order.
     *
     * @return Numerals
     */
    public function reverseSort()
    {
        $reversed = array_reverse($this->getArrayCopy());

        return new Numerals(...$reversed);
    }
}
