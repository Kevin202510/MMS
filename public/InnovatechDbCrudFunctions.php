<?php

        $host = "ec2-18-214-134-226.compute-1.amazonaws.com";
        $user = "qjxtfcpyolovht";
        $password = "dbc417634f8ce8ba2abc874571c9cfe1e03d494693e23ac499188553a802b9c2";
        $dbname = "d1ab2u185tq6et";
        $port = "5432";

        try{
        //Set DSN data source name
            $dsn = "pgsql:host=" . $host . ";port=" . $port .";dbname=" . $dbname . ";user=" . $user . ";password=" . $password . ";";


        //create a pdo instance
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        }

?>