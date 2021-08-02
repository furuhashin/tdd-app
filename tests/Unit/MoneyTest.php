<?php


namespace Tests\Unit;

use App\Chapter1\Money\Money;
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
        /** @var Money $five */
        $five = Money::dollar(5);
        $this->assertEquals(Money::dollar(10), $five->times(2));
        $this->assertEquals((Money::dollar(15)), $five->times(3));
    }

    /**
     * @test
     * @return void
     */
    public function Equality(): void
    {
        /** @var Dollar $five */
        $five = Money::dollar(5);
        $this->assertTrue($five->equals(Money::dollar(5)));
        /** @var Dollar $five */
        $five = Money::dollar(5);
        $this->assertFalse($five->equals(Money::dollar(6)));

        /** @var Franc $five */
        $five = Money::franc(5);
        $this->assertTrue($five->equals(Money::franc(5)));
        /** @var Franc $five */
        $five = Money::franc(5);
        $this->assertFalse($five->equals(Money::franc(6)));

        /** @var Franc $five */
        $five = Money::franc(5);
        $this->assertFalse($five->equals(Money::dollar(5)));
    }

    /**
     * @test
     * @return void
     */
    public function FrancMultiplication(): void
    {
        /** @var Franc $five */
        $five = Money::franc(5);
        $this->assertEquals(Money::franc(10), $five->times(2));
        $this->assertEquals(Money::franc(15), $five->times(3));
    }
}
