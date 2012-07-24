<?php

require_once 'src/util/ParameterCheck.php';
require_once 'src/util/Object.php';
/**
 * Description of BillyDAO
 *
 * @author Javier L. Matías-Cabrera
 */
class BillyAPI_DAO extends Object
{
    /**
     *
     * @var type
     */
    private $url;

    /**
     *
     * @var type
     */
    private $key;

    public function __construct($url, $key)
    {
        ParamCheck::checkStringParam($url,'url');
        ParamCheck::checkStringParam($key,'key');
        $this->key = $key;
        $this->url = $url;
    }


    public function getAllUpperChamberBills($state)
    {
    }

    public function getAllLowerChamberBills($state)
    {
    }
}

?>
