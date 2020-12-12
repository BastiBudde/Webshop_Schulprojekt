<?php
    session_start();
    
    include "../includes/siteHeader.php";
    include "../includes/siteFooter.php";
    include "../includes/connectToDB.php";
    setlocale (LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge');

    //////////Interessante Daten wie anzahl der Bestellungen, Summe der Auftragswerte usw. besorgen\\\\\\\\\\

    /*  Anzahl und Summe aller Bestellungen und 
        Anzahl und Summe aller nicht stornierter Bestellungen und
        Anzahl und Summe aller abgeschlossenen Bestellungen abfragen */
    $sql = "SELECT COUNT(ID_Bestellung), SUM(wert)
            FROM bestellung
            UNION
            SELECT COUNT(ID_Bestellung), SUM(wert)
            FROM bestellung
            WHERE status NOT LIKE 'Storniert'
            UNION
            SELECT COUNT(ID_Bestellung), SUM(wert)
            FROM bestellung
            WHERE status LIKE 'Versendet'
                OR status LIKE 'Zugestellt';";

    $result = mysqli_query($dbh, $sql)
                        or die("Fehler bei der Query: ".mysqli_error($dbh));
                        
    $total_CountAndSum_all = mysqli_fetch_row($result);
    $total_CountAndSum_notStorniert = mysqli_fetch_row($result);
    $total_CountAndSum_complete = mysqli_fetch_row($result);

    

    /*  Anzahl der Bestellungen mit dem Status offen und
        Anzahl der Bestellungen mit dem Status storniert und 
        Anzahl der Bestellungen mit dem Status bestätigt und 
        Anzahl der Bestellungen mit dem Status versendet abfragen */
    $sql = "SELECT COUNT(ID_Bestellung)
            FROM bestellung
            WHERE status = 'In Bearbeitung';";

    $result = mysqli_query($dbh, $sql)
                or die("Fehler bei der Query: ".mysqli_error($dbh));

    $total_Count_offen = mysqli_fetch_row($result)[0];



    $sql =  "SELECT COUNT(ID_Bestellung)
            FROM bestellung
            WHERE status = 'Storniert';";

    $result = mysqli_query($dbh, $sql)
                or die("Fehler bei der Query: ".mysqli_error($dbh));

    $total_Count_storniert = mysqli_fetch_row($result)[0];



    $sql = "SELECT COUNT(ID_Bestellung)
            FROM bestellung
            WHERE status = 'Bestaetigt';";

    $result = mysqli_query($dbh, $sql)
                or die("Fehler bei der Query: ".mysqli_error($dbh));
                
    $total_Count_bestaetigt = mysqli_fetch_row($result)[0];
        
        

    $sql = "SELECT COUNT(ID_Bestellung)
            FROM bestellung
            WHERE status = 'Zugestellt';";

    $result = mysqli_query($dbh, $sql)
                        or die("Fehler bei der Query: ".mysqli_error($dbh));
    
    $total_Count_zugestellt = mysqli_fetch_row($result)[0];

    

    $sql = "SELECT COUNT(ID_Bestellung)
    FROM bestellung
    WHERE status = 'Versendet';";
    
    $result = mysqli_query($dbh, $sql)
                or die("Fehler bei der Query: ".mysqli_error($dbh));

    $total_Count_versendet = mysqli_fetch_row($result)[0];


    //////////\\\\\\\\\\

    pageHead("Backend Übersicht");

    if(isset($_SESSION['mitarbeiter_login_korrekt']) && $_SESSION['mitarbeiter_login_korrekt'] == true)
    {

        echo "
        
        <div class='flex-DirCol'>
            <div class='flex-DirCol'>

                <div class='flex-DirRow flex-SpaceBetween'>
                    <h2> Willkommen " . $_SESSION['mitarbeiter_Vorname'] . " " . $_SESSION['mitarbeiter_Nachname'] . "! </h2> 
                    
                    <form action='backend-logout.php'>
                        <input type='submit' value='Logout' class='button buttonSmall'>
                    </form>
                </div>
                <br>
                <div class='flex-DirRow flex-SpaceBetween'>    
                    <a href='backend_insertProduct.php' class='button buttonNormal'>Produkt einfügen</a>

                    <a href='backend_search.php' class='button buttonNormal'>Produkt bearbeiten</a>
                </div>

            </div>  

            <div>
                <table class='backend-webshopStatsTable'>
                    <caption><h2>Werte Monat " . strftime("%B", date("F")) . ":</h2></caption>

                    <tr>
                        <td id='name'>Anzahl aller Bestellungen:</td>
                        <td id='data'>".$total_CountAndSum_all[0]."</td>

                        <td id='spacing'></td>
                        <td id='spacing' class='borderLeft'></td>
                        
                        <td id='name'>Summe aller Auftragswerte:</td>
                        <td id='data'>".$total_CountAndSum_all[1]."€</td>

                    </td>

                    <tr>
                        <td id='name'>Anzahl aller Bestellungen (nicht storniert):</td>
                        <td id='data'>".$total_CountAndSum_notStorniert[0]."</td>
                        
                        <td id='spacing'></td>
                        <td id='spacing' class='borderLeft'></td>
                        
                        <td id='name'>Summe aller Auftragswerte (nicht storniert):</td>
                        <td id='data'>".$total_CountAndSum_notStorniert[1]."€</td>
                    </tr>

                    <tr>
                        <td id='name'>Anzahl aller Bestellungen (abgeschlossen):</td>
                        <td id='data'>".$total_CountAndSum_complete[0]."</td>
                        
                        <td id='spacing'></td>
                        <td id='spacing' class='borderLeft'></td>
                        
                        <td id='name'>Summe aller Auftragswerte (abgeschlossen):</td>
                        <td id='data'>".$total_CountAndSum_complete[1]."€</td>
                    </tr>


                    <tr id='lineTop'>
                        <td id='name' class='borderTop'>Offene Bestellungen:</td>
                        <td id='data' class='borderTop'>".$total_Count_offen."</td>

                        <td id='spacing' class='borderTop'></td>
                        <td id='spacing' class='borderTop borderLeft'></td>

                        <td id='name' class='borderTop'>Bestätigte Bestellungen:</td>
                        <td id='data' class='borderTop'>".$total_Count_bestaetigt."</td>
                    </tr>

                    <tr>
                        <td id='name'>Versendete Bestellungen:</td>
                        <td id='data'>".$total_Count_versendet."</td>

                        <td id='spacing'></td>
                        <td id='spacing' class='borderLeft'></td>

                        <td id='name'>Zugestellte Bestellungen:</td>
                        <td id='data'>".$total_Count_zugestellt."</td>
                    </tr>

                    <tr>
                        <td id='name'>Stornierte Bestellungen:</td>
                        <td id='data'>".$total_Count_storniert."</td>

                        <td id='spacing'></td>
                        <td id='spacing' class='borderLeft'></td>
                    </tr>
                </table>
            </div>

            <div>
                <table class='backend-webshopStatsTable'>
                    <caption><h2>Werte Insgesamt:</h2></caption>

                    <tr>
                        <td id='name'>Anzahl aller Bestellungen:</td>
                        <td id='data'>".$total_CountAndSum_all[0]."</td>

                        <td id='spacing'></td>
                        <td id='spacing' class='borderLeft'></td>
                        
                        <td id='name'>Summe aller Auftragswerte:</td>
                        <td id='data'>".$total_CountAndSum_all[1]."€</td>

                    </td>

                    <tr>
                        <td id='name'>Anzahl aller Bestellungen (nicht storniert):</td>
                        <td id='data'>".$total_CountAndSum_notStorniert[0]."</td>
                        
                        <td id='spacing'></td>
                        <td id='spacing' class='borderLeft'></td>
                        
                        <td id='name'>Summe aller Auftragswerte (nicht storniert):</td>
                        <td id='data'>".$total_CountAndSum_notStorniert[1]."€</td>
                    </tr>

                    <tr>
                        <td id='name'>Anzahl aller Bestellungen (abgeschlossen):</td>
                        <td id='data'>".$total_CountAndSum_complete[0]."</td>
                        
                        <td id='spacing'></td>
                        <td id='spacing' class='borderLeft'></td>
                        
                        <td id='name'>Summe aller Auftragswerte (abgeschlossen):</td>
                        <td id='data'>".$total_CountAndSum_complete[1]."€</td>
                    </tr>


                    <tr id='lineTop'>
                        <td id='name' class='borderTop'>Offene Bestellungen:</td>
                        <td id='data' class='borderTop'>".$total_Count_offen."</td>

                        <td id='spacing' class='borderTop'></td>
                        <td id='spacing' class='borderTop borderLeft'></td>

                        <td id='name' class='borderTop'>Bestätigte Bestellungen:</td>
                        <td id='data' class='borderTop'>".$total_Count_bestaetigt."</td>
                    </tr>

                    <tr>
                        <td id='name'>Versendete Bestellungen:</td>
                        <td id='data'>".$total_Count_versendet."</td>

                        <td id='spacing'></td>
                        <td id='spacing' class='borderLeft'></td>

                        <td id='name'>Zugestellte Bestellungen:</td>
                        <td id='data'>".$total_Count_zugestellt."</td>
                    </tr>

                    <tr>
                        <td id='name'>Stornierte Bestellungen:</td>
                        <td id='data'>".$total_Count_storniert."</td>

                        <td id='spacing'></td>
                        <td id='spacing' class='borderLeft'></td>
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