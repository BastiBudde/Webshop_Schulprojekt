<?php
session_start();

    if(isset($_POST['username']) && isset($_POST['password']))
    {
        include "../includes/connectToDB.php";

        //SQL-Abfrage aufstellen
        $sql = "SELECT Benutzername, Passwort, Vorname, Name FROM mitarbeiter WHERE Benutzername = '".$_POST['username']."'";

        //SQL-Abfrage an die Datenbank senden
        $result = mysqli_query($dbh,$sql)
            or die ("Fehler bei der QUERY");

        mysqli_close($dbh);

        //Ergebnis der SQL-Abfrage verarbeiten
        if(mysqli_num_rows($result) != 0) //Testen ob MySQL Query Daten geliefert hat oder nicht
        {
            $fetched_result = mysqli_fetch_row($result);

            if($fetched_result[1] == $_POST['password'])
            { 
                $_SESSION['mitarbeiter_login_korrekt'] = true;
                $_SESSION['mitarbeiter_Username'] = $username;
                $_SESSION['mitarbeiter_Vorname'] = $fetched_result[2];
                $_SESSION['mitarbeiter_Nachname'] = $fetched_result[3];
                
                //Weiterleitung zur Backend-Übersicht
                header("Location: backend_uebersicht.php");
            }
            else
            {
                header("Location: index.php?notice=Benutzername und Passwort stimmen nicht überein"); //Lässt index.php die Rückmeldung geben, dass Benutzername und Passwort nicht übereinstimmen
            }
        }
        else
        {
            header("Location: index.php?notice=Benutzer existiert nicht"); //Lässt index.php die Rückmeldung geben, dass der Benutzer nicht existiert
        }
    }
    else
    {
        header("Location: index.php"); //Leiter auf index.php zurück falls Benutzername und/oder Passwort nicht gesetzt sind / eingegeben wurden
    }
?>