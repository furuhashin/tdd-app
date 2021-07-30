<?php


namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Chapter1\Money\Dollar;
use App\Chapter1\Money\Franc;

class MoneyTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function Multiplication(): void
    {
        $five = new Dollar(5);
        $this->assertEquals(new Dollar(10), $five->times(2));
        $this->assertEquals(new Dollar(15), $five->times(3));
    }

    /**
     * @test
     * @return void
     */
    public function Equality(): void
    {
        /** @var Dollar $five */
        $five = new Dollar(5);
        $this->assertTrue($five->equals(new Dollar(5)));
        /** @var Dollar $five */
        $five = new Dollar(5);
        $this->assertFalse($five->equals(new Dollar(6)));

        /** @var Franc $five */
        $five = new Franc(5);
        $this->assertTrue($five->equals(new Franc(5)));
        /** @var Franc $five */
        $five = new Franc(5);
        $this->assertFalse($five->equals(new Franc(6)));

        /** @var Franc $five */
        $five = new Franc(5);
        $this->assertFalse($five->equals(new Dollar(5)));
    }

    /**
     * @test
     * @return void
     */
    public function FrancMultiplication(): void
    {
        /** @var Franc $five */
        $five = new Franc(5);
        $this->assertEquals(new Franc(10), $five->times(2));
        $this->assertEquals(new Franc(15), $five->times(3));
    }
}