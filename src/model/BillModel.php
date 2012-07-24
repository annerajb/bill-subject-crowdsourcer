<?php


require_once('src/util/ParameterCheck.php');
/**
 * Description of BillModel
 *
 * @author Javier L. Matías-Cabrera
 */
class BillModel
{
    public static function check($bill)
    {
        ParameterCheck::checkParam($bill['subject'],'bill[\'subject\']');
        ParameterCheck::checkParam($bill['id'],'bill[\'id\']');
    }
}

?>
