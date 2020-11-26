<?php
session_start();

if(isset($_SESSION['mitarbeiter_login_korrekt']) && $_SESSION['mitarbeiter_login_korrekt'] == true)
{
    if( isset($_POST['Bezeichnung']) && isset($_POST['Kurzbeschreibung']) && 
        isset($_POST['Beschreibung']) && isset($_POST['Preis']) &&
        isset($_POST['Sparte']) && isset($_POST['Kategorie']) &&
        isset($_POST['Picture_Path']) && isset($_POST['Bilderquelle']))
        {
            $dbserver   = "localhost";
            $dbuser   = "root";
            $dbpasswort   = "";
            $dbname   = "webshop";

            $bezeichnung = htmlentities($_POST['Bezeichnung']);
            $kurzbeschreibung = nl2br(htmlentities($_POST['Kurzbeschreibung']));
            $beschreibung = nl2br(htmlentities($_POST['Beschreibung']));
            $preis = $_POST['Preis'];
            $sparte = $_POST['Sparte'];
            $kategorie = $_POST['Kategorie'];
            $picture_path = $_POST['Picture_Path'];
            $bilderquelle = $_POST['Bilderquelle'];

            //Verbindung zum Db-Server aufbauen
            $dbh = mysqli_connect($dbserver,$dbuser,$dbpasswort)
            or die ("Fehler bie CONNECT");
        
            //Verbindung zur Datenbank aufbauen
            mysqli_select_db($dbh,$dbname)
                or die ("Fehler bei SELECT_DB");

            //SQL-Abfrage aufstellen
            $sql = "INSERT INTO produkt (Bezeichnung, Kurzbeschreibung, Picture_Path, Beschreibung, Preis, Sparte, Kategorie, Bilderquelle)
                    VALUES ('$bezeichnung', '$kurzbeschreibung', '$picture_path', '$beschreibung', $preis, '$sparte', '$kategorie', '$bilderquelle');";

            //SQL-Abfrage an die Datenbank senden
            $result = mysqli_query($dbh,$sql)
                or die ("Fehler bei der QUERY");

                header("Location: http://localhost/Webshop_Melanie_Sebastian/backend/backend_insertProduct.php?save_successfull=True"); 
        }
}
else
{
    header("Location: http://localhost/Webshop_Melanie_Sebastian/backend/index.php");
}
?>