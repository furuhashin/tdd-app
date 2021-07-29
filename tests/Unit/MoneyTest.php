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
        /** @var Dollar $product */
        $product = $five->times(2);
        $this->assertEquals(10,$product->amount);
        /** @var Dollar $product */
        $product = $five->times(3);
        $this->assertEquals(15,$product->amount);
    }

    /**
     * @test
     */
    public function Equality()
    {
        $five = new Dollar(5);
        $this->assertTrue($five->equals(new Dollar(5)));
        $five = new Dollar(5);
        $this->assertFalse($five->equals(new Dollar(6)));
    }
}