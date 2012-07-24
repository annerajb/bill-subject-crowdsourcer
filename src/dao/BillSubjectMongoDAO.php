<?php

require_once('src/util/ParameterCheck.php');
require_once('src/model/ModelCheck.php');

/**
 * Description of BillDAO
 *
 * @author Javier L. Matías-Cabrera
 */
class BillSubjectMongoDAO
{
    /**
     *
     * @var Mongo
     */
    private $mongo;

    public function __construct($mongo)
    {
        ParameterCheck::checkParam($mongo, 'mongo');
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


}

?>
