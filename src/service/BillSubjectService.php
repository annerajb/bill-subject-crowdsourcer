<?php

require_once('src/util/ParameterCheck.php');
require_once('src/model/ModelCheck.php');
require_once 'src/util/Object.php';

/**
 * Description of BillSubjectService
 *
 * @author Javier L. Matías-Cabrera
 */
class BillSubjectService extends Object
{
    /**
     *
     * @var Mongo
     */
    private $mongo;

    public function __construct($mongo)
    {
        ParamCheck::checkParamClass($mongo,'BillSubjectMongoDatabaseDAO' , 'mongo');
        $this->mongo = $mongo;
    }


}

?>
