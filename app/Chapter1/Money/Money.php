<?php


namespace App\Chapter1\Money;


abstract class Money
{
    /** @var int  */
    protected int $amount;
    /** @var string  */
    protected string $currency;

    /**
     * Franc constructor.
     * @param int $amount
     */
    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public abstract function times(int $multiplier);


    /**
     * なんでアクセス修飾子がついていないんだ？
     * @return string
     */
    function currency()
    {
        return $this->currency;
    }

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
        return new Dollar($amount,"USD");
    }

    /**
     * @param int $amount
     * @return Franc
     */
    public static function franc(int $amount): Franc
    {
        return new Franc($amount,"CHF");
    }
}
