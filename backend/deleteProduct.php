<?php
    session_start();
    
    if(isset($_SESSION['mitarbeiter_login_korrekt']) && $_SESSION['mitarbeiter_login_korrekt'] == true)
    {   
        include "../includes/connectToDB.php";


        $sql = "DELETE FROM produkt
                WHERE ID_Produkt = ".intval($_GET['productToDelete']).";";

        //SQL-Abfrage an die Datenbank senden
        mysqli_query($dbh,$sql)
        or die ("Fehler bei der QUERY");

        header("Location: http://localhost/Webshop_Melanie_Sebastian/backend/backend_uebersicht.php?notice=Produkt erfolgreich gelöscht"); 
    }
    else
    {
        header("Location: http://localhost/Webshop_Melanie_Sebastian/backend/index.php"); 
    }

?>