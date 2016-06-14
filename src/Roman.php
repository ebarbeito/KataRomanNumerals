<?php

namespace KataRomanNumerals;

class Roman
{
    private static $equivalences = [
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

    public static function of($number)
    {
        $result = '';
        $equivalences = self::$equivalences;

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
