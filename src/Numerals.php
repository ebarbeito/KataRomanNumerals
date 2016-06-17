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
    public function findTheSmallestGreaterNumber($number)
    {
        $result = null;
        /** @var Numeral $numeral */
        foreach ($this->getArrayCopy() as $numeral) {
            if ($number < $numeral->value()) {
                break;
            }
            $result = $numeral;
        }

        if ($result == null) {
            throw new \DomainException(
                sprintf('Value "%d" not found in list.', $number)
            );
        }

        return $result;
    }
}
