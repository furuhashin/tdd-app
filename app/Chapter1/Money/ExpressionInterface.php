<?php

namespace App\Chapter1\Money;

Interface ExpressionInterface
{
    public function reduce(string $to): Money;
}
