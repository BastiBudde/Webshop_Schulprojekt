<?php
session_start();

//Falls der Benutzer bereits eingeloggt ist wird er direkt zur Bestellübersicht weitergeleitet 
if(isset($_SESSION['user_login_korrekt']))
{
    header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/bestellung_uebersicht.php");
}
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/style.css">

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

                            if(isset($_POST['checkoutAsGuest']))
                            {
                                echo   "<table class='checkoutAsGuest-Table'>
                                            <caption>Bitte geben Sie ihre Kontaktdaten an! <br><br></caption>
                                            
                                            <form action='bestellung_uebersicht.php' method='post'>
                                                <tr>
                                                    <td>
                                                        <label colspan='2'>Vorname*</label>
                                                        <input type='text' name='Vorname' id='short-input' required='true' placeholder='Max'></input>
                                                    </td>
                                                    <td>
                                                        <label>Nachname*</label>
                                                        <input type='text' name='Nachname' id='short-input' required='true' placeholder='Mustermann'></input>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan='2'>
                                                        <label>E-Mail*</label>
                                                        <input type='email' name='E_Mail' id='long-input' required='true'  placeholder='example@example.com'></input>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan='2'>
                                                        <label>Straße und Hausnr.*</label>
                                                        <input type='text' name='Strasse_Hausnr' id='long-input' required='true'  placeholder='Musterstraße 4'></input>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <label>PLZ*</label>
                                                        <input type='number' name='PLZ' class='numInptWithoutArrows' id='short-input' required='true' placeholder='11011'></input>
                                                    </td>
                                                    <td>
                                                        <label>Ort*</label>
                                                        <input type='text' name='Ort' id='short-input' required='true'  placeholder='Musterstedt'></input>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan='2'>
                                                        <label>Telefon</label>
                                                        <input type='text' name='Telefon' id='long-input' placeholder='123 456 7890'></input>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td colspan='2'>
                                                        <label>Mit * markierte Felder sind Pflichtfelder</label>
                                                        <input type='hidden' name='checkoutAsGuest' value=''></input>
                                                        <input type='submit' value='Weiter' id='submit-button'></input>
                                                    </td>
                                                </tr>

                                            </form>
                                            
                                        </table>";
                            }
                            else
                            {
                                echo   "Sie sind derzeit nicht angemeldet! <br>
                                        Bitte Wählen Sie eine der Folgenden Optionen:
                                        <form action='user-login.php'>
                                            <input type='submit' value='Einloggen'></input>
                                        </form>

                                        <form action='user-create.php'>
                                            <input type='submit' value='Account erstellen'></input>
                                        </form>

                                        <form action='bestellung_anschrift.php' method='post'>
                                            <input type='hidden' name='checkoutAsGuest' value=''></input>
                                            <input type='submit' value='Als Gast fortfahren'></input>
                                        </form>
                                         ";
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