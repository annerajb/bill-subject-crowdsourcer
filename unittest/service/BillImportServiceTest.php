<?php

require_once(dirname(__FILE__).'/../../config/config.php');
require_once 'unittest/TestCaseBase.php';
require_once 'src/service/BillyImportService.php';

/**
 * Description of BillyAPIServiceTest
 *
 * @author Javier L. Matías-Cabrera
 */
class BillImportServiceTest extends TestCaseBase
{

    public function __construct($name = NULL, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

    }

    protected function setUp()
    {
    }

    protected function tearDown()
    {
    }


}

?>
