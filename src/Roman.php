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
