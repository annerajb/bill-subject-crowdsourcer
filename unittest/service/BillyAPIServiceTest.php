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

    private $prLowerBillsJson;
    private $prUpperBillsJson;

    private function getMockAPI_DAO()
    {
        return $this->getMock('BillyAPI_DAO',
                array('getAllBills'),array('someUrl','someKey'));
    }

    public function __construct($name = NULL, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->prLowerBillsJson = file_get_contents(dirname(__FILE__).'/PR_lower_bills.json');
        $this->prUpperBillsJson = file_get_contents(dirname(__FILE__).'/PR_upper_bills.json');

        $temp = json_decode($this->prUpperBillsJson,FALSE);
        print_r($temp);
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

    public function testFindAllUpperChamberBills()
    {
        $this->fail('Not yet implemented');
    }

    public function testFindAllUpperLowerBills()
    {
        $this->fail('Not yet implemented');
    }


}

?>
