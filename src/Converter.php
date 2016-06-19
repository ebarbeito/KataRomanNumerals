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

        while (0 < strlen($symbol)) {
            $numeral = $this->findNumeralOfTwoOrOneCharacter($list, $symbol);

            $result += $numeral->value();
            $symbol = substr($symbol, strlen($numeral->symbol()), strlen($symbol));
        }

        return $result;
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
            $numeral = $this->findNumeralByValue($list, $number);

            $result .= $numeral->symbol();
            $number -= $numeral->value();
        }

        return $result;
    }

    /**
     * Finds roman numeral looking for two or one character.
     *
     * @param Numerals $list
     * @param string $symbol Roman symbol where look for.
     *
     * @return Numeral
     */
    private function findNumeralOfTwoOrOneCharacter($list, $symbol)
    {
        try {
            $twoCharacters = substr($symbol, 0, 2);
            $result = $list->findOneBySymbol($twoCharacters);
        } catch (\DomainException $ex) {
            $oneCharacter = substr($symbol, 0, 1);
            $result = $list->findOneBySymbol($oneCharacter);
        } finally {
            return $result;
        }
    }

    /**
     * Finds roman numeral by value.
     *
     * @param Numerals $list
     * @param int $value
     *
     * @return Numeral
     */
    private function findNumeralByValue($list, $value)
    {
        return $list->findOneByValue($value);
    }
}
