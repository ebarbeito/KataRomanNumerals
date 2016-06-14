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
          1 => Numeral::of('I', 1),
          4 => Numeral::of('IV', 4),
          5 => Numeral::of('V', 5),
          9 => Numeral::of('IX', 9),
          10 => Numeral::of('X', 10),
          40 => Numeral::of('XL', 40),
          50 => Numeral::of('L', 50),
          90 => Numeral::of('XC', 90),
          100 => Numeral::of('C', 100),
          400 => Numeral::of('CD', 400),
          500 => Numeral::of('D', 500),
          900 => Numeral::of('CM', 900),
          1000 => Numeral::of('M', 1000),
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
        $equivalences = $this->equivalences;

        krsort($equivalences);
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
}
