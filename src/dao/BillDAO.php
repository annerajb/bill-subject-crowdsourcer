<?php

require_once('src/util/ParameterCheck.php');
require_once('src/dao/MongoDatabase.php');
/**
 * Description of BillDAO
 *
 * @author Javier L. Matías-Cabrera
 */
class BillDAO extends MongoDatabase
{

    private $database;
    private $connection;

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
        $bills = $this->mongo->selectCollection('bills');
    }
}

?>
