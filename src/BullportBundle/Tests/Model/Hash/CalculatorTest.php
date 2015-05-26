<?php
/**
 * @author Michael Zippe [https://www.xing.com/profile/Michael_Zippe]
 */

namespace BullportBundle\Tests;

use BullportBundle\Model\Hash\Algorithms\Haval256Sha256Hash;
use BullportBundle\Model\Hash\Algorithms\Md5Hash;
use BullportBundle\Model\Hash\Algorithms\Sha256Hash;
use BullportBundle\Model\Hash\Calculator;
use BullportBundle\Model\Hash\Algorithms\HashAlgorithm;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    protected $calculator;

    public function dataProviderHashValuesForMd5()
    {
        return array(
            array('Operative Hektik ersetzt geistige Windstille.', '9b6747008275c7693a08b78487094d39'),
            array(12345, '827ccb0eea8a706c4c34a16891f84e7b'),
            array(null, 'd41d8cd98f00b204e9800998ecf8427e'),
        );
    }

    public function dataProviderHashValuesForSha256()
    {
        return array(
            array('Operative Hektik ersetzt geistige Windstille.', '97b1aa913705d9984c9d6a0049b46229b6ee5cb1be6e64de3e2b7c9ced1a7639'),
            array(12345, '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5'),
            array(null, 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),
        );
    }

    public function dataProviderHashValuesForHavalNestedSha()
    {
        return array(
            array('Operative Hektik ersetzt geistige Windstille.', 'f980d9a80dc0c7c9dfe1eff547c3157d6b1c5b2213cdd0dcf6fdaa8dd654a7a3'),
            array(12345, 'a2f53ed65fcdd93bd486218248cae2437350326c1b62e464bb80581d9a3edbba'),
            array(null, '9148c2a57574712ecb995f2c840f5e5276c22762c2ae91c54d4a143c602cc76c'),
        );
    }

    public function setUp()
    {
        $this->calculator = new Calculator();
    }

    /**
     * @dataProvider dataProviderHashValuesForMd5
     * @param $inputValue
     * @param $expectedResult
     */
    public function testCalculatingMd5($inputValue, $expectedResult)
    {
        $this->calculator->setHashAlgorithm(new Md5Hash());
        $this->assertEquals($expectedResult, $this->calculator->calculateHash($inputValue));
    }

    /**
     * @dataProvider dataProviderHashValuesForSha256
     * @param $inputValue
     * @param $expectedResult
     */
    public function testCalculatingSha256($inputValue, $expectedResult)
    {
        $this->calculator->setHashAlgorithm(new Sha256Hash());
        $this->assertEquals($expectedResult, $this->calculator->calculateHash($inputValue));
    }

    /**
     * @dataProvider dataProviderHashValuesForHavalNestedSha
     * @param $inputValue
     * @param $expectedResult
     */
    public function testCalculatingHaval256NestedSha256($inputValue, $expectedResult)
    {
        $this->calculator->setHashAlgorithm(new Haval256Sha256Hash());
        $this->assertEquals($expectedResult, $this->calculator->calculateHash($inputValue));
    }
}
