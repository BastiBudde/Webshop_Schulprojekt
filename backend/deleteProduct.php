<?php
    session_start();
    
    if(isset($_SESSION['mitarbeiter_login_korrekt']) && $_SESSION['mitarbeiter_login_korrekt'] == true)
    {   
        include "../includes/connectToDB.php";

        // Wenn ein Produkt gelöscht wird dann müssen in diesem Fall auch immer die Beziehungen zu 
        // den einzelnen Bestellungen in welchen das Produkt vorkommt gelöscht werden werden. 
        // Im Endeffekt wird das Produkt dadurch aus den Bestellungen entfernt 
        // (So hab ich das mit ihnen im Unterricht Abgesprochen!)
        $sql = "DELETE FROM bestellung_produkt
                WHERE ID_Produkt = ".intval($_GET['productToDelete']).";";

        //SQL-Abfrage an die Datenbank senden
        mysqli_query($dbh,$sql)
        or die ("Fehler bei der QUERY:" . mysqli_error($dbh));


        // Nachdem die Beziehungen zu den einzelnen Bestellungen entfernt wurden
        // kann nun auch das Produkt selber entfernt werden
        $sql = "DELETE FROM produkt
                WHERE ID_Produkt = ".intval($_GET['productToDelete']).";";

        //SQL-Abfrage an die Datenbank senden
        mysqli_query($dbh,$sql)
        or die ("Fehler bei der QUERY:" . mysqli_error($dbh));

        mysqli_close($dbh);

        header("Location: backend_uebersicht.php?notice=Produkt erfolgreich gelöscht"); 
    }
    //Ist der Benutzer nicht im Backend eingeloggt wird hier ein Text und ein Link zum Login angezeigt
    else
    {
        header("Location: index.php"); 
    }

?>