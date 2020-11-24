<?php
session_start();

    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $dbserver   = "localhost";
        $dbuser   = "root";
        $dbpasswort   = "";
        $dbname   = "webshop";
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        //Verbindung zum Db-Server aufbauen
        $dbh = mysqli_connect($dbserver,$dbuser,$dbpasswort)
        or die ("Fehler bie CONNECT");

        //Verbindung zur Datenbank aufbauen
        mysqli_select_db($dbh,$dbname)
            or die ("Fehler bei SELECT_DB");

        //SQL-Abfrage aufstellen
        $sql = "SELECT Benutzername, Passwort, Vorname, Name FROM mitarbeiter WHERE Benutzername = '$username'";

        //SQL-Abfrage an die Datenbank senden
        $result = mysqli_query($dbh,$sql)
            or die ("Fehler bei der QUERY");

        //Ergebnis der SQL-Abfrage verarbeiten
        if(mysqli_num_rows($result) != 0) //Testen ob MySQL Query Daten geliefert hat oder nicht
        {
            $fetched_result = mysqli_fetch_row($result);

            if($fetched_result[1] == $password)
            { 
                $_SESSION['mitarbeiter_login_korrekt'] = true;
                $_SESSION['mitarbeiter_Username'] = $username;
                $_SESSION['mitarbeiter_Passwort'] = $password;
                $_SESSION['mitarbeiter_Vorname'] = $fetched_result[2];
                $_SESSION['mitarbeiter_Nachname'] = $fetched_result[3];
                header("Location: http://localhost/Webshop_Melanie_Sebastian/backend/backend.php");
            }
            else
            {
                header("Location: http://localhost/Webshop_Melanie_Sebastian/backend/index.php?login_failure=2&"); //Lässt index.php die Rückmeldung geben, dass Benutzername und Passwort nicht übereinstimmen
            }
        }
        else
        {
            header("Location: http://localhost/Webshop_Melanie_Sebastian/backend/index.php?login_failure=1&"); //Lässt index.php die Rückmeldung geben, dass der Benutzer nicht existiert
        }
    }
    else
    {
        header("Location: http://localhost/Webshop_Melanie_Sebastian/backend/"); //Leiter auf index.php zurück falls Benutzername und/oder Passwort nicht gesetzt sind / eingegeben wurden
    }
?>