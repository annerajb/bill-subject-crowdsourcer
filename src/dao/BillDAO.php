<?php

require_once('MongoDatabase.php');
/**
 * Description of BillDAO
 *
 * @author Javier L. Matías-Cabrera
 */
class BillDAO extends MongoDAO
{
    private $mongoDatabase;

    public function __construct($_mongoDatabase)
    {
        $Sthis->mongoDatabase = $_mongoDatabase;
    }

    public function addBill($bill)
    {
        $connection = $this->mongo->selectDB();
    }


    /**
     * @param type $x
     * @param type $y
     * @return type
     */
    public function addTwoNumbers($x, $y)
    {
        return $x + $y;
    }
}

?>
