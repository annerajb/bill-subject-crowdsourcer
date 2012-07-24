<?php

require_once('src/util/ParameterCheck.php');
require_once('src/model/BillModel.php');
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
        BillModel::check($bill);
        $bills = $this->mongo->selectCollection('bills');
        $bills->insert($bill);
    }
}

?>
