<?php

namespace App\Chapter1\Money;

class Dollar
{
    public $amount;

    /**
     * Dollar constructor.
     */
    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param int $multiplier
     */
    public function times(int $multiplier)
    {
        $this->amount = 5*2;
    }
}