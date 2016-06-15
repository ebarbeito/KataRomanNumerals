<?php

namespace KataRomanNumerals;

class Numerals implements \ArrayAccess, \Countable
{

    /**
     * @var Numeral[]
     */
    private $items;

    /**
     * Numerals constructor.
     *
     * @param Numeral ...$numerals
     */
    public function __construct(Numeral ...$numerals)
    {
        $this->items = array_map(function($numeral) {
            return $numeral;
        }, $numerals);
    }

    /**
     * Adds a roman numeral.
     *
     * @param Numeral $numeral
     *
     * @return Numerals
     */
    public function add(Numeral $numeral)
    {
        $this->items[] = $numeral;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        return true === array_key_exists($offset, $this->items);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return (true === isset($this->items[$offset]))
          ? $this->items[$offset]
          : null;
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        if (null !== $offset) {
            $this->items[$offset] = $value;
        } else {
            $this->items[] = $value;
        }
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }
}
