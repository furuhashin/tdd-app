<?php


namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Chapter1\Money\Dollar;

class MoneyTest extends TestCase
{
    /**
     * @test
     */
    public function Multiplication()
    {
        $five = new Dollar(5);
        $five->times(2);
        $this->assertEquals(10,$five->amount);
    }
}