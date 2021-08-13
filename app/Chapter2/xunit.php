<?php

namespace App\Chapter2;

class xunit
{

}

class TestCase
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function run()
    {
        $method = $this->name;
        $this->$method();
    }
}

class WasRun extends TestCase
{
    /**
     * @var false
     */
    public bool $wasRun;

    public function __construct($name)
    {
        parent::__construct($name);
        $this->wasRun = false;
    }

    public function testMethod()
    {
        $this->wasRun = 1;
    }
}

class TestCaseTest extends TestCase
{
    public function testRunning()
    {
        $test = new WasRun("testMethod");
        assert($test->wasRun === false);
        $test->run();
        assert($test->wasRun);
    }
}

$testCaseTest = new TestCaseTest("testRunning");
$testCaseTest->run();
