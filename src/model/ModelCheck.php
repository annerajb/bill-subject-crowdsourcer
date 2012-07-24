<?php


require_once('src/util/ParameterCheck.php');
/**
 * Description of BillModel
 *
 * @author Javier L. Matías-Cabrera
 */
class BillModel
{
    public static function checkBill($bill)
    {
        ParameterCheck::checkBill($bill);
        ParameterCheck::checkPositiveIntParam($bill['id'],'bill[\'id\']');

    }
    public static function checkNewBill($bill)
    {
        ParameterCheck::checkArrayNotNull($bill, 'bill');
        ParameterCheck::checkStringParam($bill['subject'],'bill[\'subject\']');
    }

    public static function checkUser($user)
    {
        ParameterCheck::checkArrayNotNull($user, 'user');
        ParameterCheck::checkStringParam($user['name'],'user[\'name\']');
        ParameterCheck::checkStringParam($user['id'],'user[\'id\']');
        ParameterCheck::checkStringParam($user['password'],'user[\'password\']');

    }




}

?>
