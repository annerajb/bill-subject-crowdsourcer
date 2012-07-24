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
                array('getAllUpperChamberBills','getAllLowerChamberBills'),array('someUrl','someKey'));
    }

    public function __construct($name = NULL, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->prLowerBillsJson = json_decode(file_get_contents(dirname(__FILE__)
                .'/PR_lower_bills.json'),TRUE);
        $this->prUpperBillsJson = json_decode(file_get_contents(dirname(__FILE__)
                .'/PR_upper_bills.json'),TRUE);

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

        $mockDAO = $this->getMockAPI_DAO();
        $mockDAO->expects($this->exactly(2))
             ->method('getAllUpperChamberBills')
             ->will($this->returnValue($this->prUpperBillsJson))
             ->with($this->equalTo('pr'));


        $billy = new BillyAPIService($mockDAO);
        $bills = $billy->findAllUpperChamberBills('pr');
        $this->assertEquals(array_slice($this->prUpperBillsJson,0,25), $bills);
        $bills = $billy->findAllUpperChamberBills('pr',25,50);
        $this->assertEquals(array_slice($this->prUpperBillsJson,25,50), $bills);

    }

    public function testFindAllUpperLowerBills()
    {
        $mockDAO = $this->getMockAPI_DAO();
        $mockDAO->expects($this->exactly(2))
             ->method('getAllLowerChamberBills')
             ->will($this->returnValue($this->prLowerBillsJson))
             ->with($this->equalTo('pr'));

        $billy = new BillyAPIService($mockDAO);
        $bills = $billy->findAllLowerChamberBills('pr');
        $this->assertEquals(array_slice($this->prLowerBillsJson,0,25), $bills);
        $bills = $billy->findAllLowerChamberBills('pr',25,50);
        $this->assertEquals(array_slice($this->prLowerBillsJson,25,50), $bills);

    }


}

?>
