<?php
    session_start();

    include "../includes/connectToDB.php";

    if($_SESSION['user_information_Telefon'] == "")
    {
        $telefon = "NULL";
    }
    else
    {
        $telefon = $_SESSION['user_information_Telefon'];
    }

    //Sollte zuvor ein neues Passwort vom Nutzer eingegeben worden sein
    if(isset($_SESSION['user_information_NeuesPasswort']))
    {
        $sql = "UPDATE kunde 
                SET Vorname = '".$_SESSION['user_information_Vorname']."',
                    Name = '".$_SESSION['user_information_Nachname']."',
                    E_Mail = '".$_SESSION['user_information_E_Mail']."',
                    Passwort = '".$_SESSION['user_information_NeuesPasswort']."',
                    PLZ = '".$_SESSION['user_information_PLZ']."',
                    Ort = '".$_SESSION['user_information_Ort']."',
                    Strasse_Hausnr = '".$_SESSION['user_information_Strasse_hausnr']."',
                    Telefon = '".$telefon."'
                WHERE ID_Kunde = ".$_SESSION['user_ID_kunde'].";";
    }
    //Sollte zuvor kein neues Passwort vom Nutzer eingegeben worden sein
    else
    {
        $sql = "UPDATE kunde 
        SET Vorname = '".$_SESSION['user_information_Vorname']."',
            Name = '".$_SESSION['user_information_Nachname']."',
            E_Mail = '".$_SESSION['user_information_E_Mail']."',
            PLZ = '".$_SESSION['user_information_PLZ']."',
            Ort = '".$_SESSION['user_information_Ort']."',
            Strasse_Hausnr = '".$_SESSION['user_information_Strasse_hausnr']."',
            Telefon = ".$telefon."
        WHERE ID_Kunde = ".$_SESSION['user_ID_kunde'].";";
    }

    if(isset($_SESSION['user_information_NeuesPasswort']))
    {
        unset($_SESSION['user_information_NeuesPasswort']);
    }
    unset($_SESSION['user_information_Vorname']);
    unset($_SESSION['user_information_Nachname']);
    unset($_SESSION['user_information_E_Mail']);
    unset($_SESSION['user_information_PLZ']);
    unset($_SESSION['user_information_Ort']);
    unset($_SESSION['user_information_Strasse_hausnr']);
    unset($_SESSION['user_information_Telefon']);

    echo $sql."\n";

    mysqli_query($dbh, $sql)
        or die("Fehler bei der Query: " . mysqli_error($dbh));

    header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/user-uebersicht.php?notice=Informationen erfolgreich gespeichert");
?>