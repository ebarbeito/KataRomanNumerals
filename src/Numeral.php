<?php

namespace KataRomanNumerals;

class Numeral
{
    /**
     * @var string
     */
    private $symbol;

    /**
     * @var int
     */
    private $value;

    /**
     * Creates a Numeral object from its symbol and value.
     *
     * @param string $symbol
     * @param int $value
     *
     * @return Numeral
     */
    public static function of($symbol, $value)
    {
        return new self($symbol, $value);
    }

    /**
     * Numeral constructor.
     *
     * @param string $symbol
     * @param int $value
     */
    public function __construct($symbol, $value)
    {
        $this
          ->setSymbol($symbol)
          ->setValue($value);
    }

    /**
     * Get symbol.
     *
     * @return string
     */
    public function symbol()
    {
        return $this->symbol;
    }

    /**
     * Get value.
     *
     * @return int
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * Set symbol.
     *
     * @param string $symbol
     *
     * @return Numeral
     */
    private function setSymbol($symbol)
    {
        $this->symbol = $symbol;

        return $this;
    }

    /**
     * Set value.
     *
     * @param int $value
     *
     * @return Numeral
     */
    private function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
