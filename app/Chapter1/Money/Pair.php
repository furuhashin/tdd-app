<?php

namespace App\Chapter1\Money;

class Pair
{
    private string $from;
    private string $to;

    /**
     * @param string $from
     * @param string $to
     */
    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * @param object $object
     * @return bool
     */
    public function equals(object $object): bool
    {
        /** @var Pair $pair */
        $pair = $object;
        return (!strcmp($this->from,$pair->from) && !strcmp($this->to,$pair->to));
    }

    /**
     * @return int
     */
    public function hashCode(): int
    {
        return 0;
    }
}
