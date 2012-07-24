<?php
require_once(dirname(__FILE__).'/../../config/config.php');
require_once 'src/controllers/PageController.php';
require_once 'src/service/BillyAPIService.php';
require_once 'unittest/dao/BillyAPI_DAOFake.php';
/**
 * Description of BillBrowsePage
 *
 * @author Javier L. Matías-Cabrera
 */
class BillBrowsePage extends PageController
{

    protected function LocalHandle($request)
    {
        $billyConfig = $this->config['billy_api'];
        $billyDao = new BillyAPI_DAOFake($billyConfig['url'],$billyConfig['key']);
        $billyService = new BillyAPIService($billyDao);

        $upperBills = $billyService->findAllUpperChamberBills('pr',0,3);
        $lowerBills = $billyService->findAllLowerChamberBills('pr',0,7);
        $this->Set('upperBills',$upperBills);
        $this->Set('lowerBills',$lowerBills);
        $this->AddCSS('view/css/main.css');
    }
}

$my_page = new BillBrowsePage('billBrowse.tpl');
$my_page->Handle($_REQUEST);

?>
