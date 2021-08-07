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
     * @param string $to
     * @return Money
     */
    public function reduce(string $to): Money
    {
        $amount = $this->augend->amount + $this->addend->amount;
        return new Money($amount, $to);
    }
}
