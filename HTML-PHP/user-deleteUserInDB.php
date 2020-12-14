<?php
    session_start();
    include "../includes/connectToDB.php";

    if(isset($_SESSION['user_login_korrekt']) && $_SESSION['user_login_korrekt'] == true)
    {
        //ID des zu löschenden Kundenkontos besorgen
        $userToDelete = $_SESSION['user_ID_kunde'];

        //SQL-Abfrage zum Löschen der Kunde-Bestellung-Beziehung aufstellen
        $sql = "DELETE FROM kunde_bestellung WHERE ID_Kunde = ".$userToDelete.";";
        
        mysqli_query($dbh, $sql)
            or die ("Fehler beim löschen der Beziehungen: " . mysqli_error($dbh));

        //SQL-Abfrage zum Löschen der Kundendaten aufstellen
        $sql = "DELETE FROM kunde WHERE ID_Kunde = ".$userToDelete.";";

        mysqli_query($dbh, $sql)
            or die ("Fehler beim löschen der Kundeninformationen: " . mysqli_error($dbh));

        mysqli_close($dbh);

        // Benutzer wird ausgeloggt und die Daten welche ich noch 
        // in Session-Variablen befinden werden gelöscht
        session_start();
        $_SESSION = array();
        session_unset();
        session_destroy();

        header("Location: user-login.php?notice=Konto erfolgreich gelöscht");
    }
    //ISt der Benutzer nicht eingeloggt wird er zum Logn weitergeleitet
    else
    {
        header("Location: user-login.php");
    }
?>