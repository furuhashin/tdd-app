<?php

namespace App\Chapter1\Money;

class Franc
{
    /**
     * @var int
     */
    private $amount;

    /**
     * Franc constructor.
     * @param int $amount
     */
    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param int $multiplier
     * @return Franc
     */
    public function times(int $multiplier): Franc
    {
        return new Franc($this->amount * $multiplier);
    }

    /**
     * @param Franc $object
     * @return bool
     */
    public function equals(object $object): bool
    {
        /** @var Franc $franc */
        $franc = $object;
        return $this->amount == $franc->amount;


    }
}