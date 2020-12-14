<?php
    session_start();
    
    include "../includes/siteHeader.php";
    include "../includes/siteFooter.php";
    include "../includes/connectToDB.php";

    pageHead("Einkaufswagen");

    echo"<table class='shoppingCart-Table'>
            <caption>
                <h3>Einkaufswagen</h3>";
    echo"   </caption>";

    //Überprüfen ob das Shoppingcart-Array bereits gesetzt
    //wurde und ob das erstel Objekt nicht NULL ist
    if(isset($_SESSION['ShoppingCart']) && !(empty($_SESSION['ShoppingCart'])) && $_SESSION['ShoppingCart'][0]['ID_Produkt'] != NULL)
    {
        echo"   <tr>
                    <th>Bild</th>
                    <th>Bezeichnung</th>
                    <th>Menge</th>
                    <th>Stückpreis</th>
                    <th>Gesamtpreis</th>
                </tr>";

        include "../includes/connectToDB.php";

        $indexOfItem = 0;
        $totalCost = 0;
        $sqlOrderByString = ''; //Wird in der SQL-Abfrage benötigt, damit die Produkte in der reihenfolge angezeigt werden in welcher sie hinzugefügt wurden

        //Aktuelles Shoppingcart-Array holen
        $shoppingCart = $_SESSION['ShoppingCart'];

        //SQL-Abfrage aufstellen
            $sql = "SELECT Picture_Path, Bezeichnung, Preis, ID_Produkt FROM produkt WHERE ";
            //Die einzelnen Produkt-IDs zur Abfrage hunzufügen
            foreach($shoppingCart as $produkt)
            {
                $sql .= 'ID_Produkt = ';
                $sql .= strval($produkt['ID_Produkt']);
                $sql .= ' OR ';
                $sqlOrderByString .= strval($produkt['ID_Produkt']) . ",";
            }
            //Die letzten drei Zeivhen entfernen
            $sql = substr_replace($sql, "", strlen($sql) - 3);
            
            //Sorgt im Einkaufswagen dafür, dass die Produkte in der Reihenfolge angezeigt werden, in welcher sie hinzugefügt wurden
            $sql .= "ORDER BY FIND_IN_SET(ID_Produkt,'" . $sqlOrderByString . "');";
            $sql = substr_replace($sql, "", strlen($sql) - 4, 1);

        // Mit folgendem Code kann die sql-Abfrage und das ShoppingCart-Array
        // im Einkaufswagen angezeigt werden

        // echo "<tr><td colspan='5'>";
        // echo     $sql;
        // echo "</td></tr>";
        
        // foreach($shoppingCart as $i)
        // {
        //     echo "<tr><td colspan='5'>";
        //              print_r($i);
        //     echo "</td></tr>";
        // }
        
        //SQL-Abfrage an die Datenbank senden
        $result = mysqli_query($dbh,$sql)
        or die ("Fehler bei der QUERY");

        //Ergebnis der SQL-Abfrage verarbeiten
        while($item = mysqli_fetch_row($result))
        {
            $totalCost += $item[2] * $shoppingCart[$indexOfItem]['Menge'];

            echo "<tr>";

            $link = "../" . $item[0];
            echo "  <td id='bild'> 
                        <form action='product-view.php' method='get'>
                            <input type='hidden' name='ID_Produkt' value='$item[3]'> 
                            <input class='products_table_img' type='image' src='$link' alt='$link'>
                        </form>
                    </td>";

            echo "<td id='bezeichnung'>" . $item[1] . "</td>";

            echo "  <td id='menge'> 
                        <form action='updateShoppingCart.php' method='POST'>
                            <input type='hidden' name='ProductToUpdate' value='$item[3]'>
                            <select name='NewAmount' onchange='javascript: submit();'>   
                                <option value='1'";if($shoppingCart[$indexOfItem]['Menge'] == 1){echo"selected";}echo">1</option>
                                <option value='2'";if($shoppingCart[$indexOfItem]['Menge'] == 2){echo"selected";}echo">2</option>
                                <option value='3'";if($shoppingCart[$indexOfItem]['Menge'] == 3){echo"selected";}echo">3</option>
                                <option value='4'";if($shoppingCart[$indexOfItem]['Menge'] == 4){echo"selected";}echo">4</option>
                                <option value='5'";if($shoppingCart[$indexOfItem]['Menge'] == 5){echo"selected";}echo">5</option>
                                <option value='6'";if($shoppingCart[$indexOfItem]['Menge'] == 6){echo"selected";}echo">6</option>
                                <option value='7'";if($shoppingCart[$indexOfItem]['Menge'] == 7){echo"selected";}echo">7</option>
                                <option value='8'";if($shoppingCart[$indexOfItem]['Menge'] == 8){echo"selected";}echo">8</option>
                                <option value='9'";if($shoppingCart[$indexOfItem]['Menge'] == 9){echo"selected";}echo">9</option>
                                <option value='10'";if($shoppingCart[$indexOfItem]['Menge'] == 10){echo"selected";}echo">10</option>
                            </select>
                        </form>
                        <form action='deleteFromShoppingCart.php' method='POST'>
                            <input type='hidden' name='ProductToDelete' value='$item[3]'>    
                            <input type='hidden' name='ProductToDelete_name' value='$item[1]'>
                            <input type='submit' value='Entfernen' class='buttonAsLink'>
                        </form>
                    </td>";

            echo "  <td id='preis'>" . $item[2] . "€</td>";

            echo "  <td id='preis'>" . $item[2] * $shoppingCart[$indexOfItem]['Menge'] . "€</td>";
            
            echo "</tr>";

            $indexOfItem ++;
        }
        echo "  <tr>
                    <td id='gesamtpreis' colspan='5'>
                        <div class='flex-DirRow flex-SpaceBetween smallMarginTop'>    
                            <form action='deleteFromShoppingCart.php' method='POST'>
                                <input type='hidden' name='ProductToDelete' value='0'></input>
                                <input type='submit' class='button buttonSmall' value='Alle Produkte entfernen'></input>
                            </form>
                            
                            Insgesamt:" . $totalCost . "€
                        </div>
                    </td>
                </tr>";
        echo "  <tr>
                    <td id='bestellenButton' colspan='5'>
                        <form action='bestellung_anschrift.php' method='POST'>
                            <input type='submit' class='button buttonNormal' value='Bestellen!'></input>
                        </form>
                    </td>
                </tr>";

        mysqli_close($dbh);
    }
    else
    {
        echo "<caption class='shoppingCart-Table_Notice'>
                    <h6>Es befinden sich keine Artikel im Einkaufswagen</h6>
            </caption>";
    }
    echo"</table>";

    pageFooter();
?>
