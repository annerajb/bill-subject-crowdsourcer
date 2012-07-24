<?php

require_once 'src/util/ParameterCheck.php';
/**
 * Description of MongoDatabaseDAO
 *
 * @author Javier L. Matías-Cabrera
 */
class MongoDatabaseDAO
{
    protected $mongoDB;

    public function __construct($username, $password,
                                  $host, $databaseName)
    {
        ParamCheck::checkParam($username, 'username');
        ParamCheck::checkParam($password, 'password');
        ParamCheck::checkParam($host, 'host');
        ParamCheck::checkParam($databaseName, 'databaseName');

        $connectionString = "mongodb://{$username}:{$password}@{$host}/{$databaseName}";
        $mongo = new Mongo($connectionString);
        $mongoDB = $mongo->selectDB($databaseName);
        ParamCheck::checkParam($mongoDB, 'mongoDB');
        $this->mongoDB = $mongoDB;
    }

    protected function update($collection, $item)
    {
        return $this->mongoDB->selectCollection($collection)->update($item);
    }

    protected function add($collection, $item)
    {
        return $this->mongoDB->selectCollection($collection)->insert($item);

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
