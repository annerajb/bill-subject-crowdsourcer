<?php

require_once 'src/util/ParameterCheck.php';
/**
 * Description of MongoDAO
 *
 * @author Javier L. Matías-Cabrera
 */
class MongoDAO
{
    protected $mongoDB;

    public function __construct($username, $password,
                                  $host, $databaseName)
    {
        ParameterCheck::checkParam($username, 'username');
        ParameterCheck::checkParam($password, 'password');
        ParameterCheck::checkParam($host, 'host');
        ParameterCheck::checkParam($databaseName, 'databaseName');

        $connectionString = "mongodb://{$username}:{$password}@{$host}/{$databaseName}";
        $mongo = new Mongo($connectionString);
        $mongoDB = $mongo->selectDB($databaseName);
        ParameterCheck::checkParam($mongoDB, 'mongoDB');
        $this->mongoDB = $mongoDB;
    }

    protected function add($collection, $item)
    {
        $this->mongoDB->selectCollection($collection)->insert($item);

    }

    protected function find($collection, $query)
    {
        $cursor = $this->mongoDB->selectCollection("collection")->find($query);
        $results = $this->cursorToArray($cursor);
        return $results;
    }

    protected function findOne($collection, $query)
    {
        $array = $this->mongoDB->selectCollection("collection")
                ->findOne($query);

        return $array;
    }

    protected function cursorToArray(&$cursor)
    {
        $results = array();
        while( $cursor->hasNext() )
        {
            $results[] = $cursor->getNext();
        }
        return $results;
    }
}

?>
