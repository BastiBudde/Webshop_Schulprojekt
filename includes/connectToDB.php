<?php

    $dbserver   = "localhost";
    $dbuser   = "root";
    $dbpasswort   = "";
    $dbname   = "webshop";

    //Verbindung zum Db-Server aufbauen
    $dbh = mysqli_connect($dbserver,$dbuser,$dbpasswort)
    or die ("Fehler bie CONNECT");

    //Verbindung zur Datenbank aufbauen
    mysqli_select_db($dbh,$dbname)
    or die ("Fehler bei SELECT_DB");

?>