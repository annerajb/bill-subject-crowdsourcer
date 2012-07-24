<?php

require_once 'src/util/ParameterCheck.php';
/**
 * Description of BillyDAO
 *
 * @author Javier L. Matías-Cabrera
 */
class BillyAPI_DAO
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
        ParameterCheck::checkStringParam($url,'url');
        ParameterCheck::checkStringParam($key,'key');
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
