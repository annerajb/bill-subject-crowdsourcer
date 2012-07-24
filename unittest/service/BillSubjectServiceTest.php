<?php

require_once(dirname(__FILE__).'/../../config/config.php');
require_once 'unittest/TestCaseBase.php';
require_once 'src/service/BillSubjectService.php';
require_once 'src/dao/MongoDatabase.php';


class BillSubjectServiceTest extends TestCaseBase
{


    private function getMockMongo()
    {
        return $this->getMock('Mongo',
                array('selectCollection'),array());
    }

    private function getMockMongDB($mockMongo)
    {
        return $this->getMock('MongoDB',
                array('insert'),array($mockMongo,'mock'));
    }

    private function getMockMongoCollection($mockMongoDB)
    {
        return $this->getMock('MongoCollection',
                array('insert'),array($mockMongoDB,'mock'));
    }

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

    public function testConstructor()
    {
        $dao = new BillSubjectService($this->getMockMongo());
    }
    public function testConstructorBad1()
    {
        $this->setExpectedException('ParameterCheckException');
        $nothing = 'string';
        $dao = new BillSubjectService($nothing);

    }

    public function testConstructorBad2()
    {
        $this->setExpectedException('ParameterCheckException');
        $nothing = NULL;
        $dao = new BillSubjectService($nothing);

    }

    public function testConnectToDB()
    {
        $mongo = MongoDatabase::createMongoDatabase("crowd", "source",
                                                    "localhost", "billsubject");

        $mockMongo = $this->getMockMongo();


    }

    public function testConnectToDBBad()
    {
        $this->setExpectedException('MongoConnectionException');
        $mongo = MongoDatabase::createMongoDatabase("zzz", "sourcez",
                                                    "localhost", "billsubject");
    }

    public function testAddBill()
    {
        $bill = array('subject' => 'lulz');

        $mockMongo = $this->getMockMongo();
        $mockMongoDB = $this->getMockMongDB($mockMongo);
        $mockMongoCollection = $this->getMockMongoCollection($mockMongoDB);

        $mockMongo->expects($this->once())
             ->method('selectCollection')
             ->will($this->returnValue($mockMongoCollection))
             ->with($this->equalTo('bills'));
        $mockMongoCollection->expects($this->once())
             ->method('insert')
             ->will($this->returnValue(true))
             ->with($this->equalTo($bill));

        $billDAO = new BillSubjectService($mockMongo);
        $billDAO->addBill($bill);
    }

    public function testAddBillMissingSubject()
    {
        $bill = array();

        $mockMongo = $this->getMockMongo();
        $mockMongoDB = $this->getMockMongDB($mockMongo);
        $mockMongoCollection = $this->getMockMongoCollection($mockMongoDB);

        $mockMongo->expects($this->never())
             ->method('selectCollection');

        $this->setExpectedException('ParameterCheckException');
        $billDAO = new BillSubjectService($mockMongo);
        $billDAO->addBill($bill);
    }

    public function testUpdateBill()
    {

    }

    public function testRemoveUpdateBill()
    {

    }


    public function testAddUser()
    {
    }

    public function testAddUserBad()
    {

    }

    public function testUpdateUser()
    {

    }

    public function testRemoveUpdateUser()
    {

    }

    public function testAddBillSubjectEntry()
    {

    }

    public function testAddBillSubjectEntryBad()
    {

    }

}
