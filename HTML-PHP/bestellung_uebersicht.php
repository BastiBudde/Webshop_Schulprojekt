<?php
    session_start();
    
    include "../includes/siteHeader.php";
    include "../includes/siteFooter.php";
    include "../includes/searchForID_Product.php";
    include "../includes/connectToDB.php";


    pageHead("Bestellungsübersicht");

    echo"<div>";


    if(isset($_SESSION['user_login_korrekt']) || isset($_POST['checkoutAsGuest']))
    {
        if(isset($_SESSION['user_login_korrekt']))
        {
            $vorname =          $_SESSION['user_Vorname'];
            $nachname =         $_SESSION['user_Nachname'];
            $e_Mail =           $_SESSION['user_e_mail'];
            $strasse_Hausnr =   $_SESSION['user_Strasse_Hausnr'];
            $plz =              $_SESSION['user_PLZ'];
            $ort =              $_SESSION['user_Ort'];
            $telefon =          $_SESSION['user_Telefon']; 
        }
        elseif(isset($_POST['checkoutAsGuest']))
        {
            $vorname = $_POST['Vorname'];
            $nachname = $_POST['Nachname'];
            $e_Mail = $_POST['E_Mail'];
            $strasse_Hausnr = $_POST['Strasse_Hausnr'];
            $plz = $_POST['PLZ'];
            $ort = $_POST['Ort'];
            $telefon = $_POST['Telefon']; 
        }

        //Variablen
        $totalCost = 0;
        $sqlOrderByString = '';
        $position = 1;

        $shoppingCart = $_SESSION['ShoppingCart'];

        //SQL-Abfrage aufstellen
        $sql = "SELECT Picture_Path, Bezeichnung, Preis, ID_Produkt FROM produkt WHERE ";
        foreach($shoppingCart as $produkt)
        {
            $sql .= 'ID_Produkt = ';
            $sql .= strval($produkt['ID_Produkt']);
            $sql .= ' OR ';
            $sqlOrderByString .= strval($produkt['ID_Produkt']) . ",";
        }
        $sql = substr_replace($sql, "", strlen($sql) - 3);
        
        //Sorgt im Einkaufswagen dafür, dass die Produkte in der Reihenfolge angezeigt werden, in welcher sie hinzugefügt wurden
        $sql .= "ORDER BY FIND_IN_SET(ID_Produkt,'" . $sqlOrderByString . "');";
        $sql = substr_replace($sql, "", strlen($sql) - 4, 1);

        //SQL-Abfrage an die Datenbank senden
        $result = mysqli_query($dbh,$sql)
        or die ("Fehler bei der QUERY");

        echo "  <div class='bestell-uebersicht_produktSummaryTable-container'>
                    <table class='bestell-uebersicht_produktSummaryTable'>
                        <caption></caption>
                        <tr>
                            <th>Pos.</th> <th>ArtikelNr.</th> <th>Bild</th> <th>Bezeichnung</th> <th>Menge</th> <th>Stk. Preis</th> <th>Ges. Preis</th>
                        </tr>";

        mysqli_close($dbh);

        //Ergebnis der SQL-Abfrage verarbeiten
        while($item = mysqli_fetch_row($result))
        {
            $indexOfItem = searchForID_Product($item[3], $shoppingCart);
            $totalCost += $item[2] * $shoppingCart[$indexOfItem]['Menge'];

            echo "<tr>";

            echo "<td>$position</td>";

            echo "<td>$item[3]</td>";

            $link = "../" . $item[0];
            echo "  <td> 
                        <form action='product-view.php' method='get'>
                            <input type='hidden' name='ID_Produkt' value='$item[3]'> 
                            <input type='image' src='$link' alt='$link'>
                        </form> 
                    </td>";

            echo "<td id='bezeichnung-Cell'>$item[1]</td>";

            echo "<td>" . $shoppingCart[$indexOfItem]['Menge'] . "</td>";

            echo "<td>$item[2]€</td>";

            echo "<td>" . $shoppingCart[$indexOfItem]['Menge'] * $item[2] . "€</td>";

            echo "</tr>";

            $position ++;
        }

        echo "<tr><td id='totalCost-Cell' colspan='7'>Gesamt: $totalCost €</td></tr>";

        echo "      </table>
                </div>";
                        



        echo "  <div class='bestell-uebersicht_anschrift-container'>
                    <table>
                        <caption>Adress-Informationen</caption>
                        <form action='bestellung_sendOrderToDB.php' method='post'>
                            <input type='hidden' name='ges_wert' value='".$totalCost."'></input>

                            <tr>
                                <td><input type='text' name='Vorname' required='true' value='$vorname' placeholder='Vorname'></input></td>
                                <td><input type='text' name='Nachname' required='true' value='$nachname' placeholder='Nachname'></input></td>
                            </tr>
                            
                            <tr><td colspan='2'><input type='email' name='E_Mail'  required='true' value='$e_Mail' placeholder='E-Mail' readonly></input></td></tr>

                            <tr><td colspan='2'><input type='text' name='Strasse_Hausnr' required='true' value='$strasse_Hausnr' placeholder='Straße und Hausnr.'></input></td></tr>

                            <tr>
                                <td><input type='number' name='PLZ' class='numInptWithoutArrows' required='true' value='$plz' placeholder='PLZ'></input></td>
                                <td><input type='text' name='Ort' required='true' value='$ort' placeholder='Ort'></input></td>
                            </tr>
                            
                            <tr><td colspan='2'><input type='text' name='Telefon' value='$telefon' placeholder='Telefon'></input></td></tr>

                            <tr><td><input type='submit' class='button buttonSmall' value='Kostenpflichtig bestellen!' ></input></td></tr>
                        </form>
                    </table>
                </div>";
    }
    else
    {
        header("Location: shoppingcart.php");
    }

    pageFooter();
                        
?>