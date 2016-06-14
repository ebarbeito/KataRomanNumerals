<?php

namespace KataRomanNumerals;

class Converter
{
    /**
     * Roman numerals map that encode() relies on.
     *
     * @var Numeral[]
     */
    private $map;

    /**
     * Converter constructor.
     */
    public function __construct()
    {
        $this->map = [
          Numeral::of('I', 1),
          Numeral::of('IV', 4),
          Numeral::of('V', 5),
          Numeral::of('IX', 9),
          Numeral::of('X', 10),
          Numeral::of('XL', 40),
          Numeral::of('L', 50),
          Numeral::of('XC', 90),
          Numeral::of('C', 100),
          Numeral::of('CD', 400),
          Numeral::of('D', 500),
          Numeral::of('CM', 900),
          Numeral::of('M', 1000),
        ];
    }

    /**
     * Encode number to roman representation.
     *
     * @param int $number
     *
     * @return string Number encoded to roman.
     */
    public function encode($number)
    {
        $result = '';
        $list = $this->reverseOrderNumeralList($this->map);

        while (0 < $number) {
            $numeral = $this->findOneByValueInList($list, $number);

            $result .= $numeral->symbol();
            $number -= $numeral->value();
        }

        return $result;
    }

    /**
     * Returns a new numeral array-list reverse ordered
     *
     * @param Numeral[] $list
     *
     * @return Numeral[]
     */
    private function reverseOrderNumeralList(array $list)
    {
        $result = [];

        foreach ($list as $numeral) {
            $key = $numeral->value();

            $result[$key] = $numeral;
        }

        krsort($result);

        return $result;
    }

    /**
     * Find one roman numeral by its value.
     *
     * @param Numeral[] $list
     * @param int $number
     *
     * @return mixed
     *
     * @throws \DomainException
     */
    private function findOneByValueInList(array $list, $number)
    {
        foreach ($list as $value => $numeral) {
            if ($number >= $numeral->value()) {
                return $numeral;
            }
        }

        // theoretically, it does not reach here (not tested)
        throw new \DomainException(
          sprintf('Value "%d" not found in list.', $number)
        );
    }
}
