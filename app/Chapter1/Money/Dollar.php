<?php

namespace App\Chapter1\Money;

class Dollar extends Money
{
    /**
     * Dollar constructor.
     * @param int $amount
     */
    public function __construct(int $amount,string $currency)
    {
        parent::__construct($amount,$currency);
    }
}
