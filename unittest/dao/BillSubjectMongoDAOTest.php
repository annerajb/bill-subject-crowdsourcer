<?php

require_once(dirname(__FILE__).'/../../config/config.php');
require_once 'unittest/TestCaseBase.php';
require_once 'src/service/BillSubjectService.php';
require_once 'src/dao/BillSubjectMongoDAO.php';


class BillSubjectMongoDAOTest extends TestCaseBase
{


    protected function setUp()
    {
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function testConstructorBad()
    {
        $this->setExpectedException('ParameterCheckException');
        $nothing = 'string';
        $dao = new BillSubjectMongoDAO('string',null,null,null);

    }

    public function testConnectToDB()
    {
        $mongo = new BillSubjectMongoDAO("crowd", "source","localhost", "billsubject");
    }

    public function testConnectToDBBad()
    {
        $this->setExpectedException('MongoConnectionException');
        $mongo = new BillSubjectMongoDAO("zzz", "sourcez",
                                                    "localhost", "billSubject");
    }

    public function testAddBillMissingSubject()
    {
        $this->setExpectedException('ParameterCheckException');
        $bill = array();
        $billDAO = new BillSubjectMongoDAO("crowd","source", "localhost", "billsubject");
        $billDAO->addBill($bill);
    }

    public function testAddAndRemoveBill()
    {
        $bill = array('subject' => 'lulz', 'title' => 'titlezz');
        $billDAO = new BillSubjectMongoDAO("crowd","source", "localhost", "billsubject");


        $billDAO->deleteAllBills();
        $bills =  $billDAO->getBills();
        $this->assertEquals(0, count($bills),"there should have been no bills".print_r($bills,TRUE));
        $billDAO->addBill($bill);

        $bills =  $billDAO->getBills();
        $this->assertEquals(1, count($bills),"There should have been one bill".print_r($bills,TRUE));
        $billDAO->deleteAllBills();

    }


    public function testRemoveBill()
    {
        $bill1 = array('subject' => 'omg', 'title' => 'titlezz');
        $bill2 = array('subject' => 'umad', 'title' => 'titlezz');
        $bill3 = array('subject' => 'bro', 'title' => 'titlezz');
        $billDAO = new BillSubjectMongoDAO("crowd","source", "localhost", "billsubject");


        $billDAO->deleteAllBills();
        $bills =  $billDAO->getBills();
        $this->assertEquals(0, count($bills),"there should have been no bills");
        $billDAO->addBill($bill1);
        $billDAO->addBill($bill2);
        $billDAO->addBill($bill3);

        $bills =  $billDAO->getBills();
        $this->assertEquals(3, count($bills),"There should have been three bills");

        $billDAO->deleteBill(array('subject' => 'umad'));
        $billDAO->deleteBill(array('subject' => 'bro'));

        $bills = $billDAO->findBillsBySubject('omg');
        $this->assertEquals($bills[0],$bill1);

        $billDAO->deleteBill(array('subject' => 'omg'));
        $bills =  $billDAO->getBills();
        $this->assertEquals(0, count($bills),"there should have been no bills");

    }



}
