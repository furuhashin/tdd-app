<?php

namespace App\Chapter1\Money;

class Sum implements ExpressionInterface
{
    /**
     * @var Money
     * phpにパッケージプライベートがないためpublicにしておく
     */
    public ExpressionInterface $augend;
    public ExpressionInterface $addend;

    /**
     * @param Money $augend
     * @param Money $addend
     */
    public function __construct(ExpressionInterface $augend, ExpressionInterface $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    /**
     * @param ExpressionInterface $addend
     * @return ExpressionInterface
     */
    public function plus(ExpressionInterface $addend): ExpressionInterface
    {
        return new Money(0,'');
    }

    /**
     * @param Bank $bank
     * @param string $to
     * @return Money
     */
    public function reduce(Bank $bank, string $to): Money
    {
        $amount = $this->augend->reduce($bank,$to)->amount + $this->addend->reduce($bank,$to)->amount;
        return new Money($amount, $to);
    }
}
