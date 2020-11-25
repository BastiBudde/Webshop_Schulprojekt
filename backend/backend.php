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

        Backend | Gaming Heaven
    
    </title>

    <script language="javascript" type="text/javascript">
    function dynamicdropdown(listindex)
    {
        switch (listindex)
        {
        case "Games" :
            document.getElementById("Kategorie").options[0]=new Option("Kategorie wählen","");
            document.getElementById("Kategorie").options[1]=new Option("Action","Action");
            document.getElementById("Kategorie").options[2]=new Option("Adventure","Adventure");
            document.getElementById("Kategorie").options[3]=new Option("Science-Fiction","Science-Fiction");
            break;
        case "Hardware" :
            document.getElementById("Kategorie").options[0]=new Option("Kategorie wählen","");
            document.getElementById("Kategorie").options[1]=new Option("Monitore","Monitore");
            document.getElementById("Kategorie").options[2]=new Option("Tastaturen","Tastaturen");
            document.getElementById("Kategorie").options[3]=new Option("Mäuse","Maeuse");
            document.getElementById("Kategorie").options[4]=new Option("Headsets","Headsets");
            break;
        case "Fanartikel" :
            document.getElementById("Kategorie").options[0]=new Option("Kategorie wählen","");
            document.getElementById("Kategorie").options[1]=new Option("Figuren","Figuren");
            document.getElementById("Kategorie").options[2]=new Option("Kleidung","Kleidung");
            document.getElementById("Kategorie").options[3]=new Option("Bettwäsche","Bettwaesche");
            document.getElementById("Kategorie").options[3]=new Option("Accessories","Accessories");
            break;
        }
        return true;
    }
    </script>

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
                        if(isset($_SESSION['mitarbeiter_login_korrekt']) && $_SESSION['mitarbeiter_login_korrekt'] == true)
                        {
                            echo "
                                <div class='backend-newDBdataInput-container'>
            
                                    <form action='saveToDB.php' method='POST'>
                                    
                                        <table>

                                            <caption>
                                                <div>
                                                    <h2> Willkommen " . $_SESSION['mitarbeiter_Vorname'] . " " . $_SESSION['mitarbeiter_Nachname'] . "! </h2> 
                                                    
                                                    <form action='backend-logout.php'>
                                                        <input type='submit' value='Logout'>
                                                    </form>
                                                </div>
                                            </caption>";

                                            if(isset($_GET['save_successfull']) && $_GET['save_successfull'] == True)
                                            {
                                                echo "
                                                    <tr> 
                                                        <td colspan='3'>
                                                            <span style='font-weight: bold;'>Erfolgreich in Datenbank gespeichert!</span>
                                                        </td>
                                                    </tr>
                                                ";
                                            }
                                echo"            
                                            <tr>
                                                <td> <label for='Bezeichnung'>Bezeichnung</label> </td>
                                                <td> <input type='text' id='Bezeichnung' class='Bezeichnung' name='Bezeichnung' required='true' maxlength='35'> </td>
                                            </tr>
                                            <tr>
                                                <td> <label for='Kurzbeschreibung'>Kurzbeschreibung</label> </td>
                                                <td> <textarea rows='5' cols='60' id='Kurzbeschreibung' name='Kurzbeschreibung' required='true'></textarea></td>
                                            </tr>
                                            <tr>
                                                <td> <label for='Beschreibung'>Beschreibung</label> </td>
                                                <td> <textarea rows='15' cols='60' id='Beschreibung' name='Beschreibung' required='true'></textarea></td>
                                            </tr>
                                            <tr>
                                                <td> <label for='Preis'>Preis</label> </td>
                                                <td> <input type='number' id='Preis' name='Preis' required='true' min='0' max='999.99' step='0.01'> </td>
                                            </tr>
                                            <tr>
                                                <td> <label for='Sparte'>Sparte</label> </td>
                                                <td> 
                                                    <select id='Sparte' name='Sparte' required='true' onchange='javascript: dynamicdropdown(this.options[this.selectedIndex].value);'>
                                                        <option value=''>Sparte Wählen</option>
                                                        <option value='Games'>Games</option>
                                                        <option value='Hardware'>Hardware</option>
                                                        <option value='Fanartikel'>Fanartikel</option>
                                                    </select>
                                                </td> 
                                            </tr>
                                            <tr>
                                                <td> <label for='Kategorie'>Kategorie</label> </td>
                                                <td> 
                                                    <script type='text/javascript' language='JavaScript'>
                                                        document.write(\"<select name='Kategorie' id='Kategorie' required='true'><option value=''>Select Kategorie</option></select>\")
                                                    </script>
                                                    <noscript>
                                                        <select id='Kategorie' name='Kategorie'>
                                                        </select>
                                                    </noscript>
                                                </td> 
                                            </tr>
                                            <tr>
                                                <td> <label for='Picture_Path'>Bilder-Pfad*</label> </td>
                                                <td> <input type='text' id='Picture_Path' name='Picture_Path' required='true' value='Bilder/'> </td>
                                            </tr>
                                            <tr>
                                                <td> <label for='Bilderquelle'>Bilderquelle</label> </td> 
                                                <td> <input type='text' id='Bilderquelle' name='Bilderquelle' required='true'> </td>
                                            </tr>
                                            <tr>
                                                <td> <br> <input type='submit' value='Speichern'></td>
                                            </tr>
                                            <tr>
                                                <td colspan='3'> <div> <br> <br>*Bilder müssen in das verzeichnis 'Bilder' mit dem hier angegebenen Namen kopiert werden</div> </td>
                                            </tr>

                                        </table>

                                    </form>
            
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