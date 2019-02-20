<?php

namespace FerFabricio\Hydratate\Tests;

class Example
{
    private $test;

    public function setTest($test)
    {
        $this->test = $test;
    }

    public function getTest()
    {
        return $this->test;
    }
}
