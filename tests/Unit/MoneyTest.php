<?php


namespace Tests\Unit;

use App\Chapter1\Money\ExpressionInterface;
use App\Chapter1\Money\Money;
use App\Chapter1\Money\Bank;
use App\Chapter1\Money\Sum;
use PHPUnit\Framework\TestCase;

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
        /**
         * MoneyとDollarを比較していた際、
         * 本当は$this->assertEquals($five->times(2),Money::dollar(10));としたかったが、
         * assertEqualsがMoneyのequals()を使ってくれなかった
         * 以下のように対処
         * $this->assertTrue($five->times(2)->equals(Money::dollar(10)));
         * $this->assertTrue($five->times(3)->equals(Money::dollar(15)));
         * TODO 後でPHPUnitを拡張してみる
         */
        $this->assertEquals($five->times(2),Money::dollar(10));
        $this->assertEquals($five->times(3),Money::dollar(15));
    }

    /**
     * @test
     * @return void
     */
    public function Equality(): void
    {
        /** @var Money $five */
        $five = Money::dollar(5);
        $this->assertTrue($five->equals(Money::dollar(5)));
        /** @var Money $five */
        $five = Money::dollar(5);
        $this->assertFalse($five->equals(Money::dollar(6)));
        /** @var Money $five */
        $five = Money::franc(5);
        $this->assertFalse($five->equals(Money::dollar(5)));
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
    public function SimpleAddtion()
    {
        /** @var Money $five */
        $five = Money::dollar(5);
        $sum = $five->plus($five);
        /** @var Bank $bank */
        $bank = new Bank();
        $reduced = $bank->reduce($sum,"USD");
        $this->assertEquals(Money::dollar(10),$reduced);
    }

    /**
     * @test
     */
    public function PlusReturnsSum()
    {
        /** @var Money $five */
        $five = Money::dollar(5);
        /** @var ExpressionInterface $result */
        $result = $five->plus($five);
        /**
         * @var \Closure $s
         * $sum = (Sum)$result のように独自クラスのキャストができないためこうする
         */
        $s = fn($result): Sum  => $result;
        $sum = $s($result);
        $this->assertEquals($five,$sum->augend);
        $this->assertEquals($five,$sum->addend);
    }

    /**
     * @test
     */
    public function ReduceSum()
    {
        /** @var ExpressionInterface $sum */
        $sum = new Sum(Money::dollar(3),Money::dollar(4));
        $bank = new Bank();
        /** @var Money $result */
        $result = $bank->reduce($sum,"USD");
        $this->assertEquals(Money::dollar(7),$result);
    }

    /**
     * @test
     */
    public function ReduceMoney()
    {
        /** @var Bank $bank */
        $bank = new Bank();
        $result = $bank->reduce(Money::dollar(1),"USD");
        $this->assertEquals(Money::dollar(1),$result);
    }
}
