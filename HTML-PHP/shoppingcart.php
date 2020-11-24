<?php
session_start();
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/style.css">

    <title>

        Einkaufswagen | Gaming Heaven

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

                        <table class='shoppingCart-Table'>
                            <caption>Einkaufswagen</caption>
                            <?php

                                function searchForID_Product($ID_Produkt, $array)
                                {
                                    $n = 0;
                                    foreach ($array as $entry)
                                    {
                                        if($entry['ID_Produkt'] == $ID_Produkt)
                                        {
                                            return $n;
                                        }
                                        else
                                        {
                                            $n++;
                                        }
                                    }
                                    return FALSE;
                                }

                                if(isset($_SESSION['ShoppingCart']) && !(empty($_SESSION['ShoppingCart'])))
                                {
                                    if(isset($_GET['UpdatedShoppingCart']) && $_GET['UpdatedShoppingCart'] == TRUE)
                                    {
                                        echo "<tr class='shoppingCart-Table_Notice'>
                                                <td colspan='5'>
                                                    Ihre änderungen wurden Gespeichert!
                                                </td>
                                            </tr>";
                                    }

                                    echo"   <tr>
                                                <th>Bild</th>
                                                <th>Bezeichnung</th>
                                                <th>Menge</th>
                                                <th>Stückpreis</th>
                                                <th>Gesamtpreis</th>
                                            </tr>";

                                    //Variablen
                                    $dbserver   = "localhost";
                                    $dbuser   = "root";
                                    $dbpasswort   = "";
                                    $dbname   = "webshop";

                                    $totalCost = 0;
                                    $sqlOrderByString = '';

                                    $shoppingCart = $_SESSION['ShoppingCart'];

                                    //Verbindung zum Db-Server aufbauen
                                    $dbh = mysqli_connect($dbserver,$dbuser,$dbpasswort)
                                        or die ("Fehler bie CONNECT");
                                        
                                    //Verbindung zur Datenbank aufbauen
                                    mysqli_select_db($dbh,$dbname)
                                        or die ("Fehler bei SELECT_DB");

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

                                    echo    "<tr><td colspan='5'>";
                                    echo    $sql;
                                    echo    "</td></tr>";

                                    //SQL-Abfrage an die Datenbank senden
                                    $result = mysqli_query($dbh,$sql)
                                    or die ("Fehler bei der QUERY");

                                    foreach($shoppingCart as $i)
                                    {
                                        echo    "<tr><td colspan='5'>";
                                        print_r($i);
                                        echo    "</td></tr>";
                                    }

                                    //Ergebnis der SQL-Abfrage verarbeiten
                                    while($item = mysqli_fetch_row($result))
                                    {
                                        $indexOfItem = searchForID_Product($item[3], $shoppingCart);
                                        $totalCost += $item[2] * $shoppingCart[$indexOfItem]['Menge'];

                                        echo "<tr>";

                                        $link = "../" . $item[0];
                                        echo "  <td id='table_reihe_bild'> 
                                                    <form action='product-view.php' method='get'>
                                                        <input type='hidden' name='ID_Produkt' value='$item[3]'> 
                                                        <input class='products_table_img' type='image' src='$link' alt='$link'>
                                                    </form> 
                                                </td>";

                                        echo "<td id='table_zellen_bezeichnung'>" . $item[1] . "</td>";

                                        echo "  <td id='table_zellen_preis'> 
                                                    <form action='updateShoppingCart.php' method='POST'>
                                                        <input type='hidden' name='ProductToUpdate' value='$item[3]'>
                                                        <select name='NewAmount'>   
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
                                                        <input type='submit' value='Speichern'>
                                                    </form>
                                                    <form action='deleteFromShoppingCart.php' method='POST'>
                                                        <input type='hidden' name='ProductToDelete' value='$item[3]'>
                                                        <input type='submit' value='Entfernen' class='buttonAsLink'>
                                                    </form>
                                                </td>";

                                        echo "  <td id='table_zellen_preis'>" . $item[2] . "€</td>";

                                        echo "  <td id='table_zellen_preis'>" . $item[2] * $shoppingCart[$indexOfItem]['Menge'] . "€</td>";
                                        
                                        echo "</tr>";
                                    }
                                    echo "  <tr><td id='table_zellen_preis' align='right' colspan='5' border='none'> Insgesamt:" . $totalCost . "€</td></tr>";
                                    echo "  <tr><td id='table_zellen_preis' align='right' colspan='5' border='none'>
                                                <form action='bestellung_anschrift.php' method='POST'>
                                                    <input type='submit' value='Bestellen!'></input>
                                                </form>
                                            </td></tr>";
                                    mysqli_close($dbh);
                                }
                                else
                                {
                                    echo "  <tr class='shoppingCart-Table_Notice'>
                                                <td colspan='5'>
                                                    Es befinden sich keine Artikel im Einkaufswagen!
                                                </td>
                                            </tr>";
                                }
                            ?>
                        </table>
                
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