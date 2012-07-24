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
        ParameterCheck::checkParam($bill['subject'],'bill[\'subject\']');
        ParameterCheck::checkParam($bill['id'],'bill[\'id\']');
    }

    public static function checkUser($user)
    {
        ParameterCheck::checkParam($user['name'],'user[\'name\']');
        ParameterCheck::checkParam($user['id'],'user[\'id\']');
        ParameterCheck::checkParam($user['password'],'user[\'password\']');
    }




}

?>
