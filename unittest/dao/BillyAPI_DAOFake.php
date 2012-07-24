<?php

require_once 'src/dao/BillyAPI_DAO.php';

/**
 * Description of BillyAPI_DAOFake
 *
 * @author Javier L. Matías-Cabrera
 */
class BillyAPI_DAOFake extends BillyAPI_DAO
{
    private $prLowerBillsJson;
    private $prUpperBillsJson;

    public function __construct($url, $key)
    {
        parent::__construct($url, $key);
        $this->prLowerBillsJson = json_decode(file_get_contents(dirname(__FILE__)
                .'/../service/PR_lower_bills.json'),TRUE);
        $this->prUpperBillsJson = json_decode(file_get_contents(dirname(__FILE__)
                .'/../service/PR_upper_bills.json'),TRUE);
    }
    public function getAllUpperChamberBills($state)
    {
        return $this->prUpperBillsJson;
    }

    public function getAllLowerChamberBills($state)
    {
        return $this->prLowerBillsJson;
    }
}

?>
