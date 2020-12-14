<?php
    session_start();

    //Überprüfwn ob der Mitarbeiter eingeloggt ist
    if(isset($_SESSION['mitarbeiter_login_korrekt']) && $_SESSION['mitarbeiter_login_korrekt'] == true)
    {
        //Überprüfen ob alle Angaben zum Produkt gesetz wurden
        if( isset($_POST['Bezeichnung']) && isset($_POST['Kurzbeschreibung']) && 
            isset($_POST['Beschreibung']) && isset($_POST['Preis']) &&
            isset($_POST['Sparte']) && isset($_POST['Kategorie']) &&
            isset($_POST['Picture_Path']) && isset($_POST['Bilderquelle']))
            {
                include "../includes/connectToDB.php";

                //Die benötigten Daten besorgen und wenn nötig in HTML-Entities umwandeln
                $bezeichnung = htmlentities($_POST['Bezeichnung']);
                $kurzbeschreibung = nl2br(htmlentities($_POST['Kurzbeschreibung']));
                $beschreibung = nl2br(htmlentities($_POST['Beschreibung']));
                $preis = $_POST['Preis'];
                $sparte = $_POST['Sparte'];
                $kategorie = $_POST['Kategorie'];
                $picture_path = $_POST['Picture_Path'];
                $bilderquelle = $_POST['Bilderquelle'];

                //SQL-Abfrage aufstellen
                $sql = "INSERT INTO produkt (Bezeichnung, Kurzbeschreibung, Picture_Path, Beschreibung, Preis, Sparte, Kategorie, Bilderquelle)
                        VALUES ('$bezeichnung', '$kurzbeschreibung', '$picture_path', '$beschreibung', $preis, '$sparte', '$kategorie', '$bilderquelle');";

                //SQL-Abfrage an die Datenbank senden
                $result = mysqli_query($dbh,$sql)
                    or die ("Fehler bei der QUERY".mysqli_error($dbh));

                mysqli_close($dbh);

                //Weiterleitung zur Übersichtsseite des Backends
                header("Location: backend_uebersicht.php?notice=Produkt erfolgreich eingefügt"); 
            }
    }
    //Ist der mitarbeiter nicht eingeloggt wird er zum Login weitergeleitet
    else
    {
        header("Location: index.php");
    }
?>