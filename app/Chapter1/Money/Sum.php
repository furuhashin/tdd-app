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
     * @param int $multiplier
     * @return ExpressionInterface
     */
    public function times(int $multiplier): ExpressionInterface
    {
        return new Sum($this->augend->times($multiplier),$this->addend->times($multiplier));
    }

    /**
     * @param ExpressionInterface $addend
     * @return ExpressionInterface
     */
    public function plus(ExpressionInterface $addend): ExpressionInterface
    {
        return new Sum($this,$addend);
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
