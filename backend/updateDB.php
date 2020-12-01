<?php
    session_start();

    if(isset($_SESSION['mitarbeiter_login_korrekt']) && $_SESSION['mitarbeiter_login_korrekt'] == true && isset($_POST['ID_ProduktToUpdate']))
    {
        include "../includes/connectToDB.php";

        $sql = "UPDATE produkt
                SET ID_Produkt =         ".$_POST['ID_ProduktToUpdate'].",
                    Bezeichnung =       '".htmlentities($_POST['Bezeichnung'])."', 
                    Kurzbeschreibung =  '".nl2br(htmlentities($_POST['Kurzbeschreibung']))."',
                    Beschreibung =      '".nl2br(htmlentities($_POST['Beschreibung']))."',
                    Preis =              ".$_POST['Preis'].",
                    Sparte =            '".$_POST['Sparte']."',
                    Kategorie =         '".$_POST['Kategorie']."',
                    Picture_Path =      '".$_POST['Picture_Path']."',
                    Bilderquelle =      '".$_POST['Bilderquelle']."'
                WHERE ID_Produkt =       ".$_POST['ID_ProduktToUpdate'].";"; 
        
        //SQL-Abfrage an die Datenbank senden
        mysqli_query($dbh,$sql)
        or die ("Fehler bei der QUERY:". $sql);

        header("Location: http://localhost/Webshop_Melanie_Sebastian/backend/backend_uebersicht.php?notice=Änderungen erfolgreich gespeichert!"); 
    }
    else
    {
        header("Location: http://localhost/Webshop_Melanie_Sebastian/backend/backend_uebersicht.php");
    }

?>