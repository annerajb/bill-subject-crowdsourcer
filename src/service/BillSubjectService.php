<?php

require_once('src/util/ParameterCheck.php');
require_once('src/model/ModelCheck.php');

/**
 * Description of BillSubjectService
 *
 * @author Javier L. Matías-Cabrera
 */
class BillSubjectService
{
    /**
     *
     * @var Mongo
     */
    private $mongo;

    public function __construct($mongo)
    {
        ParameterCheck::checkParamClass($mongo,'Mongo' , 'mongo');
        $this->mongo = $mongo;
    }

    /**
     *
     * @param type $bill
     */
    public function addBill($bill)
    {
        BillModel::checkNewBill($bill);
        $bills = $this->mongo->selectCollection('bills');
        $bills->insert($bill);
    }

    public function updateBill($bill)
    {
    }

    public function removeBillById()
    {
    }

    public function findBillById($billId)
    {
    }

    public function addUser($user)
    {
    }

    public function updateUser($user)
    {
    }

    public function removeUser($user)
    {
    }

    public function findUserById($userId)
    {
    }

    public function findUserByName($userName)
    {
    }

    public function addBillSubjectEntry($billId, $subject, $userId)
    {

    }
}

?>
