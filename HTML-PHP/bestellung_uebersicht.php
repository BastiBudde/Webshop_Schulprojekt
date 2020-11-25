<?php
session_start();
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="icon" href="../Bilder/icons/favicon.ico">

    <title>

        Startseite | Gaming Heaven

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

                    <div>
                        <?php

                            include "../includes/searchForID_Product.php";

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
                                $dbserver   = "localhost";
                                $dbuser   = "root";
                                $dbpasswort   = "";
                                $dbname   = "webshop";

                                $totalCost = 0;
                                $sqlOrderByString = '';
                                $position = 1;

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

                                //SQL-Abfrage an die Datenbank senden
                                $result = mysqli_query($dbh,$sql)
                                or die ("Fehler bei der QUERY");

                                echo "  <div class='bestell-uebersicht_produktSummaryTable-container'>
                                            <table class='bestell-uebersicht_produktSummaryTable'>
                                                <caption></caption>
                                                <tr>
                                                    <th>Pos.</th> <th>ArtikelNr.</th> <th>Bild</th> <th>Bezeichnung</th> <th>Menge</th> <th>Stk. Preis</th> <th>Ges. Preis</th>
                                                </tr>";

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

                                    echo "<td>$item[1]</td>";

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

                                                    <tr>
                                                        <td><input type='text' name='Vorname' required='true' value='$vorname' placeholder='Vorname'></input></td>
                                                        <td><input type='text' name='Nachname' required='true' value='$nachname' placeholder='Nachname'></input></td>
                                                    </tr>
                                                    
                                                    <tr><td colspan='2'><input type='email' name='E_Mail' required='true' value='$e_Mail' placeholder='E-Mail'></input></td></tr>

                                                    <tr><td colspan='2'><input type='text' name='Strasse_Hausnr' required='true' value='$strasse_Hausnr' placeholder='Straße und Hausnr.'></input></td></tr>

                                                    <tr>
                                                        <td><input type='number' name='PLZ' class='numInptWithoutArrows' required='true' value='$plz' placeholder='PLZ'></input></td>
                                                        <td><input type='text' name='Ort' required='true' value='$ort' placeholder='Ort'></input></td>
                                                    </tr>
                                                    
                                                    <tr><td colspan='2'><input type='text' name='Telefon' value='$telefon' placeholder='Telefon'></input></td></tr>

                                                    <tr><td><input type='submit' id='submit-button' value='Kostenpflichtig bestellen!' ></input></td></tr>
                                                </form>
                                            </table>
                                        </div>";
                            }
                            else
                            {
                                header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/shoppingcart.php");
                            }

                        
                        ?>
                    </div>

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