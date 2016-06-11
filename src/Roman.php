<?php

namespace KataRomanNumerals;

class Roman
{
    private static $equivalences = [
      1 => 'I',
      2 => 'II',
      3 => 'III',
      4 => 'IV',
      5 => 'V',
      6 => 'VI',
      7 => 'VII',
      8 => 'VIII',
      9 => 'IX',
      10 => 'X',
      11 => 'XI',
      14 => 'XIV',
    ];

    public static function of($number)
    {
        $result = '';
        $equivalences = self::$equivalences;

        krsort($equivalences);
        foreach ($equivalences as $value => $symbol) {
            if ($number >= $value) {
                $result .= $symbol;
                $number -= $value;
            }
        }

        return $result;
    }
}
