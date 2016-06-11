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
        ];

        if (true === isset($map[$number])) {
            return $map[$number];
        }

        if (4 > $number) {
            return str_repeat('I', $number);
        }

        if (6 === $number) {
            return 'VI';
        }

        return 'IV';
    }
}
