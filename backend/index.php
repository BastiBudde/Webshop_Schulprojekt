<?php
session_start();

    if($_SESSION['mitarbeiter_login_korrekt'] == true)
    {
        header("Location: http://localhost/Webshop_Melanie_Sebastian/backend/backend_uebersicht.php");
    }
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="icon" href="../Bilder/icons/favicon.ico">

    <title>Backend | Gaming Heaven</title>
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
                   
                   <div class='logindata-container'>
                       <table>
                           <form action='backend-login.php' method='POST'>
           
                               <?php
                                   if(isset($_GET['login_failure']) && $_GET['login_failure'] == 1)
                                   {
                                       echo "
                                           <caption>
                                               <h2>Benutzer existiert nicht!<h2>
                                           </caption>";
                                   }
                                   elseif(isset($_GET['login_failure']) && $_GET['login_failure'] == 2)
                                   {
                                       echo "
                                           <caption>
                                               <h2>Benutzername und Passwort stimmen nicht überein!<h2>
                                           </caption>";
                                   }
                               ?>
                           
                               <tr>
                                   <td> 
                                        <div class='flex-DirCol flex-Center'>
                                            <div>
                                                <input class='inputForm longInput' id='username' type='text' name='username' placeholder='Benutzer' size='30' required='true'>
                                                <input class='inputForm longInput' id='password' type='password' name='password' placeholder='Passwort' size='30' required='true'>
                                            </div>

                                            <div>
                                                <input type='submit' class='button buttonSmall' value='Absenden'>
                                            </div>
                                        </div>    
                                    </td>
                               </tr>
           
                           </form>    
                       </table>
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