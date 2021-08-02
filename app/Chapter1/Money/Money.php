<?php


namespace App\Chapter1\Money;


abstract class Money
{
    /**
     * @var int
     */
    protected $amount;

    abstract function times(int $multiplier);

    /**
     * @param object $object
     * @return bool
     */
    public function equals(object $object): bool
    {
        /** @var Money $money */
        $money = $object;
        return $this->amount == $money->amount && get_class($this) == get_class($money);
    }

    /**
     * @param int $amount
     * @return Dollar
     */
    public static function dollar(int $amount): Dollar
    {
        return new Dollar($amount);
    }

    /**
     * @param int $amount
     * @return Franc
     */
    public static function franc(int $amount): Franc
    {
        return new Franc($amount);
    }
}
