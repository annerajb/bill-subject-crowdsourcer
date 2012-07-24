<?php

require_once('src/util/ParameterCheck.php');
require_once('src/model/ModelCheck.php');
require_once('src/dao/BillyAPI_DAO.php');
require_once 'src/util/Object.php';


/**
 * Description of BillyAPIService
 *
 * @author Javier L. Matías-Cabrera
 */
class BillyAPIService extends Object
{
    /**
     *
     * @var BillyAPI_DAO
     */
    private $billyDAO;

    public function __construct($billyDAO)
    {
        ParameterCheck::checkParamClass($billyDAO, 'BillyAPI_DAO', 'billyDAO');
        $this->billyDAO = $billyDAO;
    }

    public function findAllUpperChamberBills($state, $offset=0, $limit=25)
    {
        ParameterCheck::checkParam($state, 'state');
        $bills = $this->billyDAO->getAllUpperChamberBills($state);
        return array_slice($bills, $offset,$limit);
    }

    public function findAllLowerChamberBills($state, $offset=0, $limit=25)
    {
        ParameterCheck::checkParam($state, 'state');
        $bills = $this->billyDAO->getAllLowerChamberBills($state);
        return array_slice($bills, $offset,$limit);
    }

    public function findLowerChamberBillsWithoutSubject($state, $offset=0, $limit=25)
    {

    }

    public function findUpperChamberBillsWithoutSubject($state, $offset=0, $limit=25)
    {

    }
}

?>
