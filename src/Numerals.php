<?php

namespace KataRomanNumerals;

class Numerals implements \ArrayAccess, \Countable, \IteratorAggregate
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
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }

    /**
     * Finds one roman numeral by its symbol.
     *
     * @param string $symbol
     *
     * @return Numeral
     *
     * @throws \DomainException
     */
    public function findOneBySymbol($symbol)
    {
        foreach ($this->items as $numeral) {
            if ($symbol === $numeral->symbol()) {
                return $numeral;
            }
        }

        // theoretically, it does not reach here (not tested)
        throw new \DomainException(
          sprintf('Symbol "%s" not found in list.', $symbol)
        );
    }

    /**
     * Finds one roman numeral by its value.
     *
     * @param int $number
     *
     * @return Numeral
     *
     * @throws \DomainException
     */
    public function findOneByValue($number)
    {
        foreach ($this->items as $value => $numeral) {
            if ($number >= $numeral->value()) {
                return $numeral;
            }
        }

        // theoretically, it does not reach here (not tested)
        throw new \DomainException(
          sprintf('Value "%d" not found in list.', $number)
        );
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

    /**
     * Returns a new numeral list sorted in reverse order.
     *
     * @return Numerals
     */
    public function reverseSort()
    {
        $list = [];

        foreach ($this->items as $numeral) {
            $key = $numeral->value();

            $list[$key] = $numeral;
        }

        krsort($list);

        return array_reduce(
          array_values($list),
          function (Numerals $result, Numeral $numeral) {
              return $result->add($numeral);
          }, new Numerals());
    }
}
