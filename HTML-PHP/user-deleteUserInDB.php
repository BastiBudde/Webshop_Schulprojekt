<?php
    session_start();
    include "../includes/connectToDB.php";

    if(isset($_SESSION['user_login_korrekt']) && $_SESSION['user_login_korrekt'] == true)
    {
        $userToDelete = $_SESSION['user_ID_kunde'];

        $sql = "DELETE FROM kunde_bestellung WHERE ID_Kunde = ".$userToDelete.";";
                
        mysqli_query($dbh, $sql)
            or die ("Fehler beim löschen der Beziehungen: " . mysqli_error($dbh));

        $sql = "DELETE FROM kunde WHERE ID_Kunde = ".$userToDelete.";";

        mysqli_query($dbh, $sql)
            or die ("Fehler beim löschen der Kundeninformationen: " . mysqli_error($dbh));

        // Benutzer wird ausgeloggt und die Daten welche ich noch 
        // in Session-Variablen befinden werden gelöscht
        session_start();
        $_SESSION = array();
        session_unset();
        session_destroy();

        header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/user-login.php?notice=Konto erfolgreich gelöscht");
    }
    else
    {
        header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/user-login.php");
    }
?>