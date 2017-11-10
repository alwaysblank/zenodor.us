<?php namespace Zenodorus;

use \PHPUnit\Framework\TestCase;

class ArgumentsTest extends TestCase
{
    public function testSimpleArguments()
    {
        $arguments = [
            'hello' => 'there',
            'you' => 'too',
        ];
        $defaults = [
            'hello' => null,
            'you' => null,
            'hello'
        ];
        $expected = [
            'hello' => 'there',
            'you' => 'too',
            'hello',
        ];
        $this->assertEquals($expected, ZenodorusArguments::build($arguments, $defaults)->getAll());
    }

    public function testComplexArguments()
    {
        $arguments = [
            'min-height: 300px' => [
                'width' => 300,
            ],
            'min-height: 600px' => [
                'width' => 600,
                'height' => 400,
            ],
        ];
        $defaults = [
            'min-height: 300px' => [
                'width' => 150,
                'height' => 200,
            ],
            'min-height: 1000px' => [
                'width' => 1000,
                'height' => 800,
            ],
        ];
        $expected = [
            'min-height: 300px' => [
                'width' => 300,
                'height' => 200,
            ],
            'min-height: 600px' => [
                'width' => 600,
                'height' => 400,
            ],
            'min-height: 1000px' => [
                'width' => 1000,
                'height' => 800,
            ],
        ];
        $this->assertEquals($expected, ZenodorusArguments::build($arguments, $defaults)->getAll());
    }
}
