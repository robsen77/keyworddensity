<?php
use Robsen77\KeywordDensity\Validator\Url\Validator;
use Robsen77\KeywordDensity\Validator\ValidatorChain;

class ValidatorChainTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ValidatorChain
     */
    private $chain;
    private $testParam = "Dummy";

    public function setUp()
    {
        $this->chain = new ValidatorChain();
        for ($x = 0; $x < 3; $x++) {
            $this->chain->attach($this->getMockedValidator(true));
        }
    }

    public function testChainSuccess()
    {
        $this->assertTrue($this->chain->validate($this->testParam));
    }

    public function testChainFirstValidatorFails()
    {
        $chain = new ValidatorChain();
        $chain->attach($this->getMockedValidator(false));
        $chain->addAll($this->chain);

        $this->assertFalse($chain->validate($this->testParam));
    }

    public function testChainLastValidatorFails()
    {
        $this->chain->attach($this->getMockedValidator(false));
        $this->assertFalse($this->chain->validate($this->testParam));
    }

    private function getMockedValidator($returnValue = true)
    {
        $instance = $this->getMock('Validator', array("validate"));
        $instance->expects($this->any())
            ->method('validate')
            ->with($this->equalTo($this->testParam))
            ->will($this->returnValue($returnValue));

        return $instance;
    }
}