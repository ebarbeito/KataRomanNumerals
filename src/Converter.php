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
        $this->map = new Numerals(
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
          Numeral::of('M', 1000)
        );
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
        $list = $this->map->reverseSort();

        while (0 < $number) {
            $numeral = $list->findOneByValue($number);

            $result .= $numeral->symbol();
            $number -= $numeral->value();
        }

        return $result;
    }

    /**
     * Decode roman representation to number.
     *
     * @param string $symbol
     *
     * @return int
     */
    public function decode($symbol)
    {
        $result = 0;
        $list = $this->map->reverseSort();

        foreach ($list as $numeral) {
            if ($symbol === $numeral->symbol()) {
                $result += $numeral->value();
            }
        }

        if (0 === $result) {
            while (0 < strlen($symbol)) {
                $substr = substr($symbol, 0, 1);

                foreach ($list as $numeral) {
                    if ($substr === $numeral->symbol()) {
                        $result += $numeral->value();
                        $symbol = substr($symbol, 1, strlen($symbol));
                        break;
                    }
                }
            }
        }

        return $result;
    }
}
