<?php

namespace KataRomanNumerals;

class Roman
{
    public static function of ($number)
    {
        $map = [
            1 => 'I',
            4 => 'IV',
            5 => 'V',
            6 => 'VI',
            10 => 'X',
        ];

        if (true === isset($map[$number])) {
            return $map[$number];
        }

        if (4 > $number) {
            return str_repeat('I', $number);
        }
    }
}
