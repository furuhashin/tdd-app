<?php

namespace App\Chapter1\Money;

Interface ExpressionInterface
{
    public function plus(ExpressionInterface $added): ExpressionInterface;
    public function reduce(Bank $bank,string $to): Money;
}
