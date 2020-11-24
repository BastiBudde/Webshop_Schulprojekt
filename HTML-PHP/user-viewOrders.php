<?php
session_start();

if(!(isset($_SESSION['user_login_korrekt'])))
{
    header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/user-login.php");
}
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/style.css">

    <title>

        Meine Bestellungen | Gaming Heaven

    </title>

</head>

<body>

    <header class="header">

        <h1>Gaming Heaven</h1>

        <div class="header-logo-frame">
            <a href="../index.php">
                <img src="../Bilder/GamingHeavenLogo.svg" class="header-logo-img" alt="logo.png" title="Logo" height="75">
            </a>
        </div>

        <div class="header-shopping-cart-frame">
            <a href="../HTML-PHP/shoppingcart.php">
                <img src="../Bilder/shoppingcart-icon.png" class="header-shopping-cart-img" alt="shoppingcart-icon.png"
                    title="Einkaufswagen" height="60" width="60">
            </a>
        </div>

        <div class="header-user-login-frame">
            <a href="../HTML-PHP/user-login.php">
                <img src="../Bilder/user-login-icon.png" class="header-user-login-img" alt="shoppingcart-icon.png"
                    title="User-Login" height="60" width="60">
            </a>
        </div>

    </header>

    <nav class="fixed-navbar">

        <div class="dropdowns-container">

            <!-- Dropdown Menü für die Sparte Computerspiele-->
            <div class="games-dropdown">
                <form action="../HTML-PHP/list-view.php" method="get">
                    <input type="hidden" name="Sparte" value="Games">
                    <input class="games-dropdown-head" type="submit" value="Games">
                </form>

                <!-- Inhalt des Computerspiele-Dropdown-Menüs -->
                <div class="games-dropdown-content">
                    <table>
                        <tr>
                            <td> 
                                <form action="../HTML-PHP/list-view.php" method="get">
                                    <input type='hidden' name="Kategorie" value="Action"></input>
                                    <input class="games-dropdown-button" type="submit" value="Action">
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <form action="../HTML-PHP/list-view.php" method="get">
                                    <input type='hidden' name="Kategorie" value="Adventure"></input>
                                    <input class="games-dropdown-button" type="submit" value="Adventure"> 
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <form action="../HTML-PHP/list-view.php" method="get">
                                    <input type='hidden' name="Kategorie" value="Science-Fiction"></input>
                                    <input class="games-dropdown-button" type="submit" value="Science-Fiction"> 
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Dropdown Menü für die Sparte Hardware-->
            <div class="hardware-dropdown">
                <form action="../HTML-PHP/list-view.php" method="get">
                    <input type="hidden" name="Sparte" value="Hardware">
                    <input class="hardware-dropdown-head" type="submit" value="Hardware">
                </form>

                <!-- Inhalt des Hardware-Dropdown-Menüs -->
                <div class="hardware-dropdown-content">
                    <table>
                        <tr>
                            <td> 
                                <form action="../HTML-PHP/list-view.php" method="get">
                                    <input type='hidden' name="Kategorie" value="Monitore"></input>
                                    <input class="hardware-dropdown-button" type="submit" value="Monitore"> 
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <form action="../HTML-PHP/list-view.php" method="get">
                                    <input type='hidden' name="Kategorie" value="Tastaturen"></input>
                                    <input class="hardware-dropdown-button" type="submit" value="Tastaturen"> 
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <form action="../HTML-PHP/list-view.php" method="get">
                                    <input type='hidden' name="Kategorie" value="Maeuse"></input>
                                    <input class="hardware-dropdown-button" type="submit" value="Mäuse"> 
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <form action="../HTML-PHP/list-view.php" method="get">
                                    <input type='hidden' name="Kategorie" value="Headsets"></input>
                                    <input class="hardware-dropdown-button" type="submit" value="Headsets">
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Dropdown Menü für die Sparte Fanartikel-->
            <div class="fanarticle-dropdown">
                <form action="../HTML-PHP/list-view.php" method="get">
                    <input type="hidden" name="Sparte" value="Fanartikel">
                    <input class="fanarticle-dropdown-head" type="submit" value="Fanartikel">
                </form>

                <!-- Inhalt des Fanartikel-Dropdown-Menüs -->
                <div class="fanarticle-dropdown-content">
                    <table>
                        <tr>
                            <td> 
                                <form action="../HTML-PHP/list-view.php" method="get">
                                    <input type='hidden' name="Kategorie" value="Figuren"></input>
                                    <input class="hardware-dropdown-button" type="submit" value="Figuren"> 
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <form action="../HTML-PHP/list-view.php" method="get">
                                    <input type='hidden' name="Kategorie" value="Kleidung"></input>
                                    <input class="hardware-dropdown-button" type="submit" value="Kleidung">
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <form action="../HTML-PHP/list-view.php" method="get">
                                    <input type='hidden' name="Kategorie" value="Bettwaesche"></input>
                                    <input class="hardware-dropdown-button" type="submit" value="Bettwäsche"> 
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <form action="../HTML-PHP/list-view.php" method="get">
                                    <input type='hidden' name="Kategorie" value="Accessoires"></input>
                                    <input class="hardware-dropdown-button" type="submit" value="Accessoires"> 
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>

    </nav>

    
    <table class="artilcle-footer-table">
        <tr>
           <td>
                <article class="article">
                    <?php
                    
                        if(isset($_SESSION['user_login_korrekt']) && $_SESSION['user_login_korrekt'] == true)
                        {
                            include "../includes/connectToDB.php";

                            //Abfrage um alle Bestellungen(mit ID_Bestellung und Timestamp) und die dazugehörigen Produkte(mit ID_Produkt und Bezeichnung) mit Mengenangaben eines Nutzers abzufragen
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
                                                            " . $item['GanzerName'] . "
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
                                        echo"   <div>
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
                    ?>
                </article>
           </td> 
        </tr>
        <tr>
           <td>
                <footer class="footer">
                    <p>Hello World!</p>
                </footer>
           </td> 
        </tr>
    </table>

</body>

</html>