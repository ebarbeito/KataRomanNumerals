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
        } elseif (10 === $number) {
            return 'X';
        } elseif (50 === $number) {
            return 'L';
        }
    }
}
