<?php

namespace FerFabricio\Hydratator\Tests;

use FerFabricio\Hydratator\Hydratate;
use PHPUnit\Framework\TestCase;

class HydratateTest extends TestCase
{
    public function testSimpleObject()
    {
        $example = Hydratate::toObject(Example::class, ['test' => 'this is a test']);
        $this->assertSame($example->getTest(), 'this is a test');
    }
}
