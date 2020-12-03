<?php
    session_start();
    
    if(isset($_SESSION['user_login_korrekt']) && $_SESSION['user_login_korrekt'] == true)
    {
        header("Location: http://localhost/Webshop_Melanie_Sebastian/HTML-PHP/user-uebersicht.php");
    }
    
    include "../includes/siteHeader.php";
    include "../includes/siteFooter.php";
    include "../includes/connectToDB.php";

    pageHead("Login");
    
   echo"<div class='logindata-container'>    

            <form action='user-login-verification.php' method='POST'>
                <div class='flex-DirCol flex-Center'>
                    <div> 
                        <input class='inputForm longInput' id='e-Mail' type='text' name='e-Mail' size='30' placeholder='E-Mail' required='true'> 
                        <input class='inputForm longInput' id='password' type='password' name='password' size='30' placeholder='Passwort' required='true'>
                    </div>

                    <div class='flex-DirRow flex-SpaceBetween'>
                        <input type='submit' class='button buttonSmall' value='Absenden'>
                        <a href='user-create_account.php' class='button buttonSmall'>Konto erstellen</a>
                    </div>
                <div>
            </form>    
            
        </div>";
    
    pageFooter();
?>