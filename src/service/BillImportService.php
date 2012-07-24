<?php

require_once('src/util/ParameterCheck.php');
require_once('src/model/ModelCheck.php');
require_once 'src/util/Object.php';

/**
 * Description of BillSubjectService
 *
 * @author Javier L. Matías-Cabrera
 */
class BillImportService extends Object
{
    /**
     *
     * @var BillSubjectMongoDAO
     */
    private $billDAO;

    /**
     *
     * @var BillyAPIService
     */
    private $billyAPI;


    public function __construct($billDAO, $billyAPI)
    {
        ParamCheck::checkParamClass($billDAO,'BillSubjectMongoDatabaseDAO' , 'billDAO');
        ParamCheck::checkParamClass($billyAPI,'BillyAPI_DAO' , 'billyAPI');
        $this->billDAO = $billDAO;
        $this->billyAPI = $billyAPI;
    }

    public function importBills($state)
    {
        ParamCheck::checkStringParam($state, 'state');
        $bills = $this->billyAPI->findLowerChamberBillsWithoutSubject($state);
        foreach($bills as $bill)
        {
            $this->billDAO->saveBill($bill);
        }

    }




}

?>
