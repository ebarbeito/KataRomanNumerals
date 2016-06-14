<?php

namespace KataRomanNumerals;

class Converter
{
    /**
     * @var Numeral[]
     */
    private $equivalences;

    /**
     * Converter constructor.
     */
    public function __construct()
    {
        $this->equivalences = [
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
        $equivalences = $this->reverseOrderNumeralList($this->equivalences);

        loop_start:
        foreach ($equivalences as $value => $numeral) {
            if ($number >= $numeral->value()) {
                $result .= $numeral->symbol();
                $number -= $numeral->value();
                goto loop_start;
            }
        }

        return $result;
    }

    /**
     * Returns a new numeral array-list reverse ordered
     *
     * @param Numeral[] $numerals
     *
     * @return Numeral[]
     */
    private function reverseOrderNumeralList(array $numerals)
    {
        $result = [];

        foreach ($numerals as $numeral) {
            $key = $numeral->value();

            $result[$key] = $numeral;
        }

        krsort($result);

        return $result;
    }
}
