<?php


namespace App\Chapter1\Money;


class Money
{
    /**
     * @var int
     */
    protected $amount;

    /**
     * @param object $object
     * @return bool
     */
    public function equals(object $object): bool
    {
        /** @var Money $money */
        $money = $object;
        return $this->amount == $money->amount;
    }
}