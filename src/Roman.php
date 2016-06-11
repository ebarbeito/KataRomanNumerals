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

        switch ($number) {
            case 4: return 'IV';
            case 6: return 'VI';
        }
    }
}
