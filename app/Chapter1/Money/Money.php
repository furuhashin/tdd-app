<?php


namespace App\Chapter1\Money;


class Money
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

    /**
     * @param int $multiplier
     * @return Money
     */
    public function times(int $multiplier): Money
    {
        return new Money($this->amount * $multiplier,$this->currency);
    }

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
        // strcmp()は等しければ 0 を返します
        return $this->amount == $money->amount && !strcmp($this->currency(),$money->currency()) ;
    }

    /**
     * @todo 動かないので修正
     * @return string
     */
    public function __toString(): string
    {
        return $this->amount . " " . $this->currency;
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
