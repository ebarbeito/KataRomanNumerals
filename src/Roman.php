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

        if (true === isset($map[$number])) {
            return $map[$number];
        }

        return str_repeat('I', $number);
    }
}
