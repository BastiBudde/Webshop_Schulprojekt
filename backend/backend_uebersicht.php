<?php
    session_start();
    
    include "../includes/siteHeader.php";
    include "../includes/siteFooter.php";
    include "../includes/connectToDB.php";

    //////////Interessante Daten wie anzahl der Bestellungen, Summe der Auftragswerte usw. besorgen\\\\\\\\\\

    /*  Anzahl an Bestellungen Summe aller Bestellungen holen und 
        Anzahl nicht stornierter Bestellungen und Summe aller nicht stornierten Auftragswerte abfragen */
    $sql = "SELECT COUNT(ID_Bestellung), SUM(wert)
            FROM bestellung
            UNION
            SELECT COUNT(ID_Bestellung), SUM(wert)
            FROM bestellung
            WHERE status NOT LIKE 'Storniert';";

    $result = mysqli_query($dbh, $sql)
                        or die("Fehler bei der Query: ".mysqli_error($dbh));
                        
    $anzBest_sumBest = mysqli_fetch_row($result);
    $anzBest_sumBest_notStorniert = mysqli_fetch_row($result);

    

    /*  Anzahl der Bestellungen mit dem Status offen holen und
        Anzahl der Bestellungen mit dem Status storniert abfragen */
    $sql = "SELECT COUNT(ID_Bestellung)
            FROM bestellung
            WHERE status = 'In Bearbeitung'
            UNION
            SELECT COUNT(ID_Bestellung)
            FROM bestellung
            WHERE status = 'Storniert';";

    $result = mysqli_query($dbh, $sql)
                        or die("Fehler bei der Query: ".mysqli_error($dbh));
    
    $anzStatus_offen = mysqli_fetch_row($result)[0];
    $anzStatus_storniert = mysqli_fetch_row($result)[0];



    //////////\\\\\\\\\\

    pageHead("Backend Übersicht");

    if(isset($_SESSION['mitarbeiter_login_korrekt']) && $_SESSION['mitarbeiter_login_korrekt'] == true)
    {

        echo "
        
        <div class='flex-DirCol'>
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
                    
                    </table>
                </div>
                
                <div class='backend-newDBdataInput-container'>
                
                    <table>
                    
                        <tr>
                            <td>Anzahl aller Bestellungen:</td>
                            <td>".$anzBest_sumBest[0]."</td>
                        </tr>
                        <tr>
                            <td>Anzahl aller Bestellungen (nicht storniert):</td>
                            <td>".$anzBest_sumBest_notStorniert[0]."</td>
                        </tr>
                        <tr>
                            <td>Summe aller Auftragswerte:</td>
                            <td>".$anzBest_sumBest[1]."€</td>
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
                    
                    </table>

                </div>
            </div>";
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