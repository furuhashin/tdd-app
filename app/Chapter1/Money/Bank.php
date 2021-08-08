<?php

namespace App\Chapter1\Money;

class Bank
{
    private array $rates = [];
    /**
     * @param ExpressionInterface $source
     * @param string $to
     * @return Money
     */
    function reduce(ExpressionInterface $source, string $to): Money
    {
        return $source->reduce($this, $to);
    }

    /**
     * @param string $from
     * @param string $to
     * @param int $rate
     */
    public function addRate(string $from, string $to, int $rate): void
    {
        /** ハッシュのキーにオブジェクトを格納できなかったのでオブジェクトから一意のハッシュ値を作成して回避 */
        $hash = md5(serialize(new Pair($from, $to)));
        $this->rates[$hash] = $rate;
    }

    /**
     * @param string $from
     * @param string $to
     * @return int
     */
    public function rate(string $from, string $to): int
    {
        if (!strcmp($from,$to)) {
            return 1;
        }
        return $this->rates[md5(serialize(new Pair($from, $to)))];
    }
}
