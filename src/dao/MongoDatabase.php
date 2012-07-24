<?php

/**
 * Description of MongoDAO
 *
 * @author Javier L. Matías-Cabrera
 */
class MongoDAO
{

   private $mongo;
   public function __construct($databaseName)
    {
        $Sthis->mongo = new Mongo($databaseName);
    }
}

?>
