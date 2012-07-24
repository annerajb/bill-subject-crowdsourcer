<?php

require_once(dirname(__FILE__).'/../../config/config.php');
require_once 'unittest/TestCaseBase.php';
require_once 'src/service/BillyAPIService.php';

/**
 * Description of BillyAPIServiceTest
 *
 * @author Javier L. Matías-Cabrera
 */
class BillyAPIServiceTest extends TestCaseBase
{
    private function getMockAPI_DAO()
    {
        return $this->getMock('BillyAPI_DAO',
                array('getAllBills'),array('someUrl','someKey'));
    }


    protected function setUp()
    {
    }

    protected function tearDown()
    {
    }

    public function testConstructor()
    {
        $service = new BillyAPIService($this->getMockAPI_DAO());
    }

    public function testConstructorBad()
    {
        $this->setExpectedException('ParameterCheckException');
        $service = new BillyAPIService(NULL);
    }

    public function testFindAllBills()
    {
        $this->fail('Not yet implemented');
    }


}

?>
