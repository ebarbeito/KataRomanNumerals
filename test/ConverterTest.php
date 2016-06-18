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
     * Test the JSON data suite cases.
     */
    public function test_number_to_roman()
    {
        foreach ($this->cases as $symbol => $value) {
            $this->assertEquals($symbol, $this->converter->encode($value));
        }
    }

    public function test_I_should_be_1()
    {
        $this->assertEquals(1, $this->converter->decode('I'));
    }
}
