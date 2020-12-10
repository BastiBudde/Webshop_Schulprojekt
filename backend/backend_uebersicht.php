<?php
    session_start();
    
    include "../includes/siteHeader.php";
    include "../includes/siteFooter.php";
    include "../includes/connectToDB.php";


    /* Anzahl an Bestellungen und Summe aller Bestellungen holen */
    $sql = "SELECT COUNT(ID_Bestellung), SUM(wert)
            FROM bestellung;";

    $anzBest_sumBest = mysqli_query($dbh, $sql)
                        or die("Fehler bei der Query: ".mysqli_error($dbh));
                        
    $anzBest_sumBest = mysqli_fetch_row($anzBest_sumBest);


    /* Anzahl an Bestellungen und Summe aller Bestellungen holen deren Status nicht Storniert ist */
    $sql = "SELECT COUNT(ID_Bestellung), SUM(wert)
    FROM bestellung
    WHERE status NOT LIKE 'Storniert';";

    $anzBest_sumBest_notStorniert = mysqli_query($dbh, $sql)
                        or die("Fehler bei der Query: ".mysqli_error($dbh));
                
    $anzBest_sumBest_notStorniert = mysqli_fetch_row($anzBest_sumBest_notStorniert);


    /* Anzahle der Bestellungen mit dem Status offen holen */
    $sql = "SELECT COUNT(ID_Bestellung)
            FROM bestellung
            WHERE status = 'In Bearbeitung';";

    $anzStatus_offen = mysqli_query($dbh, $sql)
                        or die("Fehler bei der Query: ".mysqli_error($dbh));
    
    $anzStatus_offen = mysqli_fetch_row($anzStatus_offen)[0];


    /* Anzahl der Bestellungen mit dem Status Storniert holen */
    $sql = "SELECT COUNT(ID_Bestellung)
            FROM bestellung
            WHERE status = 'Storniert';";

    $anzStatus_storniert = mysqli_query($dbh, $sql)
                        or die("Fehler bei der Query: ".mysqli_error($dbh));
    
    $anzStatus_storniert = mysqli_fetch_row($anzStatus_storniert)[0];

    pageHead("Backend Übersicht");

    if(isset($_SESSION['mitarbeiter_login_korrekt']) && $_SESSION['mitarbeiter_login_korrekt'] == true)
    {

        echo "
        <div class='backend-newDBdataInput-container'>

                <table>

                    <caption>
                        <div>
                            <h2> Willkommen " . $_SESSION['mitarbeiter_Vorname'] . " " . $_SESSION['mitarbeiter_Nachname'] . "! </h2> 
                            
                            <form action='backend-logout.php'>
                                <input type='submit' value='Logout' class='button buttonSmall'>
                            </form>
                        </div>
                        <br>
                    </caption>
                
                    <tr>
                        <td>
                            <a href='backend_insertProduct.php' class='button buttonNormal'>Produkt einfügen</a>
                            <br>
                            <br>
                        </td>
                        <td>
                            <a href='backend_search.php' class='button buttonNormal'>Produkt bearbeiten</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Anzahl aller Bestellungen:</td>
                        <td>".$anzBest_sumBest[0]."</td>
                    </tr>
                    <tr>
                        <td>Summe aller Auftragswerte:</td>
                        <td>".$anzBest_sumBest[1]."€</td>
                    </tr>
                    <tr>
                        <td>Anzahl aller Bestellungen (nicht storniert):</td>
                        <td>".$anzBest_sumBest_notStorniert[0]."</td>
                    </tr>
                    <tr>
                        <td>Summe aller Auftragswerte(nicht storniert):</td>
                        <td>".$anzBest_sumBest_notStorniert[1]."€</td>
                    </tr>
                    <tr>
                        <td>Offene Bestellungen:</td>
                        <td>".$anzStatus_offen."</td>
                    </tr>
                    <tr>
                        <td>Stornierte Bestellungen:</td>
                        <td>".$anzStatus_storniert."</td>
                    </tr>
                
                </table>";
    }
    else
    {
        echo "  <div class='backend-newDBdataInput-container'>
                    <table>
                        <tr> <td> <h1>Sie haben keinen Zugriff auf diese Seite!</h1> </td> </tr>
                        <tr> <td>Sie müssen sich zuerst einloggen</td> </tr>
                        <tr> 
                            <td>Hier gehts zum Login: <br><br>
                                <form action='index.php'>
                                    <input type='submit' value='Zum Login'>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>";  
    }

    pageFooter();

?>