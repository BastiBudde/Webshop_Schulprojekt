<?php

    include "../includes/connectToDB.php";

    if( isset($_POST['Vorname']) &&
        isset($_POST['Nachname']) &&
        isset($_POST['E_Mail']) &&
        isset($_POST['Strasse_Hausnr']) &&
        isset($_POST['PLZ']) &&
        isset($_POST['Ort']) &&
        isset($_POST['Passwort']))
    {
        if($_POST['Telefon'] === "")
        {
            $telefon = "NULL";
        }
        else
        {
            $telefon = $_POST['Telefon'];
        }

        $sql = "INSERT INTO kunde   (Vorname, Name, E_Mail, Passwort, PLZ, Ort, Strasse_Hausnr, Telefon)
                VALUES ('".$_POST['Vorname'].       "',
                        '".$_POST['Nachname'].      "',
                        '".$_POST['E_Mail'].        "',
                        '".$_POST['Passwort'].      "',
                        '".$_POST['PLZ'].           "',
                        '".$_POST['Ort'].           "',
                        '".$_POST['Strasse_Hausnr']."',
                        '".$telefon."');";
        
        //SQL-Abfrage an die Datenbank senden
        mysqli_query($dbh,$sql)
            or die ("Fehler bei der QUERY". mysqli_error($dbh));

        mysqli_close($dbh);

        //Weiterleiten zum User-Login mit der folgenden Nachricht
        header("Location: user-login.php?notice=Konto erfolgreich angelegt");
    }
    //Weiterleiten zum User-Login mit der folgenden Nachricht
    else
    {
        header("Location: user-create_account.php?notice=Fehler beim anlegen ihres Kontos!"); 
    }

?>