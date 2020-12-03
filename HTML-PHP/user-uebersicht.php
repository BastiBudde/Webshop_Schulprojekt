<?php
    session_start();

    //Wenn Benutzter nicht eingeloggt ist wird er zum Login weitergeleitet
    if(!(isset($_SESSION['user_login_korrekt'])))
    {
        header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/user-login.php");
    }   
    
    include "../includes/siteHeader.php";
    include "../includes/siteFooter.php";

    pageHead("Backend Übersicht");

    echo"<div class='flex-DirCol'>
            
            <div class='bigMarginBottom'>
                <h1>Willkommen " . $_SESSION['user_Vorname'] . " " . $_SESSION['user_Nachname'] . "! </h1>
            </div>

            <div class='middleMarginBottom'>
                <a href='user-logout.php' class='button buttonNormal'>Ausloggen</a>

                <a href='user-viewOrders.php' class='button buttonNormal'>Bestellungen ansehen</a>
            </div>
            <div>
                <a href='user-modifyUserInformation.php' class='button buttonNormal'>Meine Daten bearbeiten</a>
                
                <a href='user-deleteUserInDB.php' class='button buttonNormal' onclick='return confirm(\"Wollen Sie ihr Konto wirklich löschen?\\nIhre Kontoinformationen können nicht wiederhergestellt werden!\");'>Konto löschen</a>
            </div>

        </div>";

    pageFooter();

?>
