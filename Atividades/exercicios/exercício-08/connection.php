<?php

    $dbfile = "database.sqlite";
    $dbuser = "";
    $dbpassword = "";
    $dbhost = "";
    $strConnection = "sqlite:". $dbfile;

    $connection = new PDO($strConnection);

    // $produtos = $connection->query("SELECT * FROM produtos")->fetchAll();
