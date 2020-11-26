<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="icon" href="../Bilder/icons/favicon.ico">

    <title>

    <?php
                //Variablen
                $dbserver   = "localhost";
                $dbuser   = "root";
                $dbpasswort   = "";
                $dbname   = "webshop";

                $id_produkt = $_GET['ID_Produkt'];

                //Verbindung zum Db-Server aufbauen
                $dbh = mysqli_connect($dbserver,$dbuser,$dbpasswort)
                    or die ("Fehler bie CONNECT");
                    
                //Verbindung zur Datenbank aufbauen
                mysqli_select_db($dbh,$dbname)
                    or die ("Fehler bei SELECT_DB");

                //SQL-Abfrage aufstellen
                $sql = "SELECT Bezeichnung FROM produkt WHERE ID_Produkt = $id_produkt";
                
                //SQL-Abfrage an die Datenbank senden
                $result = mysqli_query($dbh,$sql)
                    or die ("Fehler bei der QUERY");

                //Ergebnis der SQL-Abfrage verarbeiten
                $row = mysqli_fetch_row($result);

                /*  Wenn z.B. der User manuell in der URL für den Wert ID_Produkt einen Wert eingegeben hat für welchen es kein Produkt in der Datenbank gibt,
                    so wird der User einfach zurück zur Startseite gesendet */
                if(empty($row))
                {
                    header("Location: http://localhost/Webshop_Melanie_Sebastian/index.php");
                }

                $product_name = $row[0];

                echo "$product_name";

                //Datenbankverbindung schließen
                mysqli_close($dbh);

        ?> | Gaming Heaven

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
                        if(isset($_GET['ID_Produkt']))
                        {
                            //Variablen
                            $dbserver   = "localhost";
                            $dbuser   = "root";
                            $dbpasswort   = "";
                            $dbname   = "webshop";

                            $id_produkt = $_GET['ID_Produkt'];

                            //Verbindung zum Db-Server aufbauen
                            $dbh = mysqli_connect($dbserver,$dbuser,$dbpasswort)
                                or die ("Fehler bie CONNECT");
                                
                            //Verbindung zur Datenbank aufbauen
                            mysqli_select_db($dbh,$dbname)
                                or die ("Fehler bei SELECT_DB");

                            //SQL-Abfrage aufstellen
                            $sql = "SELECT Picture_Path, Bezeichnung, Kurzbeschreibung, Beschreibung, Preis, Bilderquelle, ID_Produkt FROM produkt WHERE ID_Produkt ='$id_produkt'";
                            
                            //SQL-Abfrage an die Datenbank senden
                            $result = mysqli_query($dbh,$sql)
                                or die ("Fehler bei der QUERY");

                            //Ergebnis der SQL-Abfrage verarbeiten
                            $row=mysqli_fetch_row($result);

                            echo"
                                <table class='product-view-table'>
                                    <tr>
                                        <td rowspan='3' id='product-view-table_img-zelle'>
                                            <a href='$row[5]'> 
                                                <img class='product-view-img' src=\"../$row[0]\" alt='$row[0]'> 
                                            </a>
                                        </td>
                                        <td id='product-view-table_bezeichnungs-zelle' height='75px'>
                                            $row[1]
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id='product-view-table_preis-zelle'>
                                                <form action='addToShoppingCart.php' method='POST'>
                                                    <label for='ID_Produkt'>$row[4]€</label>
                                                    <input type='hidden' name='ProductToAdd' value='$row[6]'>
                                                    <input id='product-view-table_addToShoppingcart-Button' type='submit' value='In den Einkaufswagen!'>
                                                </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id='product-view-table_kurzBeschreibungs-zelle'>$row[2]</td>
                                    </tr>
                                    <tr>
                                        <td colspan='2' id='product-view-table_beschreibungs-zelle'>
                                            <span style='font-weight:bold; font-size:28px;'>Beschreibung:</span> <br>" . $row[3] . "
                                        </td>
                                    </tr>
                                </table>";

                            if(isset($_GET['AddedToShoppingCart']) && $_GET['AddedToShoppingCart'] == True)
                            {
                                echo"
                                    <div class='notice-box'>
                                        &#10004;&#65039; Erfolgreich hinzugefügt! <br>
                                        <a href='shoppingcart.php'>Hier zum Einkaufswagen</a>
                                    </div>";
                            }
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