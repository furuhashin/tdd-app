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
        $this->assertEquals(new Dollar(10),$five->times(2));
        $this->assertEquals(new Dollar(15),$five->times(3));
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