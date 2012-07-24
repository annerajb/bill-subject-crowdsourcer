<?php

require_once 'MongoDatabaseDAO.php';
require_once 'src/model/ModelCheck.php';

/**
 * Description of BillSubjectMongoDatabaseDAO
 *
 * @author Javier L. Matías-Cabrera
 */
class BillSubjectMongoDAO extends MongoDatabaseDAO
{
    /**
     *
     * @param type $bill
     */
    public function addBill($bill)
    {
        BillModel::checkBill($bill);
        return $this->add("bills", $bill);
    }

    public function saveBill($bill)
    {
        BillModel::checkBill($bill);
        return $this->save("bills", $bill);
    }

    public function updateBill($bill)
    {
        BillModel::checkBill($bill);
        return $this->update("bills", $bill);
    }

    public function deleteBill($bill)
    {
        ParamCheck::checkStringParam($bill, 'bill');
        $bills = $this->mongoDB->selectCollection("bills");
        return $bills->remove($bill);
    }

    public function deleteAllBills()
    {
        $bills = $this->mongoDB->selectCollection("bills");
        return $bills->remove();
    }

    public function getBills()
    {
        $cursor = $this->mongoDB->selectCollection("bills")->find();
        $result = $this->cursorToArray($cursor);
        return $result;

    }

    public function findBillsBySubject($subject)
    {
        ParamCheck::checkStringParam($subject, 'subject');
        $query = array('subject' => $subject);
        $cursor = $this->mongoDB->selectCollection("bills")->find($query);
        $result = $this->cursorToArray($cursor);
        return $result;
    }

    public function findBillsWithoutSubject()
    {
        $query = array('subject' => NULL );
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

    public function findUserByName($userName)
    {
    }

    public function addBillSubjectEntry($billId, $subject, $userId)
    {
    }

}

?>
