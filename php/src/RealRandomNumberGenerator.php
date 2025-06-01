<?php

namespace Application;

class RealRandomNumberGenerator implements RandomNumberGenerator
{

    private int $min = 0;
    private int $max = 0;

    function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    function generate(): int
    {
        return rand($this->min, $this->max);
    }
}