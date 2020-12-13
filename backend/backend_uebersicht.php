<?php
    session_start();
    
    include "../includes/siteHeader.php";
    include "../includes/siteFooter.php";
    include "../includes/connectToDB.php";
    setlocale (LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge');

    //////////Interessante Daten wie anzahl der Bestellungen, Summe der Auftragswerte usw. besorgen\\\\\\\\\\

    /*  Anzahl und Summe aller Bestellungen, aller nicht stornierten Bestellungen und
        aller abgeschlossenen Bestellungen abfragen */
        $sql = "SELECT COUNT(ID_Bestellung), SUM(wert)
                FROM bestellung

                UNION ALL

                SELECT COUNT(ID_Bestellung), SUM(wert)
                FROM bestellung
                WHERE status NOT LIKE 'Storniert'

                UNION ALL

                SELECT COUNT(ID_Bestellung), SUM(wert)
                FROM bestellung
                WHERE status LIKE 'Versendet'
                    OR status LIKE 'Zugestellt';";

        $result = mysqli_query($dbh, $sql)
                            or die("Fehler bei der Query (Anzahl und Summen Bestellungen alle Monate): ".mysqli_error($dbh));
                            
        $total_CountAndSum_all = mysqli_fetch_row($result);
        $total_CountAndSum_notStorniert = mysqli_fetch_row($result);
        $total_CountAndSum_complete = mysqli_fetch_row($result);
    

    /*  Anzahl der Bestellungen mit dem Status offen, dem Status bestaetigt, dem Status storniert,
        dem Status versendet und dem Status zugestellt abfragen*/
        $sql = "SELECT COUNT(ID_Bestellung)
                FROM bestellung
                WHERE status = 'In Bearbeitung'
                
                UNION ALL
                
                SELECT COUNT(ID_Bestellung)
                FROM bestellung
                WHERE status = 'Storniert'
                
                UNION ALL
                
                SELECT COUNT(ID_Bestellung)
                FROM bestellung
                WHERE status = 'Bestaetigt'
                
                UNION ALL
                
                SELECT COUNT(ID_Bestellung)
                FROM bestellung
                WHERE status = 'Zugestellt'
                
                UNION ALL 
                
                SELECT COUNT(ID_Bestellung)
                FROM bestellung
                WHERE status = 'Versendet';";

        $result = mysqli_query($dbh, $sql)
                    or die("Fehler bei der Query (Anzahl Status Bestellungen alle Monate): ".mysqli_error($dbh));

        $total_Count_offen = mysqli_fetch_row($result)[0];
        $total_Count_storniert = mysqli_fetch_row($result)[0];
        $total_Count_bestaetigt = mysqli_fetch_row($result)[0];
        $total_Count_zugestellt = mysqli_fetch_row($result)[0];
        $total_Count_versendet = mysqli_fetch_row($result)[0];
   

        

    /*  Anzahl und Summe aller Bestellungen, aller nicht stornierten Bestellungen und
        aller abgeschlossenen Bestellungen des aktuellen Monat abfragen */
        $currMonth = date('Y-m-01 00:00:00');
        
        $sql = "SELECT COUNT(ID_Bestellung), COALESCE(SUM(wert), 0)
                FROM bestellung
                WHERE Timestamp > '$currMonth'

                UNION ALL

                SELECT COUNT(ID_Bestellung), COALESCE(SUM(wert), 0)
                FROM bestellung
                WHERE status NOT LIKE 'Storniert'
                    AND Timestamp > '$currMonth'

                UNION ALL

                SELECT COUNT(ID_Bestellung), COALESCE(SUM(wert), 0)
                FROM bestellung
                WHERE (status LIKE 'Versendet' OR status LIKE 'Zugestellt')  
                    AND Timestamp > '$currMonth';";
        print_r($sql);
        $result = mysqli_query($dbh, $sql)
                    or die("Fehler bei der Query (Anzahl und Summen Bestellungen dieser Monate): ".mysqli_error($dbh));
                  
        $currMonth_CountAndSum_all = mysqli_fetch_row($result);
        $currMonth_CountAndSum_notStorniert = mysqli_fetch_row($result);
        $currMonth_CountAndSum_complete = mysqli_fetch_row($result);


    /*  Anzahl der Bestellungen mit dem Status offen, dem Status bestaetigt, dem Status storniert,
        dem Status versendet und dem Status zugestellt aus dem aktuellen Monat abfragen*/
        $sql = "SELECT COUNT(ID_Bestellung)
                FROM bestellung
                WHERE status = 'In Bearbeitung'
                    AND Timestamp > '$currMonth'
                
                UNION ALL
                
                SELECT COUNT(ID_Bestellung)
                FROM bestellung
                WHERE status = 'Storniert'
                    AND Timestamp > '$currMonth'
                
                UNION ALL
                
                SELECT COUNT(ID_Bestellung)
                FROM bestellung
                WHERE status = 'Bestaetigt'
                    AND Timestamp > '$currMonth'
                
                UNION ALL
                
                SELECT COUNT(ID_Bestellung)
                FROM bestellung
                WHERE status = 'Zugestellt'
                    AND Timestamp > '$currMonth'
                
                UNION ALL 
                
                SELECT COUNT(ID_Bestellung)
                FROM bestellung
                WHERE status = 'Versendet'
                    AND Timestamp > '$currMonth';";

        $result = mysqli_query($dbh, $sql)
                    or die("Fehler bei der Query (Anzahl Status Bestellungen dieser Monate): ".mysqli_error($dbh));

        $currMonth_Count_offen = mysqli_fetch_row($result)[0];
        $currMonth_Count_storniert = mysqli_fetch_row($result)[0];
        $currMonth_Count_bestaetigt = mysqli_fetch_row($result)[0];
        $currMonth_Count_zugestellt = mysqli_fetch_row($result)[0];
        $currMonth_Count_versendet = mysqli_fetch_row($result)[0];




    //////////Seite aufstellen\\\\\\\\\\

    pageHead("Backend Übersicht");

    if(isset($_SESSION['mitarbeiter_login_korrekt']) && $_SESSION['mitarbeiter_login_korrekt'] == true)
    {

        echo "
        
        <div class='flex-DirCol hugeMarginBottom'>
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
            
            
            <!-- Werte des aktuellen Monats -->

            <div>
                <table class='backend-webshopStatsTable'>
                    <caption><h2>Werte Monat " . strftime("%B", time()) . ":</h2></caption>

                    <tr>
                        <td id='name'>Anzahl aller Bestellungen:</td>
                        <td id='data'>".$currMonth_CountAndSum_all[0]."</td>

                        <td id='spacing'></td>
                        <td id='spacing' class='borderLeft'></td>
                        
                        <td id='name'>Summe aller Auftragswerte:</td>
                        <td id='data'>".$currMonth_CountAndSum_all[1]."€</td>

                    </td>

                    <tr>
                        <td id='name'>Anzahl aller Bestellungen (nicht storniert):</td>
                        <td id='data'>".$currMonth_CountAndSum_notStorniert[0]."</td>
                        
                        <td id='spacing'></td>
                        <td id='spacing' class='borderLeft'></td>
                        
                        <td id='name'>Summe aller Auftragswerte (nicht storniert):</td>
                        <td id='data'>".$currMonth_CountAndSum_notStorniert[1]."€</td>
                    </tr>

                    <tr>
                        <td id='name'>Anzahl aller Bestellungen (abgeschlossen):</td>
                        <td id='data'>".$currMonth_CountAndSum_complete[0]."</td>
                        
                        <td id='spacing'></td>
                        <td id='spacing' class='borderLeft'></td>
                        
                        <td id='name'>Summe aller Auftragswerte (abgeschlossen):</td>
                        <td id='data'>".$currMonth_CountAndSum_complete[1]."€</td>
                    </tr>


                    <tr id='lineTop'>
                        <td id='name' class='borderTop'>Offene Bestellungen:</td>
                        <td id='data' class='borderTop'>".$currMonth_Count_offen."</td>

                        <td id='spacing' class='borderTop'></td>
                        <td id='spacing' class='borderTop borderLeft'></td>

                        <td id='name' class='borderTop'>Bestätigte Bestellungen:</td>
                        <td id='data' class='borderTop'>".$currMonth_Count_bestaetigt."</td>
                    </tr>

                    <tr>
                        <td id='name'>Versendete Bestellungen:</td>
                        <td id='data'>".$currMonth_Count_versendet."</td>

                        <td id='spacing'></td>
                        <td id='spacing' class='borderLeft'></td>

                        <td id='name'>Zugestellte Bestellungen:</td>
                        <td id='data'>".$currMonth_Count_zugestellt."</td>
                    </tr>

                    <tr>
                        <td id='name'>Stornierte Bestellungen:</td>
                        <td id='data'>".$currMonth_Count_storniert."</td>

                        <td id='spacing'></td>
                        <td id='spacing' class='borderLeft'></td>
                    </tr>
                </table>
            </div>


            <!-- Werte insgesamt -->

            <div>
                <table class='backend-webshopStatsTable'>
                    <caption><h2>Werte insgesamt:</h2></caption>

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