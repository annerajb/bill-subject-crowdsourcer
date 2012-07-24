<?php

/**
 * Description of MongoDAO
 *
 * @author Javier L. Matías-Cabrera
 */
class MongoDatabase
{
    public static function getDatabaseString($username, $password,
                                             $host, $databaseName)
    {
        $databaseString = "mongodb://{$username}:{$password}@{$host}/{$databaseName}";
        return $databaseString;
    }
}

?>
