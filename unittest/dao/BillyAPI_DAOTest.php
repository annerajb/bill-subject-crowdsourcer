<?php

require_once(dirname(__FILE__).'/../../config/config.php');
require_once 'unittest/TestCaseBase.php';
require_once 'src/dao/BillyAPI_DAO.php';

/**
 * Description of BillyAPI_DAOTest
 *
 * @author Javier L. Matías-Cabrera
 */
class BillyAPI_DAOTest extends TestCaseBase
{

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
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
        $dao = new BillyAPI_DAO('someUrl','someKey');
    }

    public function testConstructorBad1()
    {
        $this->setExpectedException('ParameterCheckException');
        $dao = new BillyAPI_DAO('','someKey');
    }

    public function testConstructorBad2()
    {
        $this->setExpectedException('ParameterCheckException');
        $dao = new BillyAPI_DAO('someKey','');
    }

    public function testGetAllBills()
    {
        $this->fail('Not yet implemented');
    }

}

?>
