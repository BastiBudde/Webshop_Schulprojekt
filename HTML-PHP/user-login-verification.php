<?php
    session_start();

    if(isset($_POST['e-Mail']) && isset($_POST['password']))
    {
        include "../includes/connectToDB.php";
        
        //Eingegebene E-Mail-Adresse wird zu Lowercase formatiert, da alle E-Mail-Adressen in Lowercase in der Datenbank gespeichert werden
        $e_mail = strtolower($_POST['e-Mail']);
        $password = $_POST['password'];

        //SQL-Abfrage aufstellen
        $sql = "SELECT E_Mail, Passwort, Vorname, Name, PLZ, Ort, Strasse_Hausnr, Telefon, ID_Kunde Name FROM kunde WHERE E_Mail = '$e_mail'";

        //SQL-Abfrage an die Datenbank senden
        $result = mysqli_query($dbh,$sql)
            or die ("Fehler bei der QUERY");

        //Ergebnis der SQL-Abfrage verarbeiten
        if(mysqli_num_rows($result) != 0) //Testen ob MySQL Query Daten geliefert hat oder nicht
        {
            $fetched_result = mysqli_fetch_row($result);

            if($fetched_result[1] == $password)
            { 
                $_SESSION['user_login_korrekt'] = true;
                $_SESSION['user_ID_kunde'] = $fetched_result[8];
                $_SESSION['user_e_mail'] = $fetched_result[0];
                $_SESSION['user_Passwort'] = $fetched_result[1];
                $_SESSION['user_Vorname'] = $fetched_result[2];
                $_SESSION['user_Nachname'] = $fetched_result[3];
                $_SESSION['user_PLZ'] = $fetched_result[4];
                $_SESSION['user_Ort'] = $fetched_result[5];
                $_SESSION['user_Strasse_Hausnr'] = $fetched_result[6];
                $_SESSION['user_Telefon'] = $fetched_result[7];
                header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/user-uebersicht.php");
            }
            else
            {
                header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/user-login.php?notice=Benutzer und Passwort stimmen nicht überein"); //Lässt auf user-login.php die Rückmeldung geben, dass E-Mail und Passwort nicht übereinstimmen
            }
        }
        else
        {
            header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/user-login.php?notice=Benutzer existiert nicht"); //Lässt auf user-login.php die Rückmeldung geben, dass der Benutzer nicht existiert
        }
    }
    else
    {
        header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/user-login.php"); //Leiter auf user-login.php zurück falls E-Mail und/oder Passwort nicht gesetzt sind / eingegeben wurden
    }
?>