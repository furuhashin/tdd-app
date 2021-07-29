<?php

namespace App\Chapter1\Money;

class Dollar
{
    /**
     * @var int
     */
    private $amount;

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
    public function times(int $multiplier): Dollar
    {
        return new Dollar($this->amount * $multiplier);
    }

    /**
     * @param object $object
     * @return bool
     */
    public function equals(object $object): bool
    {
        /** @var Dollar $dollar */
        $dollar = $object;
        return $this->amount == $dollar->amount;


    }
}