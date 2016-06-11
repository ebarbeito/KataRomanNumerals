<?php

namespace KataRomanNumerals;

class Roman
{
    public static function of ($number)
    {
        if (1 === $number) {
            return 'I';
        } elseif (5 === $number) {
            return 'V';
        } else {
            return 'X';
        }
    }
}
