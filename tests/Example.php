<?php

namespace FerFabricio\Hydratator\Tests;

use FerFabricio\Hydratator\Extract;

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

    public function toArray()
    {
        return Extract::toArray($this);
    }
}
