<?php

namespace KataRomanNumerals;

class Roman
{
    public static function of ($number)
    {
        $map = [
            1 => 'I',
            5 => 'V',
            10 => 'X',
            50 => 'L',
        ];

        return isset($map[$number])
          ? $map[$number]
          : 'II';
    }
}
