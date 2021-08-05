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
        $this->assertTrue($five->times(2)->equals(Money::dollar(10)));
        $this->assertTrue($five->times(3)->equals(Money::dollar(15)));
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
        /**
         * 本当は$this->assertEquals($five->times(2),Money::franc(10));としたかったが、
         * assertEqualsがMoneyのequals()を使ってくれないので仕方なくこうした
         * TODO 後でPHPUnitを拡張してみる
         */
        $this->assertTrue($five->times(2)->equals(Money::franc(10)));
        $this->assertTrue($five->times(3)->equals(Money::franc(15)));
    }

    /**
     * @test
     */
    public function Currency()
    {
        $dollar = Money::dollar(1);
        $franc = Money::franc(1);
        $this->assertEquals("USD",$dollar->currency());
        $this->assertEquals("CHF",$franc->currency());
    }

    /**
     * @test
     */
    public function DifferentClassEquality()
    {
        $franc = new Money(10,"CHF");
        $this->assertTrue($franc->equals(new Franc(10,"CHF")));
    }
}
