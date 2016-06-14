<?php

namespace KataRomanNumerals;

class Converter
{
    /**
     * @var array
     */
    private $equivalences;

    /**
     * Converter constructor.
     */
    public function __construct()
    {
        $this->equivalences = [
          1 => 'I',
          4 => 'IV',
          5 => 'V',
          9 => 'IX',
          10 => 'X',
          40 => 'XL',
          50 => 'L',
          90 => 'XC',
          100 => 'C',
          400 => 'CD',
          500 => 'D',
          900 => 'CM',
          1000 => 'M',
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
        foreach ($equivalences as $value => $symbol) {
            if ($number >= $value) {
                $result .= $symbol;
                $number -= $value;
                goto loop_start;
            }
        }

        return $result;
    }
}
