<?php

namespace App\Chapter1\Money;

class Franc extends Money
{
    /**
     * Franc constructor.
     * @param int $amount
     */
    public function __construct(int $amount, string $currency)
    {
        parent::__construct($amount,$currency);
    }

    /**
     * @param int $multiplier
     * @return Money
     */
    public function times(int $multiplier): Money
    {
        return Money::franc($this->amount * $multiplier,null);
    }
}
