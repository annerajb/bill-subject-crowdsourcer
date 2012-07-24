<?php


require_once('src/util/ParameterCheck.php');
/**
 * Description of BillModel
 *
 * @author Javier L. Matías-Cabrera
 */
class BillModel
{
    public static function checkBillNotNull($bill)
    {
        ParameterCheck::checkBill($bill);
        ParameterCheck::checkArrayNotNull($bill, 'bill');

    }
    public static function checkill($bill)
    {
        ParameterCheck::checkStringParam($bill['subject'],'bill[\'subject\']');
        ParameterCheck::checkStringParam($bill['title'],'bill[\'title\']');
    }

    public static function checkUser($user)
    {
        ParamCheck::checkArrayNotNull($user, 'user');
        ParamCheck::checkStringParam($user['name'],'user[\'name\']');
        ParamCheck::checkStringParam($user['id'],'user[\'id\']');
        ParamCheck::checkStringParam($user['password'],'user[\'password\']');

    }




}

?>
