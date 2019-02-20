<?php

namespace FerFabricio\Hydratate\Tests;

use FerFabricio\Hydratate\Hydratate;
use PHPUnit\Framework\TestCase;

class HydratateTest extends TestCase
{
    public function testSimpleObject()
    {
        $example = Hydratate::toObject(Example::class, ['test' => 'this is a test']);
        $this->assertSame($example->getTest(), 'this is a test');
    }
}
