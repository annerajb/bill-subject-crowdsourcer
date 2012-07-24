<?php
require_once(dirname(__FILE__).'/../config/config.php');
require_once 'PHPUnit/Autoload.php';

/**
 * Description of TestCase
 *
 * @author Javier L. Matías-Cabrera
 */
abstract class TestCaseBase extends PHPUnit_Framework_TestCase
{

    protected $errorReporting;
    public function __construct($name = NULL, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->errorReporting = ini_get('display_errors');
        ini_set('display_errors','E_ALL');
    }


    public function __destruct()
    {
        ini_set('display_errors',$this->errorReporting);
    }
}

?>
