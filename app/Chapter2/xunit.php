<?php

namespace App\Chapter2;

class xunit
{

}

class TestResult
{
    private int $runCount;
    private int $errorCount;

    public function __construct()
    {
        $this->runCount = 0;
        $this->errorCount = 0;
    }

    public function testStarted()
    {
        $this->runCount = $this->runCount + 1;
    }

    public function testFailed()
    {
        $this->errorCount = $this->errorCount + 1;
    }

    public function summary()
    {
        return sprintf("%d run, %d failed", $this->runCount,$this->errorCount);
    }
}

class TestCase
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    protected function setUp()
    {
    }

    protected function tearDown()
    {
    }

    public function run()
    {
        $result = new TestResult();
        $result->testStarted();
        $this->setUp();
        try {
            $method = $this->name;
            $this->$method();
        } catch (\Exception $e) {
            $result->testFailed();
        }
        $this->tearDown();
        return $result;
    }
}

class WasRun extends TestCase
{
    public $log;

    public function setUp()
    {
        $this->log = "setUp";
    }

    protected function testMethod()
    {
        $this->wasRun = 1;
        $this->log = "{$this->log} testMethod";
    }

    protected function testBrokenMethod()
    {
        throw new \Exception();
    }

    protected function tearDown()
    {
        $this->log = "{$this->log} tearDown";
    }
}

class TestCaseTest extends TestCase
{
    public function testTemplateMethod()
    {
        /** @var WasRun $test */
        $test = new WasRun("testMethod");
        $test->run();
        assert("setUp testMethod tearDown" === $test->log);
    }

    public function testResult()
    {
        /** @var WasRun $test */
        $test = new WasRun("testMethod");
        /** @var TestResult $result */
        $result = $test->run();
        assert("1 run, 0 failed" === $result->summary());
    }

    public function testFailedResult()
    {
        /** @var WasRun $test */
        $test = new WasRun("testBrokenMethod");
        /** @var TestResult $result */
        $result = $test->run();
        assert("1 run, 1 failed" === $result->summary());
    }

    public function testFailedResultFormatting()
    {
        /** @var TestResult $result */
        $result = new TestResult();
        $result->testStarted();
        $result->testFailed();
        assert("1 run, 1 failed" === $result->summary());
    }
}

print(ExecuteTest("testTemplateMethod")->summary());
print(ExecuteTest("testResult")->summary());
print(ExecuteTest("testFailedResult")->summary()); //1 run, 0 failedになるのだがいいのか？
print(ExecuteTest("testFailedResultFormatting")->summary()); //1 run, 0 failedになるのだがいいのか？

function ExecuteTest($testCase)
{
    $testCaseTest = new TestCaseTest($testCase);
    return $testCaseTest->run();
}
