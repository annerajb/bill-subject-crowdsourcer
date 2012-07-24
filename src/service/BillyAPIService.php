<?php

require_once('src/util/ParameterCheck.php');
require_once('src/model/ModelCheck.php');


/**
 * Description of BillyAPIService
 *
 * @author Javier L. Matías-Cabrera
 */
class BillyAPIService
{
    private $billyDAO;

    public function __construct($billyDAO)
    {
        ParameterCheck::checkParamClass($billyDAO, 'BillyAPI_DAO', 'billyDAO');
        $this->billyDAO = $billyDAO;
    }

    public function findAllUpperChamberBills($state)
    {
    }

    public function findAllLowerChamberBills($state)
    {
    }
}

?>
