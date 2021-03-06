<?php
    session_start();

    include "../includes/connectToDB.php";

    // Aktuells Einkaufswagen-Array holen
    $shoppingCart = $_SESSION['ShoppingCart'];

    // Kontaktinformationen welche von bestellung_uebersicht.php übermittelt wurden holen
    $vorname =          $_POST['Vorname'];
    $nachname =         $_POST['Nachname'];
    $e_Mail =           strtolower($_POST['E_Mail']);
    $strasse_Hausnr =   $_POST['Strasse_Hausnr'];
    $plz =              intval($_POST['PLZ']);
    $ort =              $_POST['Ort'];
    $telefon =          $_POST['Telefon'];
    $ges_wert =         $_POST['ges_wert'];


    // Wenn das Input-Feld für telefon leer war muss in der Datenbank NULL eingetragen werden
    if($telefon == "" || $telefon == " ")
    {
        $telefon = "NULL";
    }

    //Bestellung mit eingegebenen Adress-Daten anlegen. Der wert der Bestellung wird später eingetragen
    $sql = "INSERT INTO bestellung (Name, Vorname, E_Mail, Strasse_Hausnr, PLZ, Ort, Telefon, status, wert) 
            VALUES('$nachname', '$vorname', '$e_Mail', '$strasse_Hausnr', '$plz', '$ort', $telefon, 'In Bearbeitung', $ges_wert);";
    
    mysqli_query($dbh, $sql)
        or die("Fehler beim anlegen der Bestellung!\n"  . mysqli_errno($dbh) . ": " . mysqli_error($dbh));


    //Beziehungen zwischen der Bestellung und den jeweiligen produkten in die Beziehungstabelle bestellung_produkt eintragen
        
        //ID der gerade angelegten Bestellung herausfinden
        $sql = "SELECT ID_Bestellung 
                FROM bestellung
                WHERE Name = '$nachname' 
                    AND Vorname = '$vorname' 
                    AND E_Mail = '$e_Mail' 
                    AND Strasse_Hausnr = '$strasse_Hausnr' 
                    AND PLZ = $plz 
                    AND Ort = '$ort'  
                    AND status = 'In Bearbeitung'
                ORDER BY Timestamp DESC
                LIMIT 1;";


        $query = mysqli_query($dbh, $sql)
            or die("Ermitteln der ID der zuvor angelegten Bestellung fehlgeschlagen!\n"  . mysqli_errno($dbh) . ": " . mysqli_error($dbh));
        
        $query_row = mysqli_fetch_row($query);
        $id_Bestellung = $query_row[0];
        $_SESSION['ID_Bestellung'] = $id_Bestellung; // Damit auf der Folgenden Seite eine Rechnung erstellt werden kann
        
        //IDs der Bestellung und der Produkte jeweils  einzelm mit dazugehöriger Menge in bestellung_produkt hinterlegen
        foreach($shoppingCart as $item)
        {
            $sql = "SELECT Preis FROM produkt WHERE ID_Produkt = " . $item['ID_Produkt'] . ";";
            $preis = mysqli_fetch_row(mysqli_query($dbh, $sql));

            $sql = "INSERT INTO bestellung_produkt (ID_Bestellung, ID_Produkt, Menge, stk_preis) 
                    VALUES($id_Bestellung, " . $item['ID_Produkt'] . "," . $item['Menge'] . ", $preis[0])";

            echo $sql;
            
            mysqli_query($dbh, $sql)
                or die("Erstellung der Relation zwischen der Bestellung und einem der Bestellten Produkte fehlgeschlagen!\n\n"  . mysqli_errno($dbh) . ": " . mysqli_error($dbh));
        }

            
    //Sollte die Person mit einem Account eingeloggt sein so wird nun noch der bezug zwischen seinem Account und der Bestellung hergestellt
    if(isset($_SESSION['user_login_korrekt']))
    {
        $sql = "INSERT INTO kunde_bestellung (ID_Kunde, ID_Bestellung) 
                VALUES(" . $_SESSION['user_ID_kunde'] . ", $id_Bestellung);";

        mysqli_query($dbh, $sql)
            or die("Beziehung zwischen Banutzerkonto und bestellung konnte nicht hergestellt werden! \n" . mysqli_errno($dbh) . ": " . mysqli_error($dbh));
    }

    //Einkaufswagen wird nach bestellung geleert
    $_SESSION['ShoppingCart'] = array();

    header("Location: bestellung_complete.php");

    mysqli_close($dbh);
?>