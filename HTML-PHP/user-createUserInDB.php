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
        if($_POST['Telefon'] == "")
        {
            $telefon = $_POST['Telefon'];
        }
        else
        {
            $telefon = "NULL";
        }

        $sql = "INSERT INTO kunde   (Vorname, Nachname, E_Mail, Passwort, PLZ, Ort, Strasse_Hausnr, Telefon)
                VALUES ('".$_POST['Vorname'].       "',
                        '".$_POST['Nachname'].      "',
                        '".$_POST['E_Mail'].        "',
                        '".$_POST['Passwort'].      "',
                        '".$_POST['PLZ'].           "',
                        '".$_POST['Ort'].           "',
                        '".$_POST['Strasse_Hausnr']."',
                        '".$telefon."');";
        
        echo $sql;
    }
    else
    {
        $_POST['Notice'] = "Fehler beim anlegen ihres Kontos!";
        header("Location: http://localhost/Webshop_Melanie_Sebastian/backend/user-create_account.php"); 
    }

?>