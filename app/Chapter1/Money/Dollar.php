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
     * @return Dollar
     */
    public function times(int $multiplier)
    {
        return new Dollar($this->amount * $multiplier);
    }
}