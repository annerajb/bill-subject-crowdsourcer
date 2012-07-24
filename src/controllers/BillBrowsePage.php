<?php
require_once(dirname(__FILE__).'/../../config/config.php');
require_once 'src/controllers/Page.php';
require_once 'src/service/BillyAPIService.php';
require_once 'unittest/dao/BillyAPI_DAOFake.php';
/**
 * Description of BillBrowsePage
 *
 * @author Javier L. Matías-Cabrera
 */
class BillBrowsePage extends Page
{
    protected function LocalHandle($request)
    {
        $billyDao = new BillyAPI_DAOFake('someUrl','someKey');
        $billyService = new BillyAPIService($billyDao);

        $upperBills = $billyService->findAllUpperChamberBills('pr',0,3);
        $lowerBills = $billyService->findAllLowerChamberBills('pr',0,7);
        $this->Set('upperBills',$upperBills);
        $this->Set('lowerBills',$lowerBills);
    }
}

$my_page = new BillBrowsePage('billBrowse.tpl');
$my_page->Handle($_REQUEST);

?>
