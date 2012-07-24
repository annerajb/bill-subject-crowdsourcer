<?php

require_once('src/util/ParameterCheck.php');
require_once('src/model/ModelCheck.php');
/**
 * Description of BillDAO
 *
 * @author Javier L. Matías-Cabrera
 */
class BillDAO
{
    /**
     *
     * @var Mongo
     */
    private $mongo;

    public function __construct($mongo)
    {
        $this->mongo = $mongo;
    }

    public function addBill($bill)
    {
        BillModel::checkBill($bill);
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
//        BillModel::checkUser($user);
//        $users = $this->mongo->selectCollection('users');
//        $users->insert($user);
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
