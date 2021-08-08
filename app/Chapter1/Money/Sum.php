<?php

namespace App\Chapter1\Money;

class Sum implements ExpressionInterface
{
    /**
     * @var Money
     * phpにパッケージプライベートがないためpublicにしておく
     */
    public Money $augend;
    public Money $addend;

    /**
     * @param Money $augend
     * @param Money $addend
     */
    public function __construct(Money $augend, Money $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    /**
     * @param Bank $bank
     * @param string $to
     * @return Money
     */
    public function reduce(Bank $bank, string $to): Money
    {
        $amount = $this->augend->amount + $this->addend->amount;
        return new Money($amount, $to);
    }
}
