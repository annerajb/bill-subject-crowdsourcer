<?php

require_once 'MongoDAO.php';

/**
 * Description of BillSubjectMongoDAO
 *
 * @author Javier L. Matías-Cabrera
 */
class BillSubjectMongoDAO extends MongoDAO
{
    /**
     *
     * @param type $bill
     */
    public function addBill($bill)
    {
        BillModel::checkNewBill($bill);
        $this->add("bills", $bill);
    }

    public function updateBill($bill)
    {

    }

    public function deleteBill($bill)
    {
        $bills = $this->mongoDB->selectCollection("bills");
        $bills->remove($bill);
    }

    public function deleteAllBills()
    {
        $bills = $this->mongoDB->selectCollection("bills");
        $bills->remove();
    }

    public function getBills()
    {
        $cursor = $this->mongoDB->selectCollection("bills")->find();
        $result = $this->cursorToArray($cursor);
        return $result;

    }

    public function findBillsBySubject($subject)
    {
        $query = array('subject' => $subject);
        $cursor = $this->mongoDB->selectCollection("bills")->find($query);
        $result = $this->cursorToArray($cursor);
        return $result;
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
