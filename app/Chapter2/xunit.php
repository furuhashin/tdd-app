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

    protected function setUp()
    {
    }

    protected function tearDown()
    {

    }

    public function run()
    {
        $this->setUp();
        $method = $this->name;
        $this->$method();
        $this->tearDown();
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

    protected function tearDown()
    {
        $this->log = "{$this->log} tearDown";
    }
}

class TestCaseTest extends TestCase
{
    public function testTemplateMethod()
    {
        $test = new WasRun("testMethod");
        $test->run();
        assert("setUp testMethod tearDown" === $test->log);
    }
}

$testCaseTest = new TestCaseTest("testTemplateMethod");
$testCaseTest->run();
