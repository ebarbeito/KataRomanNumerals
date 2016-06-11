<?php

namespace KataRomanNumerals;

class Roman
{
    public static function of ($number)
    {
        if (1 === $number) {
            return 'I';
        }

        return 'V';
    }
}
