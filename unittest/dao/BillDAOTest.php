<?php

require_once(dirname(__FILE__).'/../../config/config.php');
require_once 'PHPUnit/Autoload.php';
require_once 'src/dao/BillDAO.php';

/**
 * Generated by PHPUnit_SkeletonGenerator on 2012-07-19 at 20:38:29.
 */
class BillDAOTest extends PHPUnit_Framework_TestCase
{

    private $mongoDB;
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->mongoDB = $mongoDB = array('username' => 'crowd',  'password' => 'sourcer',
                         'host' => 'localhost', 'databaseName' => 'crowdsourcer');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function testAddBill()
    {

        $mockMongo = $this->getMock('Mongo', array('selectCollection'));
        $mockMongo->expects($this->once())
             ->method('selectCollection')
             ->will($this->returnValue(true))
             ->with($this->equalTo('bills'));

        $billDAO = new BillDAO($mockMongo);
        $billDAO->addBill('lol');
    }

}
