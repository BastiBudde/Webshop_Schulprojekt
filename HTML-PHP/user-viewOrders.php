<?php
    session_start();

    //Wenn Benutzter nicht eingeloggt ist wird er zum Login weitergeleitet
    if(!(isset($_SESSION['user_login_korrekt'])))
    {
        header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/user-login.php");
    }   
    
    include "../includes/siteHeader.php";
    include "../includes/siteFooter.php";

    pageHead("Meine Bestellungen");
                  
    if(isset($_SESSION['user_login_korrekt']) && $_SESSION['user_login_korrekt'] == true)
    {
        include "../includes/connectToDB.php";

        // Abfrage um alle Bestellungen(mit ID_Bestellung, Timestamp, Wert, Status und Versandinformationen) 
        // und die dazugehörigen Produkte(mit ID_Produkt und Bezeichnung, Menge, Stückpreis und Bilderpfad) eines Nutzers abzufragen
        $sql = "SELECT  bestellung.ID_Bestellung, bestellung.Timestamp, bestellung.wert, bestellung.status, 
                        produkt.ID_Produkt, produkt.Bezeichnung, bestellung_produkt.Menge, bestellung_produkt.stk_preis, produkt.Picture_Path,
                        bestellung.Name, bestellung.Vorname, bestellung.Strasse_Hausnr, bestellung.PLZ, bestellung.Ort
                FROM kunde, bestellung, kunde_bestellung, produkt, bestellung_produkt 
                WHERE kunde.ID_Kunde = kunde_bestellung.ID_Kunde 
                    AND bestellung.ID_Bestellung = kunde_bestellung.ID_Bestellung 
                    AND bestellung.ID_Bestellung = bestellung_produkt.ID_Bestellung 
                    AND produkt.ID_Produkt = bestellung_produkt.ID_Produkt 
                    AND kunde.ID_Kunde = " . $_SESSION['user_ID_kunde'] . "
                ORDER BY bestellung.Timestamp DESC;";

        $result = mysqli_query($dbh, $sql)
            or die("Fehler beim abrufen der Bestellungen!\n"  . mysqli_errno($dbh) . ": " . mysqli_error($dbh));

        $bestellungen_grouped = array();
        $prev_ID_Bestellung = 0;


        if($result->num_rows > 0)
        {
            // Das resultset wird hier auseinander genommen und in eine besser weiterzuverarbeitende Form gebracht
            // Dabei wird nach 'Order_Head' und 'Order_Item' sortiert damit bei der Ausgabe zwichen den beiten Typen 
            // unterschieden werden kann
            while($bestellung = mysqli_fetch_row($result))
            {
                if($bestellung[0] != $prev_ID_Bestellung)
                {
                    $anschrift = $bestellung[10]." ".$bestellung[9].",<br>".$bestellung[11]."<br>".$bestellung[12]." ".$bestellung[13];
                    $ganzerName = $bestellung[10]." ".$bestellung[9];

                    $bestellungen_grouped[] = array('Art' =>            'Order_Header',
                                                    'ID_Bestellung' =>  $bestellung[0],
                                                    'Timestamp' =>      $bestellung[1],
                                                    'Wert' =>           $bestellung[2],
                                                    'Status' =>         $bestellung[3],
                                                    'Anschrift' =>      $anschrift,
                                                    'GanzerName' =>     $ganzerName);

                    $bestellungen_grouped[] = array('Art' =>            'Order_Item',
                                                    'ID_Produkt' =>     $bestellung[4],
                                                    'ID_Bestellung' =>  $bestellung[0],
                                                    'Status' =>         $bestellung[3],
                                                    'Bezeichnung' =>    $bestellung[5],
                                                    'Menge' =>          $bestellung[6],
                                                    'Stk_Preis' =>      $bestellung[7],
                                                    'Picture_Path' =>   $bestellung[8]);
                }
                else
                {
                    $bestellungen_grouped[] = array('Art' =>            'Order_Item',
                                                    'ID_Produkt' =>     $bestellung[4],
                                                    'ID_Bestellung' =>  $bestellung[0],
                                                    'Status' =>         $bestellung[3],
                                                    'Bezeichnung' =>    $bestellung[5],
                                                    'Menge' =>          $bestellung[6],
                                                    'Stk_Preis' =>      $bestellung[7],
                                                    'Picture_Path' =>   $bestellung[8]);
                }

                $prev_ID_Bestellung = $bestellung[0];
            }

            // Nun wird für jede Bestellung ein eigener Container "singleOrderContainer" erstellt in welchem sich
            // Jeweils ein "orderHead" mit Datum, Bestellnummer etc. und ein weiterer Container "orderItemsContainer"
            // befinden. Im "orderItemsContainer" befinden sich die einzelnen Produkte "orderItem" mit Produktnummer, 
            // Preis, Menge, etc. 
            echo "<div class='allOrdersContainer flex-DirCol bigMarginBottom'>";
            echo "<h1 class='textAlLeft middleMarginBottom'>&nbsp;Ihre Bestellungen</h1>";
            
            $aktueller_index = 0;

            //Damit Wochentage auf Deutsch ausgegeben werden
            setlocale (LC_ALL, 'de_DE@euro', 'de_DE', 'de', 'ge');

            foreach($bestellungen_grouped as $item)
            {
                // Falls das aktuelle Objekt aus dem Array 'bestellungen_grouped' ein 'Order_Header' ist wird dieser Code ausgeführt
                if($item['Art'] == 'Order_Header')
                {
                    echo "<div class='singleOrderContainer flex-DirCol bigBlueRoundedBorder middleMarginBottom'>";

                        echo "<div class='orderHead flex-DirRow flex-SpaceBetween lightRoundedBorder smallMarginBottom'>";

                            echo "<div class='flex-DirCol textAlLeft'>
                                    <small>AUFGEGEBEN AM</small> 
                                    <a>" . strftime("%A %e. %B %G", strtotime($item['Timestamp'])) . "</a>
                                </div>

                                <div class='flex-DirCol textAlLeft'>
                                    <small>SUMME</small>
                                    <a>" . $item['Wert'] . "€</a>
                                </div>

                                <div class='flex-DirCol textAlLeft'>
                                    <small>VERSANDADRESSE</small>
                                    <a><dfn class='tooltip'>
                                        " . $item['GanzerName'] . "&#x21E9;
                                        <span role='tooltip'>" . $item['Anschrift'] . "</span>
                                    </dfn></a>
                                </div>

                                <div class='flex-DirCol textAlLeft'>
                                    <small>BESTELLNR.</small>
                                    <a>" . $item['ID_Bestellung'] . "</a>
                                </div>

                                <div class='flex-DirCol textAlLeft'>
                                    <small>STATUS</small>
                                    <a>" . $item['Status'] . "</a>
                                </div>";
                            
                        echo"</div>";
                        echo"<div class='orderItemsContainer flex-DirCol lightRoundedBorder'>";
                }
                // Falls das aktuelle Objekt aus dem Array 'bestellungen_grouped' ein 'Order_Item' ist wird dieser Code ausgeführt
                else
                {
                    echo"<div class='orderItem flex-DirRow flex-SpaceBetween'>";
                    echo"   <div id='orderItem_ImgCell'>
                                <form action='product-view.php' method='GET'>
                                    <input type='hidden' name='ID_Produkt' value='".$item['ID_Produkt']."'></input>
                                    <input type='image' src='../".$item['Picture_Path']."' alt='".$item['Picture_Path']."'>
                                </form>
                            </div>

                            <div id='orderItem_NummerCell'>
                                <small>Produktnr.</small>
                                <a>".$item['ID_Produkt']."</a>
                            </div>

                            <div id='orderItem_BezeichnungCell'>
                                <small>Bezeichnung</small>
                                <a>".$item['Bezeichnung']."</a>
                            </div>

                            <div id='orderItem_StkPreisCell'>
                                <small>Stk. Preis</small>
                                <a>".$item['Stk_Preis']."€</a>
                            </div>

                            <div id='orderItem_MengeCell'>
                                <small>Menge</small>
                                <a>".$item['Menge']." Stk.</a>
                            </div>

                            <div id='orderItem_GesPreisCell'>
                                <small>Ges. Preis</small>
                                <a>".$item['Stk_Preis'] * $item['Menge']."€</a>
                            </div>";
                    echo"</div>";
                }
                // Sollte das nächste Objekt aus dem Array 'bestellungen_grouped' ein 'Order_Head sein so werden hier
                // die Container 'orderItemsContainer' und 'singleOrderContainer'wieder geschlossen
                if((isset($bestellungen_grouped[$aktueller_index + 1]['Art']) && $bestellungen_grouped[$aktueller_index + 1]['Art'] === 'Order_Header') ||
                            !(isset($bestellungen_grouped[$aktueller_index + 1]['Art'])))
                {
                    //Wenn die Bestellung den Status 'In Bearbeitung', 'Bestaetigt' oder 'Versendet' hat wird ein 'stornieren'-Button angezeigt
                    if($item['Status'] == 'In Bearbeitung' || $item['Status'] == 'Bestaetigt' || $item['Status'] == 'Versendet')
                    {
                        echo"<div class='flex-DirCol textAlLeft' style='width: 100%; align-items: flex-end;'>
                                <form action='bestellung_stornieren.php' method='post' onSubmit='return confirm(\"Wollen sie diese Bestellung wirklich stornieren?\");'>                                                       
                                    <input type='hidden' name='orderIdToCancel' value='".$item['ID_Bestellung']."'></input>
                                    <input type='submit' value='Stornieren' class='buttonAsLink'></input>
                                </form>
                            </div>";
                    }

                    echo "</div> <!-- orderItems closed -->";
                    echo "</div> <!-- singleOrder closed -->";
                }

                $aktueller_index ++;
            }

            // "allOrdersContainer" wird wieder geschlossen
            echo "</div> <!-- allOrders closed -->";    
        }
        //Sollte das Resultset leer sein so wird die nachricht ausgegeben, dass keine Bestellungen vorliegen
        else
        {
            echo "  <div class='allOrdersContainer'>
                    
                        <h1>Von ihnen liegen noch keine Bestellungen vor</h1>

                    </div>";
        }              
    }
    else
    {
        header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/user-login.php");
    }

    pageFooter()
?>