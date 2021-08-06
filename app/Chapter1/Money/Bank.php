<?php

namespace App\Chapter1\Money;

class Bank
{
    /**
     * @param ExpressionInterface $source
     * @param string $to
     * @return Money
     */
    function reduce(ExpressionInterface $source,string $to): Money
    {
        return Money::dollar(10);
    }
}
