<?php

require_once 'src/util/ParameterCheck.php';
/**
 * Description of MongoDAO
 *
 * @author Javier L. Matías-Cabrera
 */
class MongoDatabase
{
    public static function createMongoDatabase($username, $password,
                                             $host, $databaseName)
    {
        ParameterCheck::checkParam($username, 'username');
        ParameterCheck::checkParam($password, 'password');
        ParameterCheck::checkParam($host, 'host');
        ParameterCheck::checkParam($databaseName, 'databaseName');

        $connectionString = "mongodb://{$username}:{$password}@{$host}/{$databaseName}";
        $mongo = new Mongo($connectionString);
        ParameterCheck::checkParam($mongo, 'mongo');
        return $mongo;

    }
}

?>
