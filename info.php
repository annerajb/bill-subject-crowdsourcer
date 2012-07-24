<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once('src/dao/MongoDatabase.php');
        $mongo = new Mongo(MongoDatabase::createMongoDatabase('crowd','sourcer','localhost','crowdsourcer'));
        phpinfo();


        ?>
    </body>
</html>