<?php

namespace App\Chapter1\Money;

class Dollar
{
    public $amount;

    /**
     * Dollar constructor.
     * @param int $amount
     */
    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param int $multiplier
     * @return Dollar
     */
    public function times(int $multiplier) : Dollar
    {
        return new Dollar($this->amount * $multiplier);
    }
}