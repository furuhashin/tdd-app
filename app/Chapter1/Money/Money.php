<?php


namespace App\Chapter1\Money;


class Money implements ExpressionInterface
{
    /**
     * @var int
     * phpのprotectedには同一パッケージ内でのアクセスが許可されていないためpublicに変更
     */
    public int $amount;
    /**
     * @var string
     * phpのprotectedには同一パッケージ内でのアクセスが許可されていないためpublicに変更
     */
    public string $currency;

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
     * @param Money $addend
     * @return ExpressionInterface
     */
    public function plus(Money $addend): ExpressionInterface
    {
        return new Sum($this, $addend);
    }

    /**
     * @param string $to
     * @return Money
     */
    public function reduce(string $to): Money
    {
        return $this;
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
     * @return Money
     */
    public static function dollar(int $amount): Money
    {
        return new Money($amount,"USD");
    }

    /**
     * @param int $amount
     * @return Money
     */
    public static function franc(int $amount): Money
    {
        return new Money($amount,"CHF");
    }
}
