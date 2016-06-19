<?php

namespace KataRomanNumerals\Test;

use KataRomanNumerals\Converter;

class ConverterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test cases.
     *
     * @var array
     */
    private $cases;

    /**
     * @var Converter
     */
    private $converter;

    /**
     * ConverterTest setUp.
     */
    protected function setUp()
    {
        $filepath = sprintf('%s/cases.json', __DIR__);
        $data = @file_get_contents($filepath);

        $this->cases = (false !== $data)
          ? json_decode($data)
          : [];

        $this->converter = new Converter();
    }

    /**
     * Test encode method with JSON data suite cases.
     */
    public function test_number_to_roman()
    {
        foreach ($this->cases as $symbol => $value) {
            $this->assertEquals($symbol, $this->converter->encode($value));
        }
    }

    /**
     * Test decode method with JSON data suite cases.
     */
    public function test_roman_to_number()
    {
        foreach ($this->cases as $symbol => $value) {
            $this->assertEquals($value, $this->converter->decode($symbol));
        }
    }
}
