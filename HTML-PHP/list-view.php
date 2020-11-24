<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/style.css">

    <title>

        <?php 
        
            if(isset($_GET['Sparte']))
            {
                $sparte = htmlspecialchars($_GET['Sparte']);
                echo "$sparte";
            }
            if(isset($_GET['Kategorie']))
            {
                $kategorie = htmlspecialchars($_GET['Kategorie']);
                echo "$kategorie";
            }
        
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
                    
                            if((isset($_GET['Sparte'])) || (isset($_GET['Kategorie'])))
                            {
                                //Variablen
                                $dbserver   = "localhost";
                                $dbuser   = "root";
                                $dbpasswort   = "";
                                $dbname   = "webshop";
                                
                                $h = 0; // Laufvariable
                    
                                if(isset($_GET['Sparte']))
                                {
                                    $sparte = $_GET['Sparte'];
                                }
                                else
                                {
                                    $sparte = null;
                                }
                    
                                if(isset($_GET['Kategorie']))
                                {
                                    $kategorie = $_GET['Kategorie'];
                                }
                                else
                                {
                                    $kategorie = null;
                                }
                    
                                //Verbindung zum Db-Server aufbauen
                                $dbh = mysqli_connect($dbserver,$dbuser,$dbpasswort)
                                    or die ("Fehler bie CONNECT");
                                
                                //Verbindung zur Datenbank aufbauen
                                mysqli_select_db($dbh,$dbname)
                                    or die ("Fehler bei SELECT_DB");
                    
                                //SQL-Abfrage aufstellen jenachdem ob eine einzelne Kategorie oder die ganze Sparte angesehen wergen möchte
                                if(!($sparte == null))
                                {
                                    $sql = "SELECT Picture_Path, Bezeichnung, Kurzbeschreibung, Preis, ID_Produkt  FROM produkt WHERE Sparte = '$sparte'";
                                    $ueberschrift = $sparte;
                                }
                                elseif(!($kategorie == null))
                                {
                                    $sql = "SELECT Picture_Path, Bezeichnung, Kurzbeschreibung, Preis, ID_Produkt  FROM produkt WHERE Kategorie = '$kategorie'";
                                    if($kategorie == 'Maeuse')
                                    {
                                        $ueberschrift = 'Mäuse';
                                    }
                                    elseif($kategorie == 'Bettwaesche')
                                    {
                                        $ueberschrift = 'Bettwäsche';
                                    }
                                    else
                                    {
                                        $ueberschrift = $kategorie;
                                    }
                                }
                    
                                //SQL-Abfrage an die Datenbank senden
                                $result = mysqli_query($dbh,$sql)
                                    or die ("Fehler bei der QUERY");
                    
                    
                                echo "  <table class='products_table'>
                                            <caption>" . $ueberschrift . "</caption>
                                            <tr>
                                                <th>Bild</th>
                                                <th>Bezeichnung</th>
                                                <th>Kurzbeschreibung</th>
                                                <th>Preis in Euro</th>
                                            </tr>";
                                    
                                //Ergebnis der SQL-Abfrage verarbeiten
                                while($row=mysqli_fetch_row($result))
                                {
                                    echo "<tr>";
                                    foreach($row as $i)
                                    {
                                        if($h == 0)
                                        {
                                            $i = "../" . $i;
                                            echo "  <td id='table_zellen_bild'> 
                                                        <form action='product-view.php' method='get'>
                                                            <input type='hidden' name='ID_Produkt' value='$row[4]'> 
                                                            <input class='products_table_img' type='image' src='$i' alt='$i'>
                                                        </form> 
                                                    </td>";
                                        }
                                        else if($h == 1)
                                        {
                                            echo "<td id='table_zellen_bezeichnung'> $i </td>";
                                        }
                                        else if($h == 2)
                                        {
                                            echo "<td id='table_zellen_kurzbeschreibung'> $i </td>";
                                        }
                                        else if($h == 3)
                                        {
                                            echo "<td id='table_zellen_preis'> $i €</td>";
                                        }
                                        $h++;
                                    }
                                    echo "</tr>";
                                    $h = 0;
                                }
                    
                                //Datenbankverbindung schließen
                                mysqli_close($dbh);
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